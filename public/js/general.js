//Will check the session validity
function checkTokenValidity(token){
    $.ajax({
        type: "GET",
        url: access_token_endpoint+"/"+token,
        success: function(response){
            // checking response if null an automatically show session expire
            if(response != null){
                /// response set is 200 and 204
                // 200 for valid token
                // 204 for expired token
                if(response.status == 200){
                    return response['data'][0]['token_status'];
                }else if(response.status == 204){
                    forceLogout();
                }
            }else{
                /// Will show a popup if session expires or local storage is been deleted
                forceLogout();
            }
        }, error: function(e){
            return "DEBUG:: "+e;
        }
    });
}


function forceLogout(){
    $(document).ready(function(){
        /// Will show a popup if session expires or local storage is been deleted
        var html = "";
        html += "<h5>Session Expire!</h5>"
        +"You will redirected to login screen\nPlease Relogin";
        $('#modalSysError').modal('open');
        $(".errMessage").addClass('hide');
        $('.customMessage').html(html);
        $(".customMessage").removeClass('hide');

        // will force to logout after 3 seconds
        $(this).delay(3000).queue(function(){
            $('#logout-form').submit();
        });
    });
}


function isTokenExist(){
    if (localStorage.getItem("AT") === null) {
        forceLogout();
    }
}
/// =================================== Search
//added search handler
$(document).on('blur', '#searchARecord', function(){
    let val = $("#searchARecord").val();

    

    // Check If Default Table is selected
    if(localStorage.getItem('defaultTable') === null){

    }else{
        var selectedTable = localStorage.getItem('defaultTable');
        if(selectedTable == "confirmation"){
            //set the url to be returned
            let url = certificate_endpoint+"/"+val+"?certificate_type=confirmation";
            //then recall the function for calling the api
            getConfirmationList(url);
        }else if(selectedTable == "mariage"){
            //set the url to be returned
            let url = certificate_endpoint+"/"+val+"?certificate_type=marriage";
            //then recall the function for calling the api
            getBirthList(url);
        }else if(selectedTable == "birth"){
            //set the url to be returned
            let url = certificate_endpoint+"/"+val+"?certificate_type=baptism";
            //then recall the function for calling the api
            getMarriageList(url);
        }else if(selectedTable == "death"){
            //set the url to be returned
            let url = certificate_endpoint+"/"+val+"?certificate_type=death";
            //then recall the function for calling the api
            getDeathList(url);
        }
    }
    
});

// ==================================== Certificates

// Confirmation
function getConfirmationList(url){
    isTokenExist();
    var AT = localStorage.getItem("AT");
    checkTokenValidity(AT);

    
    $.ajax({
        type: "GET",
        url: url == "NA" ? certificate_endpoint+"?certificate_type=confirmation" : url,
        success: function(response){
            var certificateType = 'confirmation';
            if(response.status >= 200 && response.status < 400){
                var html = "";
                var confirmationObject = response.data.data;

                if(confirmationObject.length == 0){
                    html+= "<tr>"
                    +"<td colspan='21'>No Records Yet</td>"
                    +"</tr>";
                    $("#confirmationListTable").html(html);
                }else{
                    var prevPageURL = response.data.prev_page_url;
                    var nextPageURL = response.data.next_page_url;
                    var path = response.data.path;
                    var currentPage = response.data.current_page;
                    var lastPage = response.data.last_page;
                    var pageHtml = `<ul class="pagination">
                                    <li class='${currentPage == 1 ? "disabled" : "waves-effect"}'><a class="btnPaginateConfirmation ${currentPage == 1 ? "disabled" : "waves-effect"}" url="${prevPageURL}&certificate_type=${certificateType}"><i class="material-icons">chevron_left</i></a></li>`;
                    for(var x = 0; x < confirmationObject.length; x++){
                        var metaContent = JSON.parse(confirmationObject[x]['meta']);
                        var rootContent = confirmationObject[x];
                        html+='<tr>'
                        +'<!-- Actions -->'
                        +'<td><button class="btn waves-effect btn-actions blue tooltipped btnPrintCCertificate" id="btnPrintCCertificate-'+rootContent['id']+'" data-position="bottom" data-delay="50" data-tooltip="Print Record"><i class="material-icons">print</i></button></td>'
                        +'<td><button class="btn waves-effect btn-actions green tooltipped btnUpdateCCertificate" id="btnUpdateCCertificate-'+rootContent['id']+'" data-position="bottom" data-delay="50" data-tooltip="Update Record"><i class="material-icons">edit</i></button></td>'
                        +'<td><button class="btn waves-effect btn-actions red tooltipped btnDeleteCCertificate" id="btnDeleteCCertificate-'+rootContent['id']+'" data-position="bottom" data-delay="50" data-tooltip="Delete Record"><i class="material-icons">delete</i></button></td>'
                        +'<!-- Confirmation Date -->';
                        var cmonth = metaContent['confirmation_month'];
                        if(cmonth == null || cmonth == undefined || cmonth == NaN){
                            html+='<td>Not Set</td>';
                        }else{
                            html+='<td>'+metaContent['confirmation_month']+'/'+metaContent['confirmation_day']+'/'+metaContent['confirmation_year']+'</td>';
                        }
                        html+='<!-- Date Issued -->';
                        var dissued = metaContent['date_issued'];
                        if(dissued == 'NaN/NaN/NaN'){
                            html+='<td>Not Set</td>';
                        }else{
                            html+='<td>'+metaContent['date_issued']+'</td>';
                        }
                        html+='<!-- Record of -->'
                        +'<td><label style="font-size: 9px;">First Name</label><br>'+rootContent['firstname']+'</td>'
                        +'<td><label style="font-size: 9px;">Middle Name</label><br>'+rootContent['middlename']+'</td>'
                        +'<td><label style="font-size: 9px;">Last Name</label><br>'+rootContent['lastname']+'</td>'
                        +'<!-- Fathers Name -->'
                        +'<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['father_firstname']+'</td>'
                        +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['father_middlename']+'</td>'
                        +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['father_lastname']+'</td>'
                        +'<!-- Mothers Name -->'
                        +'<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['mother_firstname']+'</td>'
                        +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['mother_middlename']+'</td>'
                        +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['mother_lastname']+'</td>'
                        +'<!-- First Sponsor -->'
                        +'<td><label style="font-size: 9px;">Full Name</label><br>'+metaContent['first_sponsor']+'</td>'
                        +'<!-- Second Sponsor -->'
                        +'<td><label style="font-size: 9px;">Full Name</label><br>'+metaContent['second_sponsor']+'</td>'
                        +'<!-- Confirmation by -->'
                        +'<td>'+metaContent['confirmation_by']+'</td>'
                        +'<!-- Registration Book Detail -->'
                        +'<td><label style="font-size: 9px;">Registration Book</label><br>'+metaContent['registration_book']+'</td>'
                        +'<td><label style="font-size: 9px;">Book Page</label><br>'+metaContent['book_page']+'</td>'
                        +'<td><label style="font-size: 9px;">Book Number</label><br>'+metaContent['book_number']+'</td>'
                        
                        var pname = rootContent['priest_fname'];
                        if(pname == null || pname == undefined || pname == NaN){
                            html+='<td>Not Set</td>';
                        }else{
                            html+='<td><label style="font-size: 9px;">Name</label><br>'+rootContent['priest_fname']+' '+rootContent['priest_mname']+' '+rootContent['priest_lname']+'</td>';
                        }
                        html+='</tr>';
                    }
    
                    generatePagination(lastPage, currentPage, pageHtml, path, nextPageURL, certificateType);
                }

                $("#confirmationListTable").html(html);
                $('.tooltipped').tooltip({delay: 50});

                /// Print Confirmation Certificate
                $(".btnPrintCCertificate").on('click', function(e){
                    e.preventDefault();
                    var certificateId = $(this).attr("id").substr('btnPrintCCertificate-'.length);
                    printConfirmationCertificate(certificateId, $(this).attr("id"));
                });

                /// Update Confirmation Certificate
                $(".btnUpdateCCertificate").on('click', function(e){
                    e.preventDefault();
                    var certificateId = $(this).attr("id").substr('btnUpdateCCertificate-'.length);
                    showToUpdateConfirmationCertificate(certificateId, $(this).attr("id"));
                });

                /// Delete Confirmation Certificate
                $(".btnDeleteCCertificate").on("click",function(){
                    var certificateId = $(this).attr("id").substr('btnDeleteCCertificate-'.length);
                    
                    $('#single_confirmation_form').find('input:text, input:password, select')
                    .each(function () {
                        $(this).val('');
                    });
                    $('#single_confirmation_form').find('input:hidden')
                    .each(function () {
                        $(this).val(0);
                    });
                    $('#single_confirmation_form').find('label')
                    .each(function () {
                        $(this).removeClass('active');
                    });
                    $('#single_confirmation_parish_priest').material_select();
                    $(".btnCancelConfirmationUpdate").addClass('hide');
                    
                    // update Form Title
                    $(".headerConfirmation").html('Add Confirmation');

                    deleteConfirmationCertificate(certificateId);
                });
            }else{
                Materialize.toast('Something Went Wrong:: '+JSON.stringify(response.message), 5000, 'red rounded');
                console.log('["Confirmation Status"]: '+response.status);
            }
        }, error: function(e){
            Materialize.toast('Something Went Wrong:: '+e.responseJSON.message, 5000, 'red rounded');
            console.log('["Confirmation Error"]: '+e.responseJSON.message);
        }
    });


    function printConfirmationCertificate(certificateId){
        isTokenExist();
        var AT = localStorage.getItem("AT");
        checkTokenValidity(AT);

        if(certificateId == undefined || certificateId == null){
            $('#modalSysError').modal('open');
        }else{
        }

    }

    function showToUpdateConfirmationCertificate(certificateId){
        console.log('certificateId:: ',certificateId);
        isTokenExist();
        var AT = localStorage.getItem("AT");
        checkTokenValidity(AT);

        if(certificateId == undefined || certificateId == null){
            $('#modalSysError').modal('open');
        }else{
            // TODO:: Show Individual form
            localStorage.setItem('defaultForm','individual');
            setFormSelection();
            // update Form Title
            $(".headerConfirmation").html('Update Confirmation');
            // Show Cancel Button
            $(".btnCancelConfirmationUpdate").removeClass('hide');
            // Display Information to Form
            $.ajax({
                type: "GET",
                url: certificate_endpoint+"/"+certificateId,
                data: {'certificate_type':'confirmation', 'isIdSearch':'true'},
                success: function(response){
                    if(response.status >= 200 && response.status < 400){    
                        var metaContent = JSON.parse(response.data[0].meta);              
                        
                        $('#single_confirmation_firstname').val(response.data[0].firstname);
                        $('#single_confirmation_middlename').val(response.data[0].middlename);
                        $('#single_confirmation_lastname').val(response.data[0].lastname);
                        $('#single_confirmation_father_firstname').val(metaContent.father_firstname);
                        $('#single_confirmation_father_middlename').val(metaContent.father_middlename);
                        $('#single_confirmation_father_lastname').val(metaContent.father_lastname);
                        $('#single_confirmation_mother_firstname').val(metaContent.mother_firstname);
                        $('#single_confirmation_mother_middlename').val(metaContent.mother_firstname);
                        $('#single_confirmation_mother_lastname').val(metaContent.mother_firstname);
                        
                        if(metaContent.confirmation_month != null){
                            // Confirmation Date
                            var convertConfirmationDate = new Date(metaContent.confirmation_month+"/"+metaContent.confirmation_day+"/"+metaContent.confirmation_year);
                            $('#single_confirmation_date').val(convertConfirmationDate.getDate() + " " +monthNames[convertConfirmationDate.getMonth()] +", "+convertConfirmationDate.getFullYear());
                            var $confirmationDateInput = $('#single_confirmation_date').pickadate();

                            // Use the picker object directly.
                            var confirmationDatePicker = $confirmationDateInput.pickadate('picker');
                            confirmationDatePicker.set('select', [convertConfirmationDate.getFullYear(), convertConfirmationDate.getMonth(), convertConfirmationDate.getDate()]);
                        }
                        if(metaContent.date_issued != 'NaN/NaN/NaN'){
                            // Date Issued
                            var convertDateIssued = new Date(metaContent.date_issued);
                            $('#single_conrfirmation_date_issued').val(convertDateIssued.getDate() + " " +monthNames[convertDateIssued.getMonth()] +", "+convertDateIssued.getFullYear());
                            var $input = $('#single_conrfirmation_date_issued').pickadate();
    
                            // Use the picker object directly.
                            var picker = $input.pickadate('picker');
                            picker.set('select', [convertDateIssued.getFullYear(), convertDateIssued.getMonth(), convertDateIssued.getDate()]);
                        }

                        $('#single_confirmation_by').val(metaContent.confirmation_by);
                        $('#single_confirmation_fsponsor_firstname').val(metaContent.first_sponsor);
                        $('#single_confirmation_ssponsor_firstname').val(metaContent.second_sponsor);
                        $('#single_confirmation_register_book').val(metaContent.registration_book);
                        $('#single_confirmation_book_page').val(metaContent.book_page);
                        $('#single_confirmation_book_number').val(metaContent.book_number);
                        $('#single_confirmation_parish_priest').val(response.data[0].priest_id);
                        // re-initialize material-select
                        $('#single_confirmation_parish_priest').material_select();
                        
                        
                        $('#single_confirmation_form').find('label')
                        .each(function () {
                            if($(this).html() != "Select Parish Priest"){
                                $(this).addClass('active');
                            }
                        });
                        $('#cis_update').val(1);
                        $('#cid').val(certificateId);
                    }else{
                        Materialize.toast('Something Went Wrong:: '+response.message, 5000, 'red rounded');
                        console.log('["Confirmation Status"]: '+response.status);
                    }
                }, error: function(e){
                    Materialize.toast('Something Went Wrong:: '+e.responseJSON.message, 5000, 'red rounded');
                    console.log('["Confirmation Error"]: '+e.responseJSON.message);
                }
            });
        }
    }

    function deleteConfirmationCertificate(certificateId){
        isTokenExist();
        var AT = localStorage.getItem("AT");
        checkTokenValidity(AT);

        if(certificateId == undefined || certificateId == null){
            $('#modalSysError').modal('open');
        }else{
            /// Pull out record first
            $.ajax({
                type: "GET",
                url: certificate_endpoint+"/"+certificateId,
                data: {'certificate_type':'confirmation', 'isIdSearch':'true'},
                success: function(response){
                    if(response.status >= 200 && response.status < 400){
                        /// Prepare Delete Confirmation Modal
                        $("#recordToDelete").html(response.data[0]['firstname']);
                        var buttonConfirmation = "<button class='btn btnConfirmedDelete' id='"+certificateId+"'>Delete</button> <button class='btn' id='closeConrimation'>Cancel</button>";
                        $('#buttonConfirmation').html(buttonConfirmation);
                        
                        /// Open the modal
                        $('#deleteConfirmationModal').modal('open');

                        /// if confirmed Delete
                        $(".btnConfirmedDelete").on('click',function(){
                            var fetchCertificateId = $(this).attr('id');
                            $.ajax({
                                type: "DELETE",
                                url: certificate_endpoint+"/"+fetchCertificateId,
                                data: {"id": certificateId, "is_deleted": 1},
                                success: function(response){
                                    if(response.status >= 200 && response.status < 400){
                                        getConfirmationList("NA");
                                        $('#deleteConfirmationModal').modal('close');
                                    }else{
                                        Materialize.toast('Something Went Wrong (405):: '+JSON.stringify(response.message), 5000, 'red rounded');
                                        console.log('["Confirmation Status"]: '+response.status);
                                    }
                                }, error: function(e){
                                    Materialize.toast('Something Went Wrong (406):: '+e.responseJSON.message, 5000, 'red rounded');
                                    console.log('["Confirmation Error"]: '+e.responseJSON.message);
                                }
                            });
                        });

                        /// else close modal
                        $("#closeConrimation").on('click',function(){
                            $('#deleteConfirmationModal').modal('close');
                        });

                    }else{
                        Materialize.toast('Something went wrong (405):: '+JSON.stringify(response.message), 5000, 'red rounded');
                        console.log('["Confirmation Status"]: '+response.status);
                    }
                }, error: function(e){
                    Materialize.toast('Something Went Wrong (406):: '+e.responseJSON.message, 5000, 'red rounded');
                    console.log('["Confirmation Error"]: '+e.responseJSON.message);
                }
            });
        }
    }

    function generatePagination(lastPage, currentPage, pageHtml, path, nextPageURL, certificate){
        for(let i = 0 ; i < lastPage ; i++){
            if(currentPage == parseInt(i+1)){
                pageHtml += `<li class="active"><a class="btnPaginateConfirmation" url="${path + "?page=" + parseInt(i+1)}&certificate_type=${certificate}">${i+1}</a></li>`;
            }else{
                pageHtml += `<li class="waves-effect"><a class="btnPaginateConfirmation" url="${path + "?page=" + parseInt(i+1)}&certificate_type=${certificate}">${i+1}</a></li>`;
            }
        }
        pageHtml += `<li class='${lastPage == currentPage ? "disabled" : "waves-effect"}'><a class="btnPaginateConfirmation ${lastPage == currentPage ? "disabled" : "waves-effect"}" url="${nextPageURL}&certificate_type=${certificate}"><i class="material-icons">chevron_right</i></a></li>
                    </ul>`;

        
        //display the pagination
        $("#paginationCertificate").html(pageHtml);

    }
}

// DT: pagination button here...
// Pagination For Confirmation
$(document).on('click', '.btnPaginateConfirmation', function(){
    let url = $(this).attr("url");
    let parentClass = $(this).parent().prop('className');
    if(parentClass != "active"){
        let status = $(this).attr("class").split(" ")[1];
        if(status != "disabled"){
            getConfirmationList(url);
        }
    }
});


// Birth
function getBirthList(url){
    isTokenExist();
    var AT = localStorage.getItem("AT");
    checkTokenValidity(AT);

    
    $.ajax({
        type: "GET",
        url: url == "NA" ? certificate_endpoint+"?certificate_type=baptism" : url,
        success: function(response){
            var certificateType = 'baptism';
            if(response.status >= 200 && response.status < 400){
                var birthObject = response.data.data;
                var html = "";
                if(birthObject.length == 0){
                    html+= "<tr>"
                    +"<td colspan='21'>No Records Yet</td>"
                    +"</tr>";
                    $("#birthListTable").html(html);
                }else{
                    var prevPageURL = response.data.prev_page_url;
                    var nextPageURL = response.data.next_page_url;
                    var path = response.data.path;
                    var currentPage = response.data.current_page;
                    var lastPage = response.data.last_page;
                    var pageHtml = `<ul class="pagination">
                                    <li class='${currentPage == 1 ? "disabled" : "waves-effect"}'><a class="btnPaginationForBirth ${currentPage == 1 ? "disabled" : "waves-effect"}" url="${prevPageURL}&certificate_type=${certificateType}"><i class="material-icons">chevron_left</i></a></li>`;
                    for(var x = 0; x < birthObject.length; x++){
                        var metaContent = JSON.parse(birthObject[x]['meta']);
                        var rootContent = birthObject[x];
                        html+= '<tr>'
                            +'<!-- Actions -->'
                            +'<td><button class="btn waves-effect btn-actions blue tooltipped btnPrintBCertificate" id="btnPrintBCertificate-'+rootContent['id']+'" data-position="bottom" data-delay="50" data-tooltip="Print Record"><i class="material-icons">print</i></button></td>'
                            +'<td><button class="btn waves-effect btn-actions green tooltipped btnUpdateBCertificate" id="btnUpdateBCertificate-'+rootContent['id']+'" data-position="bottom" data-delay="50" data-tooltip="Update Record"><i class="material-icons">edit</i></button></td>'
                            +'<td><button class="btn waves-effect btn-actions red tooltipped btnDeleteBCertificate" id="btnDeleteBCertificate-'+rootContent['id']+'" data-position="bottom" data-delay="50" data-tooltip="Delete Record"><i class="material-icons">delete</i></button></td>'
                            +'<!-- Born On -->'
                            +'<td>'+metaContent['born_on']+'</td>'
                            +'<!-- Record of -->'
                            +'<td><label style="font-size: 9px;">First Name</label><br>'+rootContent['firstname']+'</td>'
                            +'<td><label style="font-size: 9px;">Middle Name</label><br>'+rootContent['middlename']+'</td>'
                            +'<td><label style="font-size: 9px;">Last Name</label><br>'+rootContent['lastname']+'</td>'
                            +'<!-- Born In -->'
                            +'<td><label style="font-size: 9px;">Born In</label><br>'+metaContent['born_in']+'</td>'
                            +'<!-- Fathers Name -->'
                            +'<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['father_firstname']+'</td>'
                            +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['father_middlename']+'</td>'
                            +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['father_lastname']+'</td>'
                            +'<!-- Mothers Name -->'
                            +'<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['mother_firstname']+'</td>'
                            +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['mother_middlename']+'</td>'
                            +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['mother_lastname']+'</td>'
                            +'<!-- Residents of -->'
                            +'<td><label style="font-size: 9px;">Address</label><br>'+metaContent['resident_of']+'</td>'
                            +'<!-- Godparents -->'
                            +'<td><label style="font-size: 9px;">Godparents</label><br>'+metaContent['godparents']+'</td>'
                            +'<!-- Other Details -->'
                            +'<td><label style="font-size: 9px;">Baptismal Register</label><br>'+metaContent['baptismal_register']+'</td>'
                            +'<td><label style="font-size: 9px;">Volume</label><br>'+metaContent['volume']+'</td>'
                            +'<td><label style="font-size: 9px;">Page Number</label><br>'+metaContent['page']+'</td>'
                            +'<td><label style="font-size: 9px;">Date Issued</label><br>'+metaContent['date_issued']+'</td>'
                            +'<!-- Parish Priest -->';
                            var pname = rootContent['priest_fname'];
                            if(pname == null || pname == undefined || pname == NaN){
                                html+='<td><label style="font-size: 9px;">Name</label><br>Not Set</td>';
                            }else{
                                html+='<td><label style="font-size: 9px;">Name</label><br>'+rootContent['priest_fname']+' '+rootContent['priest_mname']+' '+rootContent['priest_lname']+'</td>';
                            }
                            html+='</tr>';
                    }

                    generateBirthPagination(lastPage, currentPage, pageHtml, path, nextPageURL, certificateType);
                }
    
                $("#birthListTable").html(html);
                $('.tooltipped').tooltip({delay: 50});

                /// Print Confirmation Certificate
                $(".btnPrintCCertificate").on('click', function(){
                    var certificateId = $(this).attr("id").substr('btnPrintCCertificate-'.length);
                    printBirthCertificate(certificateId, $(this).attr("id"));
                });

                /// Update Confirmation Certificate
                $(".btnUpdateBCertificate").on('click', function(e){
                    e.preventDefault();
                    var certificateId = $(this).attr("id").substr('btnUpdateBCertificate-'.length);
                    showToUpdateBirthCertificate(certificateId, $(this).attr("id"));
                });

                
                /// Delete Birth Certificate
                $(".btnDeleteBCertificate").on("click",function(){
                    var certificateId = $(this).attr("id").substr('btnDeleteBCertificate-'.length);
                    
                    $('#single_birth_form').find('input:text, input:password, select')
                    .each(function () {
                        $(this).val('');
                    });
                    $('#single_birth_form').find('input:hidden')
                    .each(function () {
                        $(this).val(0);
                    });
                    $('#single_birth_form').find('label')
                    .each(function () {
                        $(this).removeClass('active');
                    });
                    $('#birth_parish_priest').material_select();
                    $(".btnCancelConfirmationUpdate").addClass('hide');
                    
                    // update Form Title
                    $(".headerConfirmation").html('Add Confirmation');

                    deleteBirthCertificate(certificateId);
                });
            }else{
                console.log('Something is not right:: ',response);
            }
        }, error: function(e){
            console.log('Something is not right:: ',e);
        }
    });


    function printBirthCertificate(certificateId){
        isTokenExist();
        var AT = localStorage.getItem("AT");
        checkTokenValidity(AT);

        if(certificateId == undefined || certificateId == null){
            $('#modalSysError').modal('open');
        }else{
        }

    }

    function showToUpdateBirthCertificate(certificateId){
        isTokenExist();
        var AT = localStorage.getItem("AT");
        checkTokenValidity(AT);

        if(certificateId == undefined || certificateId == null){
            $('#modalSysError').modal('open');
        }else{
            // TODO:: Show Individual form
            localStorage.setItem('defaultForm','individual');
            setFormSelection();
            // update Form Title
            $(".headerBirth").html('Update Birth');
            // Show Cancel Button
            $(".btnCancelBirthUpdate").removeClass('hide');
            // Display Information to Form
            $.ajax({
                type: "GET",
                url: certificate_endpoint+"/"+certificateId,
                data: {'certificate_type':'baptism', 'isIdSearch':'true'},
                success: function(response){
                    if(response.status >= 200 && response.status < 400){    
                        var metaContent = JSON.parse(response.data[0].meta);              
                        
                        $('#birth_firstname').val(response.data[0].firstname);
                        $('#birth_middlename').val(response.data[0].middlename);
                        $('#birth_lastname').val(response.data[0].lastname);
                        
                        $('#single_birth_form').find('label')
                        .each(function () {
                            if($(this).html() != "Select Parish Priest"){
                                $(this).addClass('active');
                            }
                        });
                        $('#bis_update').val(1);
                        $('#bid').val(certificateId);
                    }else{
                        Materialize.toast('Something Went Wrong:: '+response.message, 5000, 'red rounded');
                        console.log('["Confirmation Status"]: '+response.status);
                    }
                }, error: function(e){
                    Materialize.toast('Something Went Wrong:: '+e.responseJSON.message, 5000, 'red rounded');
                    console.log('["Confirmation Error"]: '+e.responseJSON.message);
                }
            });
        }
    }

    function deleteBirthCertificate(certificateId){
        isTokenExist();
        var AT = localStorage.getItem("AT");
        checkTokenValidity(AT);

        if(certificateId == undefined || certificateId == null){
            $('#modalSysError').modal('open');
        }else{
            /// Pull out record first
            $.ajax({
                type: "GET",
                url: certificate_endpoint+"/"+certificateId,
                data: {'certificate_type':'baptism', 'isIdSearch':'true'},
                success: function(response){
                    if(response.status >= 200 && response.status < 400){
                        /// Prepare Delete Confirmation Modal
                        $("#recordToDelete").html(response.data[0]['firstname']);
                        var buttonConfirmation = "<button class='btn btnConfirmedDelete' id='"+certificateId+"'>Delete</button> <button class='btn' id='closeConrimation'>Cancel</button>";
                        $('#buttonConfirmation').html(buttonConfirmation);
                        
                        /// Open the modal
                        $('#deleteConfirmationModal').modal('open');

                        /// if confirmed Delete
                        $(".btnConfirmedDelete").on('click',function(){
                            var fetchCertificateId = $(this).attr('id');
                            $.ajax({
                                type: "DELETE",
                                url: certificate_endpoint+"/"+fetchCertificateId,
                                data: {"id": certificateId, "is_deleted": 1},
                                success: function(response){
                                    if(response.status >= 200 && response.status < 400){
                                        getBirthList("NA");
                                        $('#deleteConfirmationModal').modal('close');
                                    }else{
                                        Materialize.toast('Something Went Wrong (405):: '+JSON.stringify(response.message), 5000, 'red rounded');
                                        console.log('["Confirmation Status"]: '+response.status);
                                    }
                                }, error: function(e){
                                    Materialize.toast('Something Went Wrong (406):: '+e.responseJSON.message, 5000, 'red rounded');
                                    console.log('["Confirmation Error"]: '+e.responseJSON.message);
                                }
                            });
                        });

                        /// else close modal
                        $("#closeConrimation").on('click',function(){
                            $('#deleteConfirmationModal').modal('close');
                        });

                    }else{
                        Materialize.toast('Something went wrong (405):: '+JSON.stringify(response.message), 5000, 'red rounded');
                        console.log('["Confirmation Status"]: '+response.status);
                    }
                }, error: function(e){
                    Materialize.toast('Something Went Wrong (406):: '+e.responseJSON.message, 5000, 'red rounded');
                    console.log('["Confirmation Error"]: '+e.responseJSON.message);
                }
            });
        }
    }

    function generateBirthPagination(lastPage, currentPage, pageHtml, path, nextPageURL, certificate){
        for(let i = 0 ; i < lastPage ; i++){
            if(currentPage == parseInt(i+1)){
                pageHtml += `<li class="active"><a class="btnPaginationForBirth" url="${path + "?page=" + parseInt(i+1)}&certificate_type=${certificate}">${i+1}</a></li>`;
            }else{
                pageHtml += `<li class="waves-effect"><a class="btnPaginationForBirth" url="${path + "?page=" + parseInt(i+1)}&certificate_type=${certificate}">${i+1}</a></li>`;
            }
        }
        pageHtml += `<li class='${lastPage == currentPage ? "disabled" : "waves-effect"}'><a class="btnPaginationForBirth ${lastPage == currentPage ? "disabled" : "waves-effect"}" url="${nextPageURL}&certificate_type=${certificate}"><i class="material-icons">chevron_right</i></a></li>
                    </ul>`;

        
        //display the pagination
        $("#paginationBirth").html(pageHtml);

    }
}
// DT: pagination button here...
// Pagination For Birth
$(document).on('click', '.btnPaginationForBirth', function(){
    let url = $(this).attr("url");
    let status = $(this).attr("class").split(" ")[1];
    if(status != "disabled"){
        getBirthList(url);
    }
});

// Mariage
function getMarriageList(url){
    isTokenExist();
    var AT = localStorage.getItem("AT");
    checkTokenValidity(AT);

    
    $.ajax({
        type: "GET",
        url: url == "NA" ? certificate_endpoint+"?certificate_type=marriage" : url,
        success: function(response){
            var certificateType = 'marriage';
            if(response.status == 200){
                var html = "";
                var marriageObject = response.data.data;
                var prevPageURL = response.data.prev_page_url;
                var nextPageURL = response.data.next_page_url;
                var path = response.data.path;
                var currentPage = response.data.current_page;
                var lastPage = response.data.last_page;
                var pageHtml = `<ul class="pagination">
                                <li class='${currentPage == 1 ? "disabled" : "waves-effect"}'><a class="btnPaginationForMarriage ${currentPage == 1 ? "disabled" : "waves-effect"}" url="${prevPageURL}&certificate_type=${certificateType}"><i class="material-icons">chevron_left</i></a></li>`;
                for(var x = 0; x < marriageObject.length; x++){
                    var metaContent = JSON.parse(marriageObject[x]['meta']);
                    html+= '<tr>'
                        +'<!-- Actions -->'
                        +'<td><button class="btn btn-wave btn-actions blue"><i class="material-icons">print</i></button></td>'
                        +'<td><button class="btn btn-wave btn-actions green"><i class="material-icons">edit</i></button></td>'
                        +'<td><button class="btn btn-wave btn-actions red"><i class="material-icons">delete</i></button></td>'
                        +'<!-- Born On -->'
                        +'<td>First Name</td>'
                        +'<!-- Record of -->'
                        +'<td>First Name</td>'
                        +'<td>First Name</td>'
                        +'<td>First Name</td>'
                        +'<!-- Born In -->'
                        +'<td>First Name</td>'
                        +'<!-- Fathers Name -->'
                        +'<td>First Name</td>'
                        +'<td>First Name</td>'
                        +'<td>First Name</td>'
                        +'<!-- Mothers Name -->'
                        +'<td>First Name</td>'
                        +'<td>First Name</td>'
                        +'<td>First Name</td>'
                        +'<!-- Residents of -->'
                        +'<td>First Name</td>'
                        +'<!-- Godparents -->'
                        +'<td>First Name</td>'
                        +'<!-- Other Details -->'
                        +'<td>First Name</td>'
                        +'<td>First Name</td>'
                        +'<td>First Name</td>'
                        +'<td>First Name</td>'
                        +'<!-- Parish Priest -->'
                        +'<td>First Name</td>'
                    +'</tr>';
                }

                generateMariagePagination(lastPage, currentPage, pageHtml, path, nextPageURL, certificateType);

                $("#marriageListTable").html(html);
                $('.tooltipped').tooltip({delay: 50});

                /// Print Confirmation Certificate
                $(".btnPrintCCertificate").on('click', function(){
                    var certificateId = $(this).attr("id").substr('btnPrintCCertificate-'.length);
                    printMarriageCertificate(certificateId, $(this).attr("id"));
                });

                /// Update Confirmation Certificate

                /// Delete Confirmation Certificate
            }else{
                console.log('Something is not right:: ',response);
            }
        }, error: function(e){
            console.log('Something is not right:: ',e);
        }
    });


    function printMarriageCertificate(certificateId){
        isTokenExist();
        var AT = localStorage.getItem("AT");
        checkTokenValidity(AT);

        if(certificateId == undefined || certificateId == null){
            $('#modalSysError').modal('open');
        }else{
        }

    }

    function showToUpdateMarriageCertificate(certificateId){
        isTokenExist();
        var AT = localStorage.getItem("AT");
        checkTokenValidity(AT);

        if(certificateId == undefined || certificateId == null){
            $('#modalSysError').modal('open');
        }else{
            // TODO:: Show Individual form
            localStorage.setItem('defaultForm','individual');
            setFormSelection();
            // update Form Title
            $(".headerConfirmation").html('Update Confirmation');
            // Show Cancel Button
            $(".btnCancelConfirmationUpdate").removeClass('hide');
            // Display Information to Form
            $.ajax({
                type: "GET",
                url: certificate_endpoint+"/"+certificateId,
                success: function(response){
                    console.log(response);
                    if(response.status == 200){    
                        var metaContent = JSON.parse(response.data[0].meta);
                        console.log(metaContent);                    
                        
                        $('#single_confirmation_firstname').val(response.data[0].firstname);
                        $('#single_confirmation_middlename').val(response.data[0].middlename);
                        $('#single_confirmation_lastname').val(response.data[0].lastname);
                        $('#single_confirmation_father_firstname').val(metaContent.father_firstname);
                        $('#single_confirmation_father_middlename').val(metaContent.father_middlename);
                        $('#single_confirmation_father_lastname').val(metaContent.father_lastname);
                        $('#single_confirmation_mother_firstname').val(metaContent.mother_firstname);
                        $('#single_confirmation_mother_middlename').val(metaContent.mother_firstname);
                        $('#single_confirmation_mother_lastname').val(metaContent.mother_firstname);
                        // $('#single_confirmation_date').val(metaContent.father_firstname);
                        // $('#single_conrfirmation_date_issued').val(metaContent.father_firstname);
                        $('#single_confirmation_by').val(metaContent.confirmation_by);
                        // $('#single_confirmation_fsponsor_firstname').val(metaContent.father_firstname);
                        // $('#single_confirmation_fsponsor_middlename').val(metaContent.father_firstname);
                        // $('#single_confirmation_fsponsor_lastname').val(metaContent.father_firstname);
                        // $('#single_confirmation_ssponsor_firstname').val(metaContent.father_firstname);
                        // $('#single_confirmation_ssponsor_middlename').val(metaContent.father_firstname);
                        // $('#single_confirmation_ssponsor_lastname').val(metaContent.father_firstname);
                        $('#single_confirmation_register_book').val(metaContent.registration_book);
                        $('#single_confirmation_book_page').val(metaContent.book_page);
                        $('#single_confirmation_book_number').val(metaContent.book_number);
                        $('#single_confirmation_parish_priest').val(response.data[0].priest_id);
                        
                        
                        // $('#single_confirmation_form').find('label')
                        // .each(function () {
                        //     $(this).addClass('active');
                        // });
                        // $('#cis_update').val(1);
                        // $('#cid').val(certificateId);
                    }else{
                        var html = "";
                        html += "<h5>Something went wrong!</h5>"
                        +""+response.message+"";
                        $('#modalSysError').modal('open');
                        $(".errMessage").addClass('hide');
                        $('.customMessage').html(html);
                        $(".customMessage").removeClass('hide');
                    }
                }, error: function(e){
                    var html = "";
                    html += "<h5>Something went wrong!</h5>"
                    +""+e.message+"";
                    $('#modalSysError').modal('open');
                    $(".errMessage").addClass('hide');
                    $('.customMessage').html(html);
                    $(".customMessage").removeClass('hide');
                }
            });
        }
    }

    function deleteMarriageCertificate(certificateId){
        isTokenExist();
        var AT = localStorage.getItem("AT");
        checkTokenValidity(AT);

        if(certificateId == undefined || certificateId == null){
            $('#modalSysError').modal('open');
        }else{
            /// Pull out record first
            $.ajax({
                type: "GET",
                url: certificate_endpoint+"/"+certificateId,
                success: function(response){
                    if(response.status == 200){
                        /// Prepare Delete Confirmation Modal
                        $("#recordToDelete").html(response.data[0]['firstname']);
                        var buttonConfirmation = "<button class='btn btnConfirmedDelete' id='"+certificateId+"'>Delete</button> <button class='btn' id='closeConrimation'>Cancel</button>";
                        $('#buttonConfirmation').html(buttonConfirmation);
                        
                        /// Open the modal
                        $('#deleteConfirmationModal').modal('open');

                        /// if confirmed Delete
                        

                        /// else close modal
                        $("#closeConrimation").click(function(){
                            $('#deleteConfirmationModal').modal('close');
                        });

                    }else{
                        console.log('Invalid Code Status');
                    }
                }, error: function(e){
                    console.log(e.message);
                }
            });
        }
    }

    function generateMariagePagination(lastPage, currentPage, pageHtml, path, nextPageURL, certificate){
        for(let i = 0 ; i < lastPage ; i++){
            if(currentPage == parseInt(i+1)){
                pageHtml += `<li class="active"><a class="btnPaginationForMarriage" url="${path + "?page=" + parseInt(i+1)}&certificate_type=${certificate}">${i+1}</a></li>`;
            }else{
                pageHtml += `<li class="waves-effect"><a class="btnPaginationForMarriage" url="${path + "?page=" + parseInt(i+1)}&certificate_type=${certificate}">${i+1}</a></li>`;
            }
        }
        pageHtml += `<li class='${lastPage == currentPage ? "disabled" : "waves-effect"}'><a class="btnPaginationForMarriage ${lastPage == currentPage ? "disabled" : "waves-effect"}" url="${nextPageURL}&certificate_type=${certificate}"><i class="material-icons">chevron_right</i></a></li>
                    </ul>`;

        
        //display the pagination
        $("#paginationMarriage").html(pageHtml);

    }
}
// DT: pagination button here...
// Pagination For Marriage
$(document).on('click', '.btnPaginationForMarriage', function(){
    let url = $(this).attr("url");
    let status = $(this).attr("class").split(" ")[1];
    if(status != "disabled"){
        getMarriageList(url);
    }
});


// Death
function getDeathList(url){
    isTokenExist();
    var AT = localStorage.getItem("AT");
    checkTokenValidity(AT);

    
    $.ajax({
        type: "GET",
        url: url == "NA" ? certificate_endpoint+"?certificate_type=death" : url,
        success: function(response){
            var certificateType = 'death';
            if(response.status == 200){
                var html = "";
                var deathObject = response.data.data;
                var prevPageURL = response.data.prev_page_url;
                var nextPageURL = response.data.next_page_url;
                var path = response.data.path;
                var currentPage = response.data.current_page;
                var lastPage = response.data.last_page;
                var pageHtml = `<ul class="pagination">
                                <li class='${currentPage == 1 ? "disabled" : "waves-effect"}'><a class="btnPaginationForDeath ${currentPage == 1 ? "disabled" : "waves-effect"}" url="${prevPageURL}&certificate_type=${certificateType}"><i class="material-icons">chevron_left</i></a></li>`;
                for(var x = 0; x < deathObject.length; x++){
                    var metaContent = JSON.parse(deathObject[x]['meta']);
                    html+= '<tr>'
                        +'<!-- Actions -->'
                        +'<td><button class="btn btn-wave btn-actions blue"><i class="material-icons">print</i></button></td>'
                        +'<td><button class="btn btn-wave btn-actions green"><i class="material-icons">edit</i></button></td>'
                        +'<td><button class="btn btn-wave btn-actions red"><i class="material-icons">delete</i></button></td>'
                        +'<!-- Born On -->'
                        +'<td>First Name</td>'
                        +'<!-- Record of -->'
                        +'<td>First Name</td>'
                        +'<td>First Name</td>'
                        +'<td>First Name</td>'
                        +'<!-- Born In -->'
                        +'<td>First Name</td>'
                        +'<!-- Fathers Name -->'
                        +'<td>First Name</td>'
                        +'<td>First Name</td>'
                        +'<td>First Name</td>'
                        +'<!-- Mothers Name -->'
                        +'<td>First Name</td>'
                        +'<td>First Name</td>'
                        +'<td>First Name</td>'
                        +'<!-- Residents of -->'
                        +'<td>First Name</td>'
                        +'<!-- Godparents -->'
                        +'<td>First Name</td>'
                        +'<!-- Other Details -->'
                        +'<td>First Name</td>'
                        +'<td>First Name</td>'
                        +'<td>First Name</td>'
                        +'<td>First Name</td>'
                        +'<!-- Parish Priest -->'
                        +'<td>First Name</td>'
                    +'</tr>';
                }

                generateMariagePagination(lastPage, currentPage, pageHtml, path, nextPageURL, certificateType);

                $("#marriageListTable").html(html);
                $('.tooltipped').tooltip({delay: 50});

                /// Print Confirmation Certificate
                $(".btnPrintCCertificate").on('click', function(){
                    var certificateId = $(this).attr("id").substr('btnPrintCCertificate-'.length);
                    printMarriageCertificate(certificateId, $(this).attr("id"));
                });

                /// Update Confirmation Certificate

                /// Delete Confirmation Certificate
            }else{
                console.log('Something is not right:: ',response);
            }
        }, error: function(e){
            console.log('Something is not right:: ',e);
        }
    });


    function printMarriageCertificate(certificateId){
        isTokenExist();
        var AT = localStorage.getItem("AT");
        checkTokenValidity(AT);

        if(certificateId == undefined || certificateId == null){
            $('#modalSysError').modal('open');
        }else{
        }

    }

    function showToUpdateMarriageCertificate(certificateId){
        isTokenExist();
        var AT = localStorage.getItem("AT");
        checkTokenValidity(AT);

        if(certificateId == undefined || certificateId == null){
            $('#modalSysError').modal('open');
        }else{
            // TODO:: Show Individual form
            localStorage.setItem('defaultForm','individual');
            setFormSelection();
            // update Form Title
            $(".headerConfirmation").html('Update Confirmation');
            // Show Cancel Button
            $(".btnCancelConfirmationUpdate").removeClass('hide');
            // Display Information to Form
            $.ajax({
                type: "GET",
                url: certificate_endpoint+"/"+certificateId,
                success: function(response){
                    console.log(response);
                    if(response.status == 200){    
                        var metaContent = JSON.parse(response.data[0].meta);
                        console.log(metaContent);                    
                        
                        $('#single_confirmation_firstname').val(response.data[0].firstname);
                        $('#single_confirmation_middlename').val(response.data[0].middlename);
                        $('#single_confirmation_lastname').val(response.data[0].lastname);
                        $('#single_confirmation_father_firstname').val(metaContent.father_firstname);
                        $('#single_confirmation_father_middlename').val(metaContent.father_middlename);
                        $('#single_confirmation_father_lastname').val(metaContent.father_lastname);
                        $('#single_confirmation_mother_firstname').val(metaContent.mother_firstname);
                        $('#single_confirmation_mother_middlename').val(metaContent.mother_firstname);
                        $('#single_confirmation_mother_lastname').val(metaContent.mother_firstname);
                        // $('#single_confirmation_date').val(metaContent.father_firstname);
                        // $('#single_conrfirmation_date_issued').val(metaContent.father_firstname);
                        $('#single_confirmation_by').val(metaContent.confirmation_by);
                        // $('#single_confirmation_fsponsor_firstname').val(metaContent.father_firstname);
                        // $('#single_confirmation_fsponsor_middlename').val(metaContent.father_firstname);
                        // $('#single_confirmation_fsponsor_lastname').val(metaContent.father_firstname);
                        // $('#single_confirmation_ssponsor_firstname').val(metaContent.father_firstname);
                        // $('#single_confirmation_ssponsor_middlename').val(metaContent.father_firstname);
                        // $('#single_confirmation_ssponsor_lastname').val(metaContent.father_firstname);
                        $('#single_confirmation_register_book').val(metaContent.registration_book);
                        $('#single_confirmation_book_page').val(metaContent.book_page);
                        $('#single_confirmation_book_number').val(metaContent.book_number);
                        $('#single_confirmation_parish_priest').val(response.data[0].priest_id);
                        
                        
                        // $('#single_confirmation_form').find('label')
                        // .each(function () {
                        //     $(this).addClass('active');
                        // });
                        // $('#cis_update').val(1);
                        // $('#cid').val(certificateId);
                    }else{
                        var html = "";
                        html += "<h5>Something went wrong!</h5>"
                        +""+response.message+"";
                        $('#modalSysError').modal('open');
                        $(".errMessage").addClass('hide');
                        $('.customMessage').html(html);
                        $(".customMessage").removeClass('hide');
                    }
                }, error: function(e){
                    var html = "";
                    html += "<h5>Something went wrong!</h5>"
                    +""+e.message+"";
                    $('#modalSysError').modal('open');
                    $(".errMessage").addClass('hide');
                    $('.customMessage').html(html);
                    $(".customMessage").removeClass('hide');
                }
            });
        }
    }

    function deleteMarriageCertificate(certificateId){
        isTokenExist();
        var AT = localStorage.getItem("AT");
        checkTokenValidity(AT);

        if(certificateId == undefined || certificateId == null){
            $('#modalSysError').modal('open');
        }else{
            /// Pull out record first
            $.ajax({
                type: "GET",
                url: certificate_endpoint+"/"+certificateId,
                success: function(response){
                    if(response.status == 200){
                        /// Prepare Delete Confirmation Modal
                        $("#recordToDelete").html(response.data[0]['firstname']);
                        var buttonConfirmation = "<button class='btn btnConfirmedDelete' id='"+certificateId+"'>Delete</button> <button class='btn' id='closeConrimation'>Cancel</button>";
                        $('#buttonConfirmation').html(buttonConfirmation);
                        
                        /// Open the modal
                        $('#deleteConfirmationModal').modal('open');

                        /// if confirmed Delete
                        

                        /// else close modal
                        $("#closeConrimation").click(function(){
                            $('#deleteConfirmationModal').modal('close');
                        });

                    }else{
                        console.log('Invalid Code Status');
                    }
                }, error: function(e){
                    console.log(e.message);
                }
            });
        }
    }

    function generateMariagePagination(lastPage, currentPage, pageHtml, path, nextPageURL, certificate){
        for(let i = 0 ; i < lastPage ; i++){
            if(currentPage == parseInt(i+1)){
                pageHtml += `<li class="active"><a class="btnPaginationForDeath" url="${path + "?page=" + parseInt(i+1)}&certificate_type=${certificate}">${i+1}</a></li>`;
            }else{
                pageHtml += `<li class="waves-effect"><a class="btnPaginationForDeath" url="${path + "?page=" + parseInt(i+1)}&certificate_type=${certificate}">${i+1}</a></li>`;
            }
        }
        pageHtml += `<li class='${lastPage == currentPage ? "disabled" : "waves-effect"}'><a class="btnPaginationForDeath ${lastPage == currentPage ? "disabled" : "waves-effect"}" url="${nextPageURL}&certificate_type=${certificate}"><i class="material-icons">chevron_right</i></a></li>
                    </ul>`;

        
        //display the pagination
        $("#paginationDeath").html(pageHtml);
    }
}

// DT: pagination button here...
// Pagination For Death
$(document).on('click', '.btnPaginationForDeath', function(){
    let url = $(this).attr("url");
    let status = $(this).attr("class").split(" ")[1];
    if(status != "disabled"){
        getDeathList(url);
    }
});





// ====================================== General Functions
// reset Class
function resetClass(){
    /// Removing hide class to all tables
    $('#confirmationTable').removeClass('hide');
    $('#marriageTable').removeClass('hide');
    $('#birthTable').removeClass('hide');
    $('#deathTable').removeClass('hide');
    /// Adding hide class to all tables
    $('#confirmationTable').addClass('hide');
    $('#marriageTable').addClass('hide');
    $('#birthTable').addClass('hide');
    $('#deathTable').addClass('hide');

    /// Removing hide class to all forms
    $('#deathForm').removeClass('hide');
    $('#birthForm').removeClass('hide');
    $('#marriageForm').removeClass('hide');
    $('#confirmationForm').removeClass('hide');
    /// Adding hide class to all forms
    $('#deathForm').addClass('hide');
    $('#birthForm').addClass('hide');
    $('#marriageForm').addClass('hide');
    $('#confirmationForm').addClass('hide');


    ///Removing hide class to all individual and by group
    $('.singleConfirmation').removeClass('hide');
    $('.groupConfirmation').removeClass('hide');
    $('.singleMarriage').removeClass('hide');
    $('.groupMarriage').removeClass('hide');
    $('.singleBirth').removeClass('hide');
    $('.groupBirth').removeClass('hide');
    $('.singleDeath').removeClass('hide');
    $('.groupDeath').removeClass('hide');
    ///Adding hide class to all individual and by group
    $('.singleConfirmation').addClass('hide');
    $('.groupConfirmation').addClass('hide');
    $('.singleMarriage').addClass('hide');
    $('.groupMarriage').addClass('hide');
    $('.singleBirth').addClass('hide');
    $('.groupBirth').addClass('hide');
    $('.singleDeath').addClass('hide');
    $('.groupDeath').addClass('hide');
}

/// Setting Dropdown Values
function setFormSelection(){            
    resetClass();
    var selectionFormVal = localStorage.getItem('defaultForm');
    var selectionTableVal = localStorage.getItem('defaultTable');

    if(selectionTableVal == "confirmation"){
        /// Fixing table display
        $('#confirmationTable').removeClass('hide');

        /// Fixing dropdown selction for records
        $("#selectCertificate option:selected").removeAttr('selected');
        $("#selectCertificate option[value='confirmation']").prop('selected', true);

        /// Fixing form display by filter of records
        $('#confirmationForm').removeClass('hide');

        /// Fixing form display by filter of option to add 
        if(selectionFormVal == 'individual'){
            $("#selectForm option:selected").removeAttr('selected');
            $('#selectForm').prop('selectedIndex',1);
            $(".singleConfirmation").removeClass('hide');
        }else{
            $("#selectForm option:selected").removeAttr('selected');
            $('#selectForm').prop('selectedIndex',0);
            $(".groupConfirmation").removeClass('hide');
        }
        $('#selectForm').material_select();
    }else if(selectionTableVal == "mariage"){
        /// Fixing table display
        $('#marriageTable').removeClass('hide');

        /// Fixing dropdown selction for records
        $("#selectCertificate option:selected").removeAttr('selected');
        $("#selectCertificate option[value='mariage']").prop('selected', true);

        /// Fixing form display by filter of records
        $('#marriageForm').removeClass('hide');

        /// Fixing form display by filter of option to add 
        if(selectionFormVal == 'individual'){
            $("#selectForm option:selected").removeAttr('selected');
            $("#selectForm option[value='individual']").prop('selected', true);
            $(".singleMarriage").removeClass('hide');
        }else{
            $("#selectForm option:selected").removeAttr('selected');
            $("#selectForm option[value='group']").prop('selected', true);
            $(".groupMarriage").removeClass('hide');
        }
    }else if(selectionTableVal == "birth"){
        /// Fixing table display
        $('#birthTable').removeClass('hide');

        /// Fixing dropdown selction for records
        $("#selectCertificate option:selected").removeAttr('selected');
        $("#selectCertificate option[value='birth']").prop('selected', true);

        /// Fixing form display by filter of records
        $('#birthForm').removeClass('hide');

        /// Fixing form display by filter of option to add 
        if(selectionFormVal == 'individual'){
            $("#selectForm option:selected").removeAttr('selected');
            $("#selectForm option[value='individual']").prop('selected', true);
            $(".singleBirth").removeClass('hide');
        }else{
            $("#selectForm option:selected").removeAttr('selected');
            $("#selectForm option[value='group']").prop('selected', true);
            $(".groupBirth").removeClass('hide');
        }
    }else if(selectionTableVal == "death"){
        /// Fixing table display
        $('#deathTable').removeClass('hide');

        /// Fixing dropdown selction for records
        $("#selectCertificate option:selected").removeAttr('selected');
        $("#selectCertificate option[value='death']").prop('selected', true);

        /// Fixing form display by filter of records
        $('#deathForm').removeClass('hide');

        /// Fixing form display by filter of option to add 
        if(selectionFormVal == 'individual'){
            $("#selectForm option:selected").removeAttr('selected');
            $("#selectForm option[value='individual']").prop('selected', true);
            $(".singleDeath").removeClass('hide');
        }else{
            $("#selectForm option:selected").removeAttr('selected');
            $("#selectForm option[value='group']").prop('selected', true);
            $(".groupDeath").removeClass('hide');
        }
    }
}