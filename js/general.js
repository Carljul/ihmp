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
                }else{
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

$(document).ready(function(){
    $("#btnRefresh").on('click', function(e){
        $(".errMessage").addClass('hide');
        $(".errorProgressIndicator").removeClass('hide');
        $(this).delay(1000).queue(function(){
            location.reload();
        });
    });
});


//added search handler
$(document).on('keydown', '#searchARecord', function(e){
    let val = $("#searchARecord").val();

    //once enter or tab is clicked
    if(e.keyCode == 13 || e.keyCode == 9){

        // Check If Default Table is selected
        if(localStorage.getItem('defaultTable') === null){

        }else{
            var selectedTable = localStorage.getItem('defaultTable');
            if(selectedTable == "confirmation"){
                //set the url to be returned
                let url = certificate_endpoint+"/"+val+"?certificate_type=confirmation";
                //then recall the function for calling the api
                getConfirmationList(url);
            }else if(selectedTable == "marriage"){
                //set the url to be returned
                let url = certificate_endpoint+"/"+val+"?certificate_type=marriage";
                //then recall the function for calling the api
                getMarriageList(url);
            }else if(selectedTable == "birth"){
                //set the url to be returned
                let url = certificate_endpoint+"/"+val+"?certificate_type=baptism";
                //then recall the function for calling the api
                getBirthList(url);
            }else if(selectedTable == "death"){
                //set the url to be returned
                let url = certificate_endpoint+"/"+val+"?certificate_type=death";
                //then recall the function for calling the api
                getDeathList(url);
            }
        }
    }

});

function ordinal_suffix_of(i) {
    var j = i % 10,
        k = i % 100;
    if (j == 1 && k != 11) {
        return i + "st";
    }
    if (j == 2 && k != 12) {
        return i + "nd";
    }
    if (j == 3 && k != 13) {
        return i + "rd";
    }
    return i + "th";
}

// ==================================== Priest

$(document).on('keydown', '.btnSearchPriestInModal', function(e){

    //get the current value
    let val = $(this).val();

    if(e.keyCode == 13 || e.keyCode == 9){
        //set the url to be returned
        let url = priest_endpoint+"/"+val+"?certificate_type=confirmation";
        getPriestForModal(url, "")
    }

})

// DT: pagination button here...
$(document).on('click', '.btnPaginationPriestModal', function(){
    let url = $(this).attr("url");
    let status = $(this).attr("class").split(" ")[1];
    if(status != "disabled"){
        getPriestForModal(url, "");
    }
});

function getPriestForModal(url, certificateId){
    isTokenExist();
    var AT = localStorage.getItem("AT");
    checkTokenValidity(AT);

    $.ajax({
        type: 'GET',
        url: url == "NA" ? priest_endpoint : url,
        data: {'isIdSearch':false},
        success: function(response){
            var html = "";
            var priestObject = response.data.data;
            var prevPageURL = response.data.prev_page_url;
            var nextPageURL = response.data.next_page_url;
            var path = response.data.path;
            var currentPage = response.data.current_page;
            var lastPage = response.data.last_page;
            var pageHtml = `<ul class="pagination">
                            <li class='${currentPage == 1 ? "disabled" : "waves-effect"}'><a class="btnPaginationPriestModal ${currentPage == 1 ? "disabled" : "waves-effect"}" url="${prevPageURL}"><i class="material-icons">chevron_left</i></a></li>`;
            
            if(response.data.length !== 0){
                for(var x = 0; x < priestObject.length; x++){
                    var midname = priestObject[x]['middlename'] == null || priestObject[x]['middlename'] == "null" ? '':priestObject[x]['middlename'];
                    html += "<tr>"
                    +"<td>"+priestObject[x]['prefix']+"</td>"
                    +"<td>"+priestObject[x]['firstname']+"</td>"
                    +"<td>"+midname+"</td>"
                    +"<td>"+priestObject[x]['lastname']+"</td>"
                    +"<td>"
                        +"<button class='btn btn-wave btnAssign' id='btnAssign-"+priestObject[x]['id']+"'><i class='material-icons'>check</i></button>"
                    +"</td>"
                    +"</tr>";
                }
            }else{
                html += "<tr>"
                            +"<td colspan='5' class='center'> No records found</td>"
                        +"</tr>";

                //display the pagination
                $("#paginationPriestDiv").html("");
            }

            if(lastPage > 1){
                if(currentPage > 2){
                    pageHtml += `<li class="waves-effect"><a class="btnPaginationPriestModal" url="${path + "?page=" + 1}">${1}...</a></li>`;
                }
                for(let i = currentPage - 1; i < (currentPage - 1 )+3; i++){
                    if(currentPage != lastPage){
                        if(currentPage == parseInt(i+1)){
                            pageHtml += `<li class="active"><a class="btnPaginationPriestModal" url="${path + "?page=" + parseInt(i+1)}">${currentPage}</a></li>`;
                        }else{
                            if(parseInt(i+1) >= lastPage){

                            }else{
                                pageHtml += `<li class="waves-effect"><a class="btnPaginationPriestModal" url="${path + "?page=" + parseInt(i+1)}">${i+1}</a></li>`;
                            }
                        }
                    }else{
                        pageHtml += `<li class="waves-effect"><a class="btnPaginationPriestModal" url="${path + "?page=" + i}">${i}</a></li>`;
                        break;
                    }
                }
                pageHtml += `<li class="waves-effect ${lastPage == currentPage ? "active":""}"><a class="btnPaginationPriestModal" url="${path + "?page=" + lastPage}">... up to ${lastPage}</a></li>`;
                pageHtml += `<li class='${lastPage == currentPage ? "disabled" : "waves-effect"}'><a class="btnPaginationPriestModal ${lastPage == currentPage ? "disabled" : "waves-effect"}" url="${nextPageURL}"><i class="material-icons">chevron_right</i></a></li>
                            </ul>`;
                //display the pagination
                $("#paginationPriestDiv").html(pageHtml);
            }

            if(lastPage == 1){
                //display the pagination
                $("#paginationPriestDiv").html("");
            }

            //display the data to table
            $("#priestList").html(html);

            /// Update Priest
            $(".btnAssign").on("click",function(){
                var priestId = $(this).attr("id").substr('btnAssign-'.length);
                showToAssignPriest(priestId, certificateId);
            });


        },error: function(e){
            $('#modalSysError').modal('open');
        }
    });

    function showToAssignPriest(priestId, certificateId){
        isTokenExist();
        var AT = localStorage.getItem("AT");
        checkTokenValidity(AT);
        
        var delagatedId = parseInt(localStorage.getItem('delegatedUser'));
        var delegated_user = AT.substring(delagatedId+1, AT.length);


        if(priestId == undefined || priestId == null){
            $('#modalSysError').modal('open');
        }else{
            $.ajax({
                type: "GET",
                url: priest_endpoint+"/"+priestId,
                data: {'isIdSearch':true},
                success: function(response){
                    if(response.status >= 200 && response.status < 400){
                        var payload = {
                            "priest_id": priestId,
                            "created_by": delegated_user
                        };

                        // Update Records priest
                        $.ajax({
                            type: "PUT",
                            url: certificate_priest_endpoint+"/"+certificateId,
                            data: payload,
                            success: function(response){
                                if(response.status >= 200 && response.status < 400){
                                    $("#assignPriestModalForm").modal('close');
                                    var certificate_in_storage = localStorage.getItem('defaultTable');
                                    var selectedTable = localStorage.getItem('defaultTable');
                                    if(selectedTable == "confirmation"){
                                        getConfirmationList("NA");
                                    }else if(selectedTable == "marriage"){
                                        getBirthList("NA");
                                    }else if(selectedTable == "birth"){
                                        getMarriageList("NA");
                                    }else if(selectedTable == "death"){
                                        getDeathList("NA");
                                    }
                                    printTypeCertificate(certificateId,certificate_in_storage);
                                }else {
                                    Materialize.toast('Something Went Wrong:: '+JSON.stringify(response.message), 5000, 'red rounded');
                                }
                            }, error: function(e){
                                Materialize.toast('Something Went Wrong:: '+e.responseJSON.message, 5000, 'red rounded');
                            }
                        });
                    }else{
                        Materialize.toast('Something Went Wrong:: '+JSON.stringify(response.message), 5000, 'red rounded');
                    }
                }, error: function(e){
                    Materialize.toast('Something Went Wrong:: '+e.responseJSON.message, 5000, 'red rounded');
                }
            });
        }
    }
}

// ==================================== Print
function printCertificate(personData){
    // This will get the certificate saved in the template
    $.ajax({
        type: "GET",
        url: template_endpoint+"/"+personData.certificate_type,
        data: {'certificate_type':personData.certificate_type, 'isIdSearch':'true', 'templateToSearch':personData.certificate_type},
        success: function(response){
            if(response.status >= 200 && response.status < 400){
                var templateData = response.data.data[0];

                if(templateData['is_template'] == 0){
                    if(response.data.data.length > 0){
                        // Edit Content before adding to print functionality
                        var printContent = response.data.data[0]['content'];
                        console.log(personData);
                        // condition to certificate to insert contents of user
                        if(personData.certificate_type == 'confirmation'){
                            // Source Link
                            printContent = printContent.replaceAll('sourceLink', `${system_url}/css/materialize.css`);
                            // Middle name
                            var confirmation_middlename = personData['content']['middlename'] == null ? "" : personData['content']['middlename'];
                            // Full name
                            var fname = personData['content']['firstname']+" "+confirmation_middlename+" "+personData['content']['lastname']+" "+personData['content']['suffix'];
                            printContent = printContent.replaceAll('fullname',fname);
                            // Parsing Meta Content
                            var metaContent = JSON.parse(personData['content']['meta']);
                            // Fathers Name
                            var fathersName = metaContent['father_firstname']+" "+metaContent['father_middlename']+" "+metaContent['father_lastname']+" "+metaContent['father_suffix'];
                            printContent = printContent.replaceAll('fathers_name',fathersName == ''?'&nbsp;':fathersName);
                            // Mothers Name
                            var motherName = metaContent['mother_firstname']+" "+metaContent['mother_middlename']+" "+metaContent['mother_lastname']+" "+metaContent['mother_suffix'];
                            printContent = printContent.replaceAll('mothers_name',motherName == ''?'&nbsp;':motherName);
                            // confirmation_day
                            var confirmation_day = ordinal_suffix_of(metaContent['confirmation_day']);
                            printContent = printContent.replaceAll('number_day',confirmation_day);
                            // confirmation_month
                            var confirmation_month = monthNames[metaContent['confirmation_month'] - 1];
                            printContent = printContent.replaceAll('month_text',confirmation_month);
                            // confirmation_year
                            var confirmation_year = metaContent['confirmation_year'].toString().substring(2);;
                            printContent = printContent.replaceAll('year',confirmation_year);
                            // confirmation_by
                            var confirmation_by = metaContent['confirmation_by'];
                            printContent = printContent.replaceAll('priest_name',confirmation_by == ''?'&nbsp;':confirmation_by);
                            // first sponsor
                            var first_sponsor = metaContent['first_sponsor'];
                            printContent = printContent.replaceAll('first_sponsor',first_sponsor == ''?'&nbsp;':first_sponsor);
                            // second sponsor
                            var second_sponsor = metaContent['second_sponsor'];
                            printContent = printContent.replaceAll('second_sponsor',second_sponsor == ''?'&nbsp;':second_sponsor);
                            // registration_book
                            var registration_book = metaContent['registration_book'];
                            printContent = printContent.replaceAll('register_book',registration_book == ''?'&nbsp;':registration_book);
                            // book_page
                            var book_page = metaContent['book_page'];
                            printContent = printContent.replaceAll('page_number',book_page == ''?'&nbsp;':book_page);
                            // book_number
                            var book_number = metaContent['book_number'];
                            printContent = printContent.replaceAll('cert_no',book_number == ''?'&nbsp;':book_number);
                            // date_issue
                            var date_issued = new Date(metaContent['date_issued']);
                            printContent = printContent.replaceAll('date_issue',monthNames[date_issued.getMonth()]+" "+date_issued.getDate()+", "+date_issued.getFullYear());
                        }else if(personData.certificate_type == 'marriage'){
                            printContent = printContent.replaceAll('sourceLink', `${system_url}/css/materialize.css`);
                            // Root Content
                            var rootContent = personData['content'];
                            // Parsing Meta Content
                            var metaContent = JSON.parse(personData['content']['meta']);
                            // Middle name
                            var husband_middlename = metaContent['husband_middlename'] == null ? "" : metaContent['husband_middlename'];
                            // husbands_name
                            var fname = metaContent['husband_firstname']+" "+husband_middlename+" "+metaContent['husband_lastname']+" "+metaContent['husband_suffix'];
                            printContent = printContent.replaceAll('husbands_name',fname);
                            // husbands_age
                            var hage = metaContent['husband_age'];
                            printContent = printContent.replaceAll('husbands_age',hage);
                            // husbands_civil_status
                            var husband_civil_status = metaContent['husband_civil_status'];
                            printContent = printContent.replaceAll('husbands_civil_status',husband_civil_status);
                            // husbands_date_of_birth
                            var husband_birthdate = new Date(metaContent['husband_birthdate']);
                            printContent = printContent.replaceAll('husbands_date_of_birth',monthNames[husband_birthdate.getMonth()-1]+" "+husband_birthdate.getDate()+", "+husband_birthdate.getFullYear());
                            // husbands_place_of_birth
                            var husband_birthplace = metaContent['husband_birthplace'];
                            printContent = printContent.replaceAll('husbands_place_of_birth',husband_birthplace);
                            // husbands_residence
                            var husband_residence = metaContent['husband_residence'];
                            printContent = printContent.replaceAll('husbands_residence',husband_residence == ''?'&nbsp;':husband_residence);
                            // husbands_date_of_baptism
                            var husband_baptismdate = new Date(metaContent['husband_baptismdate']);
                            printContent = printContent.replaceAll('husbands_date_of_baptism',monthNames[husband_baptismdate.getMonth()-1]+" "+husband_baptismdate.getDate()+", "+husband_baptismdate.getFullYear());
                            // husbands_fathers_name
                            var husband_fathersname = metaContent['husband_fathersname'];
                            printContent = printContent.replaceAll('husbands_fathers_name',husband_fathersname == ''?'&nbsp;':husband_fathersname);
                            // husbands_mothers_name
                            var husband_mothersname = metaContent['husband_mothersname'];
                            printContent = printContent.replaceAll('husbands_mothers_name',husband_mothersname == ''?'&nbsp;':husband_mothersname);
                            // husbands_first_witness
                            var husband_firstwitness = metaContent['husband_firstwitness'];
                            printContent = printContent.replaceAll('husbands_first_witness',husband_firstwitness == ''?'&nbsp;':husband_firstwitness);
                            // husbands_second_witness
                            var husband_secondwitness = metaContent['husband_secondwitness'];
                            printContent = printContent.replaceAll('husbands_second_witness',husband_secondwitness == ''?'&nbsp;':husband_secondwitness);

                            // Middle name
                            var wife_middlename = metaContent['wife_middlename'] == null ? "" : metaContent['wife_middlename'];
                            // wifes_name
                            var wfname = metaContent['wife_firstname']+" "+wife_middlename+" "+metaContent['wife_lastname']+" "+metaContent['wife_suffix'];
                            printContent = printContent.replaceAll('wifes_name',wfname);
                            // wifes_age
                            var wife_age = metaContent['wife_age'];
                            printContent = printContent.replaceAll('wifes_age',wife_age);
                            // wifes_civil_status
                            var wife_civil_status = metaContent['wife_civil_status'];
                            printContent = printContent.replaceAll('wifes_civil_status',wife_civil_status);
                            // wifes_date_of_birth
                            var wife_birthdate = new Date(metaContent['wife_birthdate']);
                            printContent = printContent.replaceAll('wifes_date_of_birth',monthNames[wife_birthdate.getMonth()-1]+" "+wife_birthdate.getDate()+", "+wife_birthdate.getFullYear());
                            // wifes_place_of_birth
                            var wife_birthplace = metaContent['wife_birthplace'];
                            printContent = printContent.replaceAll('wifes_place_of_birth',wife_birthplace);
                            // wifes_residence
                            var wife_residence = metaContent['wife_residence'];
                            printContent = printContent.replaceAll('wifes_residence',wife_residence == ''?'&nbsp;':wife_residence);
                            // wifes_date_of_baptism
                            var wife_baptismdate = new Date(metaContent['wife_baptismdate']);
                            printContent = printContent.replaceAll('wifes_date_of_baptism',monthNames[wife_baptismdate.getMonth()-1]+" "+wife_baptismdate.getDate()+", "+wife_baptismdate.getFullYear());
                            // wifes_fathers_name
                            var wife_fathersname = metaContent['wife_fathersname'];
                            printContent = printContent.replaceAll('wifes_fathers_name',wife_fathersname == ''?'&nbsp;':wife_fathersname);
                            // wifes_mothers_name
                            var wife_mothersname = metaContent['wife_mothersname'];
                            printContent = printContent.replaceAll('wifes_mothers_name',wife_mothersname == ''?'&nbsp;':wife_mothersname);
                            // wifes_first_witness
                            var wife_firstwitness = metaContent['wife_firstwitness'];
                            printContent = printContent.replaceAll('wifes_first_witness',wife_firstwitness == ''?'&nbsp;':wife_firstwitness);
                            // wifes_second_witness
                            var wife_secondwitness = metaContent['wife_secondwitness'];
                            printContent = printContent.replaceAll('wifes_second_witness',wife_secondwitness == ''?'&nbsp;':wife_secondwitness);

                            // place_of_marriage
                            var marriage_place = metaContent['marriage_place'];
                            printContent = printContent.replaceAll('place_of_marriage',marriage_place);
                            // date_of_marriage
                            var marriage_date = new Date(metaContent['marriage_date']);
                            printContent = printContent.replaceAll('date_of_marriage',monthNames[marriage_date.getMonth()-1]+" "+marriage_date.getDate()+", "+marriage_date.getFullYear());
                            // solemnized_by
                            var solemnized_by = metaContent['solemnized_by'];
                            printContent = printContent.replaceAll('solemnized_by',solemnized_by);
                            // marriages_no
                            var marriage_number = metaContent['marriage_number'];
                            printContent = printContent.replaceAll('marriages_no',marriage_number == ''?'&nbsp;':marriage_number);
                            // page_no
                            var marriage_page = metaContent['marriage_page'];
                            printContent = printContent.replaceAll('page_no',marriage_page == ''?'&nbsp;':marriage_page);
                            // line_no
                            var marriage_line = metaContent['marriage_line'];
                            printContent = printContent.replaceAll('line_no',marriage_line == ''?'&nbsp;':marriage_line);
                            // number_day
                            var marriage_day = ordinal_suffix_of(metaContent['marriage_day']);
                            printContent = printContent.replaceAll('number_day',marriage_day);
                            // month_text
                            var marriage_month = monthNames[metaContent['marriage_month'] - 1];
                            printContent = printContent.replaceAll('month_text',marriage_month);
                            // year_in_two
                            var marriage_year = metaContent['marriage_year'].toString().substring(2);
                            printContent = printContent.replaceAll('year_in_two',marriage_year);
                            // parish_priest
                            if(rootContent['priest_id'] != null){
                                var mname = rootContent['priest_mname'] == null ? '':rootContent['priest_mname'].charAt(0)+". ";
                                var priest_name = rootContent['priest_clergy']+" "+rootContent['priest_fname']+" "+mname+" "+rootContent['priest_lname'];
                                printContent = printContent.replaceAll('parish_priest',priest_name);
                            }else{
                                printContent = printContent.replaceAll('parish_priest','');
                            }
                        }else if(personData.certificate_type == 'birth'){
                            // Root Content
                            var rootContent = personData['content'];
                            // Parsing Meta Content
                            var metaContent = JSON.parse(personData['content']['meta']);
                            var suffix = rootContent['suffix'];
                            if(rootContent['suffix'] == null){
                                suffix = "";
                            }
                            // Middle name
                            let birth_middlename = rootContent['middlename'] == null ? "" : rootContent['middlename'];
                            // Middle name
                            let birth_father_middlename = rootContent['father_middlename'] == null ? "" : rootContent['father_middlename'];
                            let birth_mother_middlename = rootContent['mother_middlename'] == null ? "" : rootContent['mother_middlename'];
                            // fullname
                            var fname = rootContent['firstname']+" "+birth_middlename+" "+rootContent['lastname']+" "+suffix;
                            printContent = printContent.replaceAll('fullname',fname);
                            // born_on_date
                            var born_on = new Date(metaContent['born_on']);
                            printContent = printContent.replaceAll('born_on_date',monthNames[born_on.getMonth() - 1]+" "+born_on.getDate()+", "+born_on.getFullYear());
                            // born_in_date
                            var born_in = metaContent['born_in'];
                            printContent = printContent.replaceAll('born_in_date',born_in == ''?'&nbsp;':born_in);
                            // fathers_name
                            var father_fullname = metaContent['father_firstname']+" "+birth_father_middlename+" "+metaContent['father_lastname']+" "+metaContent['father_suffix'];
                            printContent = printContent.replaceAll('fathers_name',father_fullname == ''?'&nbsp;':father_fullname);
                            // mothers_name
                            var mothers_fullname = metaContent['mother_firstname']+" "+birth_mother_middlename+" "+metaContent['mother_lastname']+" "+metaContent['mother_suffix'];
                            printContent = printContent.replaceAll('mothers_name',mothers_fullname == ''?'&nbsp;':mothers_fullname);
                            // residents_of
                            var resident_of = metaContent['resident_of'];
                            printContent = printContent.replaceAll('residents_of',resident_of == ''?'&nbsp;':resident_of);
                            // date_of_baptism
                            var baptism_date = new Date(metaContent['baptism_date']);
                            printContent = printContent.replaceAll('date_of_baptism',monthNames[baptism_date.getMonth()-1]+" "+baptism_date.getDate()+", "+baptism_date.getFullYear());
                            // minister_of
                            var baptism_minister = metaContent['baptism_minister'];
                            printContent = printContent.replaceAll('minister_of',baptism_minister == ''?'&nbsp;':baptism_minister);
                            // godparentes_list
                            var godparents = metaContent['godparents'];
                            printContent = printContent.replaceAll('godparents_list',godparents == ''?'&nbsp;':godparents);
                            // baptismal_register
                            var baptismal_register = metaContent['baptismal_register'];
                            printContent = printContent.replaceAll('baptismal_register',baptismal_register == ''?'&nbsp;':baptismal_register);
                            // volume_number
                            var volume = metaContent['volume'];
                            printContent = printContent.replaceAll('volume_number',volume == ''?'&nbsp;':volume);
                            // page_number
                            var page = metaContent['page'];
                            printContent = printContent.replaceAll('page_number',page == ''?'&nbsp;':page);
                            // parish_priest
                            if(rootContent['priest_id'] != null){
                                var mname = rootContent['priest_mname'] == null ? '':rootContent['priest_mname'].charAt(0)+".";
                                var priest_name = rootContent['priest_clergy']+" "+rootContent['priest_fname']+" "+mname+" "+rootContent['priest_lname'];
                                printContent = printContent.replaceAll('parish_priest',priest_name);
                            }else{
                                printContent = printContent.replaceAll('parish_priest','');
                            }
                            // date_issued
                            if(metaContent['date_issued'] == 'NaN/NaN/NaN'){
                                printContent = printContent.replaceAll('date_issued','');
                            }else{
                                var date_issued = new Date(metaContent['date_issued']);
                                printContent = printContent.replaceAll('date_issued',monthNames[date_issued.getMonth()-1]+" "+date_issued.getDate()+", "+date_issued.getFullYear());
                            }
                        }else if(personData.certificate_type == 'death'){
                            // Middle name
                            let middlename = personData['content']['middlename'] == null ? "" : personData['content']['middlename'];
                            // fullname_system
                            var fname = personData['content']['firstname']+" "+middlename+" "+personData['content']['lastname']+" "+personData['content']['suffix'];
                            printContent = printContent.replaceAll('fullname_system',fname);
                            
                            // Parsing Meta Content
                            var metaContent = JSON.parse(personData['content']['meta']);
                            
                            // age_system
                            var age = metaContent['age'];
                            printContent = printContent.replaceAll('age_system',age == ''?'&nbsp;':age);
                            // residence_of_system
                            var residence = metaContent['residence'];
                            printContent = printContent.replaceAll('residence_of_system',residence == ''?'&nbsp;':residence);
                            // date_of_death_system
                            var date_of_death = new Date(metaContent['date_of_death']);
                            printContent = printContent.replaceAll('date_of_death_system',monthNames[date_of_death.getMonth()]+" "+date_of_death.getDate()+", "+date_of_death.getFullYear());
                            // place_of_burial_system
                            var place_of_burial = metaContent['place_of_burial'];
                            printContent = printContent.replaceAll('place_of_burial_system',place_of_burial);
                            // date_of_burial_system
                            var date_of_burial = new Date(metaContent['date_of_burial']);
                            printContent = printContent.replaceAll('date_of_burial_system',monthNames[date_of_burial.getMonth()]+" "+date_of_burial.getDate()+", "+date_of_burial.getFullYear());
                            // informant_system
                            var informant_or_relatives = metaContent['informant_or_relatives'];
                            printContent = printContent.replaceAll('informant_system',informant_or_relatives == ''?'&nbsp;':informant_or_relatives);
                            // book_number_system
                            var book_number = metaContent['book_number'];
                            printContent = printContent.replaceAll('book_number_system',book_number == ''?'&nbsp;':book_number);
                            // page_number_system
                            var page_number = metaContent['page_number'];
                            printContent = printContent.replaceAll('page_number_system',page_number == ''?'&nbsp;':page_number);
                            // registry_number_system
                            var registry_number = metaContent['registry_number'];
                            printContent = printContent.replaceAll('registry_number_system',registry_number == ''?'&nbsp;':registry_number);
                            // date_issued_system
                            var date_issued = new Date(metaContent['date_issued']);
                            printContent = printContent.replaceAll('date_issued_system',monthNames[date_issued.getMonth()]+" "+date_issued.getDate()+", "+date_issued.getFullYear());
                        }

                        
                        var a = window.open('', '', 'height=1000, width=1000, fullscreen=yes, channelmode=yes');
                        setTimeout(() => {
                            a.document.write(printContent);
                        },1000); // make this 2 seconds
                        setTimeout(() => {
                            a.print();
                            a.close();
                        }, 1500); // make this 2.5 seconds
                    }else{
                        Materialize.toast('Template is unavailable, Please contact your app administrator', 5000, 'red rounded');
                    }
                }else{
                    var meta_to_print = personData['content']['meta'];
                    console.log(meta_to_print);

                    var cons = personData['content'];
                    delete cons['meta'];
                    var content_to_print = JSON.stringify(cons);

                    
                    window.location.href = "print/"+personData.certificate_type+"/"+content_to_print+"/"+meta_to_print;
                }
            }else{
                Materialize.toast('Certificate Template is not yet ready', 5000, 'red rounded');
            }
        }, error: function(e){
            Materialize.toast('Certificate Template is not yet ready', 5000, 'red rounded');
        }
    });
}


function printTypeCertificate(certificateId, certificate_type){
    isTokenExist();
    var AT = localStorage.getItem("AT");
    checkTokenValidity(AT);

    if(certificateId == undefined || certificateId == null){
        $('#modalSysError').modal('open');
    }else{
        $.ajax({
            type: "GET",
            url: certificate_endpoint+"/"+certificateId,
            data: {'certificate_type':certificate_type, 'isIdSearch':'true'},
            success: function(response){
                if(response.status >= 200 && response.status < 400){
                    var rootContent = response.data[0];
                    // Check if Priest ID is empty
                    if(rootContent['priest_id'] == null){
                        DayPilot.Modal.confirm(
                            "<h5><b>Set Parish Priest</b></h5>This record has no parish priest set as of the moment<br>Do you want to set it first before printing?",
                            { okText: "Yes", cancelText: "No", theme: "modal_flat"}).
                            then(function(args) { 
                                // This means user clicks No
                                if(args.result == undefined){
                                    var payload = {
                                        "certificate_type":certificate_type,
                                        "content": rootContent
                                    };
                                    printCertificate(payload);
                                }else{
                                    // Call API
                                    getPriestForModal("NA", certificateId);
                                    // Assign priest then recall print
                                    $("#assignPriestModalForm").modal('open');
                                }
                            });
                    }else{
                        var payload = {
                            "certificate_type":certificate_type,
                            "content": rootContent
                        };
                        printCertificate(payload);
                    }
                }else{
                    Materialize.toast('Something Went Wrong:: '+JSON.stringify(response.message), 5000, 'red rounded');
                }
            }, error: function(e){
                Materialize.toast('Something Went Wrong:: '+e.responseJSON.message, 5000, 'red rounded');
            }
        });
    }

}

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
            var html = "";
            var pageHtml = "";

            if(response.data.length == 0 || response.data.data.length == 0){
                html+= "<tr>"
                +"<td colspan='21'>No Records Matched.</td>"
                +"</tr>";
                $("#confirmationListTable").html(html);
                
                //display the pagination
                $("#paginationCertificate").html(pageHtml);
            }else{
                var confirmationObject = response.data.data;
                var prevPageURL = response.data.prev_page_url;
                var nextPageURL = response.data.next_page_url;
                var path = response.data.path;
                var currentPage = response.data.current_page;
                var lastPage = response.data.last_page;
                pageHtml = `<ul class="pagination">
                                <li class='${currentPage == 1 ? "disabled" : "waves-effect"}'><a class="btnPaginateConfirmation ${currentPage == 1 ? "disabled" : "waves-effect"}" url="${prevPageURL}&certificate_type=${certificateType}"><i class="material-icons">chevron_left</i></a></li>`;
                for(var x = 0; x < confirmationObject.length; x++){
                    var metaContent = JSON.parse(confirmationObject[x]['meta']);
                    var rootContent = confirmationObject[x];
                    var suffix = rootContent['suffix'] == null ? '':rootContent['suffix'];
                    html+='<tr>'
                    +'<!-- Actions -->'
                    +'<td><button class="btn waves-effect btn-actions blue tooltipped btnPrintCCertificate" id="btnPrintCCertificate-'+rootContent['id']+'" data-position="bottom" data-delay="50" data-tooltip="Print Record"><i class="material-icons">print</i></button></td>'
                    +'<td><button class="btn waves-effect btn-actions green tooltipped btnUpdateCCertificate" id="btnUpdateCCertificate-'+rootContent['id']+'" data-position="bottom" data-delay="50" data-tooltip="Update Record"><i class="material-icons">edit</i></button></td>'
                    +'<td><button class="btn waves-effect btn-actions red tooltipped btnDeleteCCertificate" id="btnDeleteCCertificate-'+rootContent['id']+'" data-position="bottom" data-delay="50" data-tooltip="Delete Record"><i class="material-icons">delete</i></button></td>'
                    +'<!-- Confirmation Date -->';

                    html+='<!-- Record of -->'
                    +'<td><label style="font-size: 9px;">First Name</label><br>'+rootContent['firstname']+'</td>'
                    +'<td><label style="font-size: 9px;">Middle Name</label><br>'+(rootContent['middlename'] == null || rootContent['middlename'] == 'null' ? '' : rootContent['middlename'])+'</td>'
                    +'<td><label style="font-size: 9px;">Last Name</label><br>'+rootContent['lastname']+'</td>'
                    +'<td><label style="font-size: 9px;">Extension</label><br>'+suffix+'</td>'
                    +'<!-- Fathers Name -->';
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
                    html+='<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['father_firstname']+'</td>'
                    +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['father_middlename']+'</td>'
                    +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['father_lastname']+'</td>'
                    +'<td><label style="font-size: 9px;">Extension</label><br>'+metaContent['father_suffix']+'</td>'
                    +'<!-- Mothers Name -->'
                    +'<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['mother_firstname']+'</td>'
                    +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['mother_middlename']+'</td>'
                    +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['mother_lastname']+'</td>'
                    +'<td><label style="font-size: 9px;">Extension</label><br>'+metaContent['mother_suffix']+'</td>'
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
                        var mname = rootContent['priest_mname'] == null ? '':rootContent['priest_mname'];
                        html+='<td><label style="font-size: 9px;">Name</label><br>'+rootContent['priest_clergy']+' '+rootContent['priest_fname']+' '+mname+' '+rootContent['priest_lname']+'</td>';
                    }
                    html+='</tr>';
                }
                if(lastPage > 1){
                    generatePagination(lastPage, currentPage, pageHtml, path, nextPageURL, certificateType);
                }

                if(lastPage == 1){
                    //display the pagination
                    $("#paginationCertificate").html("");
                }
            }

            $("#confirmationListTable").html(html);
            $('.tooltipped').tooltip({delay: 50});

            /// Print Confirmation Certificate
            $(".btnPrintCCertificate").on('click', function(e){
                e.preventDefault();
                var certificateId = $(this).attr("id").substr('btnPrintCCertificate-'.length);
                printTypeCertificate(certificateId, 'confirmation');
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
        }, error: function(e){
            Materialize.toast('Something Went Wrong:: '+e.responseJSON.message, 5000, 'red rounded');
            console.log('["Confirmation Error"]: '+e.responseJSON.message);
        }
    });


    function showToUpdateConfirmationCertificate(certificateId){
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
                        $('#single_confirmation_extension').val(response.data[0].suffix);
                        $('#single_confirmation_father_firstname').val(metaContent.father_firstname);
                        $('#single_confirmation_father_middlename').val(metaContent.father_middlename);
                        $('#single_confirmation_father_lastname').val(metaContent.father_lastname);
                        $('#single_confirmation_father_extension').val(metaContent.father_suffix);
                        $('#single_confirmation_mother_firstname').val(metaContent.mother_firstname);
                        $('#single_confirmation_mother_middlename').val(metaContent.mother_middlename);
                        $('#single_confirmation_mother_lastname').val(metaContent.mother_lastname);
                        $('#single_confirmation_mother_extension').val(metaContent.mother_suffix);
                        
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
        if(currentPage > 2){
            pageHtml += `<li class="waves-effect"><a class="btnPaginateConfirmation" url="${path + "?page=" + 1}&certificate_type=${certificate}">${1}...</a></li>`;
        }
        for(let i = currentPage - 1; i < (currentPage - 1 )+3; i++){
            if(currentPage != lastPage){
                if(currentPage == parseInt(i+1)){
                    pageHtml += `<li class="active"><a class="btnPaginateConfirmation" url="${path + "?page=" + parseInt(i+1)}&certificate_type=${certificate}">${currentPage}</a></li>`;
                }else{
                    if(parseInt(i+1) >= lastPage){

                    }else{
                        pageHtml += `<li class="waves-effect"><a class="btnPaginateConfirmation" url="${path + "?page=" + parseInt(i+1)}&certificate_type=${certificate}">${i+1}</a></li>`;
                    }
                }
            }else{
                pageHtml += `<li class="waves-effect"><a class="btnPaginateConfirmation" url="${path + "?page=" + i}&certificate_type=${certificate}">${i}</a></li>`;
                break;
            }
        }
        pageHtml += `<li class="waves-effect ${lastPage == currentPage ? "active":""}"><a class="btnPaginateConfirmation" url="${path + "?page=" + lastPage}&certificate_type=${certificate}">... up to ${lastPage}</a></li>`;
        pageHtml += `<li class='${lastPage == currentPage ? "disabled" : "waves-effect"}'><a class="btnPaginateConfirmation ${lastPage == currentPage ? "disabled" : "waves-effect"}" url="${nextPageURL}&certificate_type=${certificate}"><i class="material-icons">chevron_right</i></a></li>
                    </ul>`;

        
        //display the pagination
        $("#paginationCertificate").html(pageHtml);

    }
}

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
            var html = "";
            var pageHtml = "";

            if(response.data.length == 0 || response.data.data.length == 0){
                html+= "<tr>"
                +"<td colspan='21'>No Records Matched.</td>"
                +"</tr>";
                $("#birthListTable").html(html);

                //display the pagination
                $("#paginationBirth").html(pageHtml);
            }else{
                var birthObject = response.data.data;
                var prevPageURL = response.data.prev_page_url;
                var nextPageURL = response.data.next_page_url;
                var path = response.data.path;
                var currentPage = response.data.current_page;
                var lastPage = response.data.last_page;
                pageHtml = `<ul class="pagination">
                                <li class='${currentPage == 1 ? "disabled" : "waves-effect"}'><a class="btnPaginationForBirth ${currentPage == 1 ? "disabled" : "waves-effect"}" url="${prevPageURL}&certificate_type=${certificateType}"><i class="material-icons">chevron_left</i></a></li>`;
                for(var x = 0; x < birthObject.length; x++){
                    var metaContent = JSON.parse(birthObject[x]['meta']);
                    var rootContent = birthObject[x];
                    console.log("Testing"+metaContent['date_issued']);
                    var dateIssued = "Not Set";
                    if(metaContent['date_issued'] != "NaN/NaN/NaN"){
                        dateIssued = metaContent['date_issued'];
                    }
                    
                    var suffix = rootContent['suffix'] == null ? '':rootContent['suffix'];
                    var father_suffix = metaContent['father_suffix'] == undefined ? '':metaContent['father_suffix'];
                    var mother_suffix = metaContent['mother_suffix'] == undefined ? '':metaContent['mother_suffix'];
                    var midName = rootContent['middlename'] == null ? '':rootContent['middlename'];
                    
                    html+= '<tr>'
                        +'<!-- Actions -->'
                        +'<td><button class="btn waves-effect btn-actions blue tooltipped btnPrintBCertificate" id="btnPrintBCertificate-'+rootContent['id']+'" data-position="bottom" data-delay="50" data-tooltip="Print Record"><i class="material-icons">print</i></button></td>'
                        +'<td><button class="btn waves-effect btn-actions green tooltipped btnUpdateBCertificate" id="btnUpdateBCertificate-'+rootContent['id']+'" data-position="bottom" data-delay="50" data-tooltip="Update Record"><i class="material-icons">edit</i></button></td>'
                        +'<td><button class="btn waves-effect btn-actions red tooltipped btnDeleteBCertificate" id="btnDeleteBCertificate-'+rootContent['id']+'" data-position="bottom" data-delay="50" data-tooltip="Delete Record"><i class="material-icons">delete</i></button></td>'
                        +'<!-- Record of -->'
                        +'<td><label style="font-size: 9px;">First Name</label><br>'+rootContent['firstname']+'</td>'
                        +'<td><label style="font-size: 9px;">Middle Name</label><br>'+midName+'</td>'
                        +'<td><label style="font-size: 9px;">Last Name</label><br>'+rootContent['lastname']+'</td>'
                        +'<td><label style="font-size: 9px;">Extension</label><br>'+suffix+'</td>'
                        +'<!-- Born On -->'
                        +'<td>'+metaContent['born_on']+'</td>'
                        +'<!-- Born In -->'
                        +'<td><label style="font-size: 9px;">Born In</label><br>'+metaContent['born_in']+'</td>'
                        +'<!-- Born In -->'
                        +'<td><label style="font-size: 9px;">Baptism Date</label><br>'+metaContent['baptism_date']+'</td>'
                        +'<td><label style="font-size: 9px;">Minister</label><br>'+metaContent['baptism_minister']+'</td>'
                        +'<!-- Fathers Name -->'
                        +'<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['father_firstname']+'</td>'
                        +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['father_middlename']+'</td>'
                        +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['father_lastname']+'</td>'
                        +'<td><label style="font-size: 9px;">Extension</label><br>'+father_suffix+'</td>'
                        +'<!-- Mothers Name -->'
                        +'<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['mother_firstname']+'</td>'
                        +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['mother_middlename']+'</td>'
                        +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['mother_lastname']+'</td>'
                        +'<td><label style="font-size: 9px;">Extension</label><br>'+mother_suffix+'</td>'
                        +'<!-- Residents of -->'
                        +'<td><label style="font-size: 9px;">Address</label><br>'+metaContent['resident_of']+'</td>'
                        +'<!-- Godparents -->'
                        +'<td><label style="font-size: 9px;">Godparents</label><br>'+metaContent['godparents']+'</td>'
                        +'<!-- Other Details -->'
                        +'<td><label style="font-size: 9px;">Baptismal Register</label><br>'+metaContent['baptismal_register']+'</td>'
                        +'<td><label style="font-size: 9px;">Volume</label><br>'+metaContent['volume']+'</td>'
                        +'<td><label style="font-size: 9px;">Page Number</label><br>'+metaContent['page']+'</td>'
                        +'<td><label style="font-size: 9px;">Date Issued</label><br>'+dateIssued+'</td>'
                        +'<!-- Parish Priest -->';
                        var pname = rootContent['priest_fname'];
                        if(pname == null || pname == undefined || pname == NaN){
                            html+='<td><label style="font-size: 9px;">Name</label><br>Not Set</td>';
                        }else{
                            var mname = rootContent['priest_mname'] == null ? '':rootContent['priest_mname'];
                            html+='<td><label style="font-size: 9px;">Name</label><br>'+rootContent['priest_clergy']+' '+rootContent['priest_fname']+' '+mname+' '+rootContent['priest_lname']+'</td>';
                        }
                        html+='</tr>';
                }
                if(lastPage > 1){
                    generateBirthPagination(lastPage, currentPage, pageHtml, path, nextPageURL, certificateType);
                }

                if(lastPage == 1){
                    //display the pagination
                    $("#paginationBirth").html("");       
                }
            }

            $("#birthListTable").html(html);
            $('.tooltipped').tooltip({delay: 50});

            /// Print Confirmation Certificate
            $(".btnPrintBCertificate").on('click', function(){
                var certificateId = $(this).attr("id").substr('btnPrintCCertificate-'.length);
                printTypeCertificate(certificateId, 'birth');
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
                        var responseContent = response.data[0];
                        $('#birth_firstname').val(responseContent.firstname);
                        $('#birth_middlename').val(responseContent.middlename);
                        $('#birth_lastname').val(responseContent.lastname);
                        $('#birth_extension').val(responseContent.suffix);


                        if(metaContent.born_on != null){
                            // Born On
                            var convertedBornOn = new Date(metaContent.born_on);
                            $('#birth_date').val(convertedBornOn.getDate() + " " +monthNames[convertedBornOn.getMonth()] +", "+convertedBornOn.getFullYear());
                            var $birth_date_on = $('#birth_date').pickadate();

                            // Use the picker object directly.
                            var birthDatePicker = $birth_date_on.pickadate('picker');
                            birthDatePicker.set('select', [convertedBornOn.getFullYear(), convertedBornOn.getMonth(), convertedBornOn.getDate()]);
                        }

                        $('#birth_location').val(metaContent.born_in);
                        
                        $('#birth_father_firstname').val(metaContent.father_firstname);
                        $('#birth_father_middlename').val(metaContent.father_middlename);
                        $('#birth_father_lastname').val(metaContent.father_lastname);
                        $('#birth_father_extension').val(metaContent.father_suffix);
                        $('#birth_mother_firstname').val(metaContent.mother_firstname);
                        $('#birth_mother_middlename').val(metaContent.mother_middlename);
                        $('#birth_mother_lastname').val(metaContent.mother_lastname);
                        $('#birth_mother_extension').val(metaContent.mother_suffix);
                        $('#birth_address').val(metaContent.resident_of);

                        if(metaContent.baptism_date != 'NaN/NaN/NaN' || metaContent.baptism_date != null){
                            // Baptism Date
                            var convertDateIssued = new Date(metaContent.baptism_date);
                            $('#birth_baptism_date').val(convertDateIssued.getDate() + " " +monthNames[convertDateIssued.getMonth()] +", "+convertDateIssued.getFullYear());
                            var $input = $('#birth_baptism_date').pickadate();
    
                            // Use the picker object directly.
                            var picker = $input.pickadate('picker');
                            picker.set('select', [convertDateIssued.getFullYear(), convertDateIssued.getMonth(), convertDateIssued.getDate()]);
                        }

                        $('#birth_minister').val(metaContent.baptism_minister);
                        $('#birth_baptismal_register').val(metaContent.baptismal_register);
                        $('#birth_godparents').val(metaContent.godparents);
                        $('#birth_volume').val(metaContent.volume);
                        $('#birth_page').val(metaContent.page);
                        

                        if(metaContent.date_issued != 'NaN/NaN/NaN'){
                            // Date Issued
                            var convertDateIssued = new Date(metaContent.date_issued);
                            $('#birth_date_issue').val(convertDateIssued.getDate() + " " +monthNames[convertDateIssued.getMonth()] +", "+convertDateIssued.getFullYear());
                            var $input = $('#birth_date_issue').pickadate();
    
                            // Use the picker object directly.
                            var picker = $input.pickadate('picker');
                            picker.set('select', [convertDateIssued.getFullYear(), convertDateIssued.getMonth(), convertDateIssued.getDate()]);
                        }
                        
                        $('#birth_parish_priest').val(responseContent.priest_id);
                        // re-initialize material-select
                        $('#birth_parish_priest').material_select();

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
        if(currentPage > 2){
            pageHtml += `<li class="waves-effect"><a class="btnPaginationForBirth" url="${path + "?page=" + 1}&certificate_type=${certificate}">${1}...</a></li>`;
        }
        for(let i = currentPage - 1; i < (currentPage - 1 )+3; i++){
            if(currentPage != lastPage){
                if(currentPage == parseInt(i+1)){
                    pageHtml += `<li class="active"><a class="btnPaginationForBirth" url="${path + "?page=" + parseInt(i+1)}&certificate_type=${certificate}">${currentPage}</a></li>`;
                }else{
                    if(parseInt(i+1) >= lastPage){

                    }else{
                        pageHtml += `<li class="waves-effect"><a class="btnPaginationForBirth" url="${path + "?page=" + parseInt(i+1)}&certificate_type=${certificate}">${i+1}</a></li>`;
                    }
                }
            }else{
                pageHtml += `<li class="waves-effect"><a class="btnPaginationForBirth" url="${path + "?page=" + i}&certificate_type=${certificate}">${i}</a></li>`;
                break;
            }
        }
        pageHtml += `<li class="waves-effect ${lastPage == currentPage ? "active":""}"><a class="btnPaginationForBirth" url="${path + "?page=" + lastPage}&certificate_type=${certificate}">... up to ${lastPage}</a></li>`;
        pageHtml += `<li class='${lastPage == currentPage ? "disabled" : "waves-effect"}'><a class="btnPaginationForBirth ${lastPage == currentPage ? "disabled" : "waves-effect"}" url="${nextPageURL}&certificate_type=${certificate}"><i class="material-icons">chevron_right</i></a></li>
                    </ul>`;
        //display the pagination
        $("#paginationBirth").html(pageHtml);

    }
}
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
            var html = "";
            var pageHtml = "";
            
            if(response.data.length == 0 || response.data.data.length == 0){
                html+= "<tr>"
                +"<td colspan='37'>No Records Matched.</td>"
                +"</tr>";
                $("#marriageListTable").html(html);

                //display the pagination
                $("#paginationMarriage").html(pageHtml);
            }else{
                var marriageObject = response.data.data;
                var prevPageURL = response.data.prev_page_url;
                var nextPageURL = response.data.next_page_url;
                var path = response.data.path;
                var currentPage = response.data.current_page;
                var lastPage = response.data.last_page;
                pageHtml = `<ul class="pagination">
                                <li class='${currentPage == 1 ? "disabled" : "waves-effect"}'><a class="btnPaginationForMarriage ${currentPage == 1 ? "disabled" : "waves-effect"}" url="${prevPageURL}&certificate_type=${certificateType}"><i class="material-icons">chevron_left</i></a></li>`;
                for(var x = 0; x < marriageObject.length; x++){
                    var metaContent = JSON.parse(marriageObject[x]['meta']);
                    var rootContent = marriageObject[x];
                    var husband_suffix = metaContent['husband_suffix'] == undefined ? '':metaContent['husband_suffix']; 
                    var wife_suffix = metaContent['wife_suffix'] == undefined ? '':metaContent['wife_suffix']; 
                    html+= '<tr>'
                        +'<!-- Actions -->'
                        +'<td><button class="btn waves-effect btn-actions blue tooltipped btnPrintMCertificate" id="btnPrintMCertificate-'+rootContent['id']+'" data-position="bottom" data-delay="50" data-tooltip="Print Record"><i class="material-icons">print</i></button></td>'
                        +'<td><button class="btn waves-effect btn-actions green tooltipped btnUpdateMCertificate" id="btnUpdateMCertificate-'+rootContent['id']+'" data-position="bottom" data-delay="50" data-tooltip="Update Record"><i class="material-icons">edit</i></button></td>'
                        +'<td><button class="btn waves-effect btn-actions red tooltipped btnDeleteMCertificate" id="btnDeleteMCertificate-'+rootContent['id']+'" data-position="bottom" data-delay="50" data-tooltip="Delete Record"><i class="material-icons">delete</i></button></td>'
                        +'<!-- Husbands Info -->'
                        +'<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['husband_firstname']+'</td>'
                        +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['husband_middlename']+'</td>'
                        +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['husband_lastname']+'</td>'
                        +'<td><label style="font-size: 9px;">Extension</label><br>'+husband_suffix+'</td>'
                        +'<td><label style="font-size: 9px;">Civil Status</label><br>'+metaContent['husband_civil_status']+'</td>'
                        +'<td><label style="font-size: 9px;">Age</label><br>'+metaContent['husband_age']+'</td>'
                        +'<td><label style="font-size: 9px;">Birth Date</label><br>'+metaContent['husband_birthdate']+'</td>'
                        +'<td><label style="font-size: 9px;">Birth Place</label><br>'+metaContent['husband_birthplace']+'</td>'
                        +'<td><label style="font-size: 9px;">Baptism Date</label><br>'+metaContent['husband_baptismdate']+'</td>'
                        +'<td><label style="font-size: 9px;">Residence Of</label><br>'+metaContent['husband_residence']+'</td>'
                        +'<td><label style="font-size: 9px;">Fathers Name</label><br>'+metaContent['husband_fathersname']+'</td>'
                        +'<td><label style="font-size: 9px;">Mothers Name</label><br>'+metaContent['husband_mothersname']+'</td>'
                        +'<td><label style="font-size: 9px;">First Witness</label><br>'+metaContent['husband_firstwitness']+'</td>'
                        +'<td><label style="font-size: 9px;">Second Witness</label><br>'+metaContent['husband_secondwitness']+'</td>'
                        +'<!-- Wifes Info -->'
                        +'<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['wife_firstname']+'</td>'
                        +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['wife_middlename']+'</td>'
                        +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['wife_lastname']+'</td>'
                        +'<td><label style="font-size: 9px;">Extension</label><br>'+wife_suffix+'</td>'
                        +'<td><label style="font-size: 9px;">Civil Status</label><br>'+metaContent['wife_civil_status']+'</td>'
                        +'<td><label style="font-size: 9px;">Age</label><br>'+metaContent['wife_age']+'</td>'
                        +'<td><label style="font-size: 9px;">Birth Date</label><br>'+metaContent['wife_birthdate']+'</td>'
                        +'<td><label style="font-size: 9px;">Birth Place</label><br>'+metaContent['wife_birthplace']+'</td>'
                        +'<td><label style="font-size: 9px;">Baptism Date</label><br>'+metaContent['wife_baptismdate']+'</td>'
                        +'<td><label style="font-size: 9px;">Residence Of</label><br>'+metaContent['wife_residence']+'</td>'
                        +'<td><label style="font-size: 9px;">Fathers Name</label><br>'+metaContent['wife_fathersname']+'</td>'
                        +'<td><label style="font-size: 9px;">Mothers Name</label><br>'+metaContent['wife_mothersname']+'</td>'
                        +'<td><label style="font-size: 9px;">First Witness</label><br>'+metaContent['wife_firstwitness']+'</td>'
                        +'<td><label style="font-size: 9px;">Second Witness</label><br>'+metaContent['wife_secondwitness']+'</td>'
                        +'<!-- Marriage Details -->'
                        +'<td><label style="font-size: 9px;">Place of Marriage</label><br>'+metaContent['marriage_place']+'</td>'
                        +'<td><label style="font-size: 9px;">Date of Marriage</label><br>'+metaContent['marriage_date']+'</td>'
                        +'<td><label style="font-size: 9px;">Solemnize By</label><br>'+metaContent['solemnized_by']+'</td>'
                        +'<!-- Other Details -->'
                        +'<td><label style="font-size: 9px;">Marriages No.</label><br>'+metaContent['marriage_number']+'</td>'
                        +'<td><label style="font-size: 9px;">Page</label><br>'+metaContent['marriage_page']+'</td>'
                        +'<td><label style="font-size: 9px;">Line</label><br>'+metaContent['marriage_line']+'</td>'
                        +'<td><label style="font-size: 9px;">Date Issued</label><br>'+metaContent['marriage_day']+'</td>'
                        +'<!-- Priest Name -->';
                        var pname = rootContent['priest_fname'];
                        if(pname == null || pname == undefined || pname == NaN){
                            html+='<td><label style="font-size: 9px;">Name</label><br>Not Set</td>';
                        }else{
                            var mname = rootContent['priest_mname'] == null ? '':rootContent['priest_mname'];
                            html+='<td><label style="font-size: 9px;">Name</label><br>'+rootContent['priest_fname']+' '+mname+' '+rootContent['priest_lname']+'</td>';
                        }
                        html+='</tr>';
                }
                if(lastPage > 1){
                    generateMariagePagination(lastPage, currentPage, pageHtml, path, nextPageURL, certificateType);
                }

                if(lastPage == 1){
                    //display the pagination
                    $("#paginationMarriage").html("");
                }

                $("#marriageListTable").html(html);
                $('.tooltipped').tooltip({delay: 50});

                /// Print Confirmation Certificate
                $(".btnPrintMCertificate").on('click', function(e){
                    e.preventDefault();
                    var certificateId = $(this).attr("id").substr('btnPrintMCertificate-'.length);
                    printTypeCertificate(certificateId, 'marriage');
                });
                /// Update Confirmation Certificate
                $(".btnUpdateMCertificate").on('click', function(e){
                    e.preventDefault();
                    var certificateId = $(this).attr("id").substr('btnUpdateBCertificate-'.length);
                    showToUpdateMarriageCertificate(certificateId, $(this).attr("id"));
                });

                
                /// Delete Birth Certificate
                $(".btnDeleteMCertificate").on("click",function(){
                    var certificateId = $(this).attr("id").substr('btnDeleteMCertificate-'.length);
                    
                    $('#single_marriage_form').find('input:text, input:password, select')
                    .each(function () {
                        $(this).val('');
                    });
                    $('#single_marriage_form').find('input:hidden')
                    .each(function () {
                        $(this).val(0);
                    });
                    $('#single_marriage_form').find('label')
                    .each(function () {
                        $(this).removeClass('active');
                    });
                    $('#marriage_parish_priest').material_select();
                    $(".btnCancelMarriageUpdate").addClass('hide');
                    
                    // update Form Title
                    $(".headerMarriage").html('Add Marriage');

                    deleteMarriageCertificate(certificateId);
                });
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
            $(".headerMarriage").html('Update Marriage');
            // Show Cancel Button
            $(".btnCancelMarriageUpdate").removeClass('hide');
            // Display Information to Form
            $.ajax({
                type: "GET",
                url: certificate_endpoint+"/"+certificateId,
                data: {'certificate_type':'marriage', 'isIdSearch':'true'},
                success: function(response){
                    if(response.status >= 200 && response.status < 400){    
                        var metaContent = JSON.parse(response.data[0].meta);
                        var rootContent = response.data[0];
                        $("#mis_update").val(1);
                        $("#mid").val(rootContent['id']);
                        $("#husband_firstname").val(metaContent.husband_firstname);
                        $("#husband_middlename").val(metaContent.husband_middlename);
                        $("#husband_lastname").val(metaContent.husband_lastname);
                        $("#husband_extension").val(metaContent.husband_suffix);
                        
                        $("#husband_civil_status").val(metaContent.wife_civil_status);
                        $("#husband_civil_status").material_select();

                        // Husbands birth Date
                        if(metaContent.husband_birthdate != null){
                            // Confirmation Date
                            var convertMarriageDate = new Date(metaContent.husband_birthdate);
                            $('#husband_birth_date').val(convertMarriageDate.getDate() + " " +monthNames[convertMarriageDate.getMonth()] +", "+convertMarriageDate.getFullYear());
                            var $confirmationDateInput = $('#husband_birth_date').pickadate();

                            // Use the picker object directly.
                            var marriageDatePicker = $confirmationDateInput.pickadate('picker');
                            marriageDatePicker.set('select', [convertMarriageDate.getFullYear(), convertMarriageDate.getMonth(), convertMarriageDate.getDate()]);
                        }

                        // Husbands Baptism Date
                        if(metaContent.husband_baptismdate != null){
                            // Confirmation Date
                            var convertMarriageDate = new Date(metaContent.husband_baptismdate);
                            $('#husband_baptism_date').val(convertMarriageDate.getDate() + " " +monthNames[convertMarriageDate.getMonth()] +", "+convertMarriageDate.getFullYear());
                            var $confirmationDateInput = $('#husband_baptism_date').pickadate();

                            // Use the picker object directly.
                            var marriageDatePicker = $confirmationDateInput.pickadate('picker');
                            marriageDatePicker.set('select', [convertMarriageDate.getFullYear(), convertMarriageDate.getMonth(), convertMarriageDate.getDate()]);
                        }


                        $("#husband_birth_place").val(metaContent.husband_birthplace);
                        $("#husband_residence").val(metaContent.husband_residence);
                        $("#husband_fathers_name").val(metaContent.husband_fathersname);
                        $("#husband_mothers_name").val(metaContent.husband_mothersname);
                        $("#husband_first_witness").val(metaContent.husband_firstwitness);
                        $("#husband_second_witness").val(metaContent.husband_secondwitness);
        
                        $("#wife_firstname").val(metaContent.wife_firstname);
                        $("#wife_middlename").val(metaContent.wife_middlename);
                        $("#wife_lastname").val(metaContent.wife_lastname);
                        $("#wife_extension").val(metaContent.wife_suffix);


                        $("#wife_civil_status").val(metaContent.wife_civil_status);
                        $("#wife_civil_status").material_select();
                        
                        // Wifes birthdate
                        if(metaContent.wife_birthdate != null){
                            // Confirmation Date
                            var convertMarriageDate = new Date(metaContent.wife_birthdate);
                            $('#wife_birth_date').val(convertMarriageDate.getDate() + " " +monthNames[convertMarriageDate.getMonth()] +", "+convertMarriageDate.getFullYear());
                            var $confirmationDateInput = $('#wife_birth_date').pickadate();

                            // Use the picker object directly.
                            var marriageDatePicker = $confirmationDateInput.pickadate('picker');
                            marriageDatePicker.set('select', [convertMarriageDate.getFullYear(), convertMarriageDate.getMonth(), convertMarriageDate.getDate()]);
                        }

                        
                        // Wifes Baptism Date
                        if(metaContent.wife_baptismdate != null){
                            // Confirmation Date
                            var convertMarriageDate = new Date(metaContent.wife_baptismdate);
                            $('#wife_baptism_date').val(convertMarriageDate.getDate() + " " +monthNames[convertMarriageDate.getMonth()] +", "+convertMarriageDate.getFullYear());
                            var $confirmationDateInput = $('#wife_baptism_date').pickadate();

                            // Use the picker object directly.
                            var marriageDatePicker = $confirmationDateInput.pickadate('picker');
                            marriageDatePicker.set('select', [convertMarriageDate.getFullYear(), convertMarriageDate.getMonth(), convertMarriageDate.getDate()]);
                        }

                        $("#wife_birth_place").val(metaContent.wife_birthplace);
                        $("#wife_residence").val(metaContent.wife_residence);
                        $("#wife_fathers_name").val(metaContent.wife_fathersname);
                        $("#wife_mothers_name").val(metaContent.wife_mothersname);
                        $("#wife_first_witness").val(metaContent.wife_firstwitness);
                        $("#wife_second_witness").val(metaContent.wife_secondwitness);
        
                        $("#marraige_place").val(metaContent.marriage_place);
                        $("#marriage_no").val(metaContent.marriage_number);
                        $("#marriage_page").val(metaContent.marriage_page);
                        $("#marriage_line").val(metaContent.marriage_line);
                        

                        // Wifes Baptism Date
                        if(metaContent.marriage_date != null){
                            // Confirmation Date
                            var convertMarriageDate = new Date(metaContent.marriage_date);
                            $('#marriage_date').val(convertMarriageDate.getDate() + " " +monthNames[convertMarriageDate.getMonth()] +", "+convertMarriageDate.getFullYear());
                            var $confirmationDateInput = $('#marriage_date').pickadate();

                            // Use the picker object directly.
                            var marriageDatePicker = $confirmationDateInput.pickadate('picker');
                            marriageDatePicker.set('select', [convertMarriageDate.getFullYear(), convertMarriageDate.getMonth(), convertMarriageDate.getDate()]);
                        }

                        $("#marriage_line").val(metaContent.marriage_line);
                        $("#marraige_solemnized_by").val(metaContent.solemnized_by);
        
        
                        
                        // Marriage Marriage Date Issued
                        if(metaContent.marriage_month != null){
                            // Confirmation Date
                            var convertMarriageDate = new Date(metaContent.marriage_month+"/"+metaContent.marriage_day+"/"+metaContent.marriage_year);
                            $('#marriage_date_issued').val(convertMarriageDate.getDate() + " " +monthNames[convertMarriageDate.getMonth()] +", "+convertMarriageDate.getFullYear());
                            var $confirmationDateInput = $('#marriage_date').pickadate();

                            // Use the picker object directly.
                            var marriageDatePicker = $confirmationDateInput.pickadate('picker');
                            marriageDatePicker.set('select', [convertMarriageDate.getFullYear(), convertMarriageDate.getMonth(), convertMarriageDate.getDate()]);
                        }

                        $("#marriage_parish_priest").val(rootContent['priest_id']);
                        $("#marriage_parish_priest").material_select();
                        $('#single_marriage_form').find('label')
                        .each(function () {
                            if($(this).html() != "Select Parish Priest" && $(this).html() != "Civil Status"){
                                $(this).addClass('active');
                            }
                        });
                    }
                }, error: function(e){
                    Materialize.toast('Something Went Wrong (406):: '+e.responseJSON.message, 5000, 'red rounded');
                    console.log('["Confirmation Error"]: '+e.responseJSON.message);
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
                data: {'certificate_type':'marriage', 'isIdSearch':'true'},
                success: function(response){
                    if(response.status >= 200 && response.status < 400){
                        var metaContent = JSON.parse(response.data[0]['meta']);
                        /// Prepare Delete Confirmation Modal
                        $("#recordToDelete").html("the record of "+metaContent['husband_firstname']+" and "+metaContent['wife_firstname']+" marriage record");
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
                                        getMarriageList("NA");
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

    function generateMariagePagination(lastPage, currentPage, pageHtml, path, nextPageURL, certificate){
        if(currentPage > 2){
            pageHtml += `<li class="waves-effect"><a class="btnPaginationForMarriage" url="${path + "?page=" + 1}&certificate_type=${certificate}">${1}...</a></li>`;
        }
        for(let i = currentPage - 1; i < (currentPage - 1 )+3; i++){
            if(currentPage != lastPage){
                if(currentPage == parseInt(i+1)){
                    pageHtml += `<li class="active"><a class="btnPaginationForMarriage" url="${path + "?page=" + parseInt(i+1)}&certificate_type=${certificate}">${currentPage}</a></li>`;
                }else{
                    if(parseInt(i+1) >= lastPage){

                    }else{
                        pageHtml += `<li class="waves-effect"><a class="btnPaginationForMarriage" url="${path + "?page=" + parseInt(i+1)}&certificate_type=${certificate}">${i+1}</a></li>`;
                    }
                }
            }else{
                pageHtml += `<li class="waves-effect"><a class="btnPaginationForMarriage" url="${path + "?page=" + i}&certificate_type=${certificate}">${i}</a></li>`;
                break;
            }
        }
        pageHtml += `<li class="waves-effect ${lastPage == currentPage ? "active":""}"><a class="btnPaginationForMarriage" url="${path + "?page=" + lastPage}&certificate_type=${certificate}">... up to ${lastPage}</a></li>`;
        pageHtml += `<li class='${lastPage == currentPage ? "disabled" : "waves-effect"}'><a class="btnPaginationForMarriage ${lastPage == currentPage ? "disabled" : "waves-effect"}" url="${nextPageURL}&certificate_type=${certificate}"><i class="material-icons">chevron_right</i></a></li>
                    </ul>`;
        
        //display the pagination
        $("#paginationMarriage").html(pageHtml);

    }
}

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
            var html = "";
            var pageHtml = "";

            if(response.data.length == 0 || response.data.data.length == 0){
                html+= "<tr>"
                +"<td colspan='18'>No Records Matched.</td>"
                +"</tr>";
                $("#deathListTable").html(html);
                
                //display the pagination
                $("#paginationDeath").html(pageHtml);
            }else{
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
                    var responseContent = deathObject[x];
                    var suffix = responseContent['suffix'] == null ? '':responseContent['suffix'];
                    html+= '<tr>'
                            +'<!-- Actions -->'
                            +'<td><button class="btn waves-effect btn-actions blue tooltipped btnPrintDCertificate" id="btnPrintDCertificate-'+responseContent['id']+'" data-position="bottom" data-delay="50" data-tooltip="Print Record"><i class="material-icons">print</i></button></td>'
                            +'<td><button class="btn waves-effect btn-actions green tooltipped btnUpdateDCertificate" id="btnUpdateDCertificate-'+responseContent['id']+'" data-position="bottom" data-delay="50" data-tooltip="Update Record"><i class="material-icons">edit</i></button></td>'
                            +'<td><button class="btn waves-effect btn-actions red tooltipped btnDeleteDCertificate" id="btnDeleteDCertificate-'+responseContent['id']+'" data-position="bottom" data-delay="50" data-tooltip="Delete Record"><i class="material-icons">delete</i></button></td>'
                            +'<!-- Decease Name -->'
                            +'<td><label style="font-size: 9px;">First Name</label><br>'+responseContent['firstname']+'</td>'
                            +'<td><label style="font-size: 9px;">Middle Name</label><br>'+responseContent['middlename']+'</td>'
                            +'<td><label style="font-size: 9px;">Last Name</label><br>'+responseContent['lastname']+'</td>'
                            +'<td><label style="font-size: 9px;">Extension</label><br>'+suffix+'</td>'
                            +'<!-- Other Info -->'
                            +'<td><label style="font-size: 9px;">Age</label><br>'+metaContent['age']+'</td>'
                            +'<td><label style="font-size: 9px;">Residence of</label><br>'+metaContent['residence']+'</td>'
                            +'<td><label style="font-size: 9px;">Date of Death</label><br>'+metaContent['date_of_death']+'</td>'
                            +'<td><label style="font-size: 9px;">Place of Burial</label><br>'+metaContent['place_of_burial']+'</td>'
                            +'<td><label style="font-size: 9px;">Date of Burial</label><br>'+metaContent['date_of_burial']+'</td>'
                            +'<td><label style="font-size: 9px;">Informant or Relatives</label><br>'+metaContent['informant_or_relatives']+'</td>'
                            +'<td><label style="font-size: 9px;">Book Number</label><br>'+metaContent['book_number']+'</td>'
                            +'<td><label style="font-size: 9px;">Page Number</label><br>'+metaContent['page_number']+'</td>'
                            +'<td><label style="font-size: 9px;">Registry Number</label><br>'+metaContent['registry_number']+'</td>'
                            +'<td><label style="font-size: 9px;">Date Issued</label><br>'+metaContent['date_issued']+'</td>'
                            +'<!-- Priest Name -->';
                            var pname = responseContent['priest_fname'];
                            if(pname == null || pname == undefined || pname == NaN){
                                html+='<td><label style="font-size: 9px;">Name</label><br>Not Set</td>';
                            }else{
                                var mname = responseContent['priest_mname'] == null ? '':responseContent['priest_mname'];
                                html+='<td><label style="font-size: 9px;">Name</label><br>'+responseContent['priest_fname']+' '+mname+' '+responseContent['priest_lname']+'</td>';
                            }
                    +'</tr>';
                }
                if(lastPage > 1){
                    generateDeathPagination(lastPage, currentPage, pageHtml, path, nextPageURL, certificateType);
                }

                if(lastPage == 1){
                    //display the pagination
                    $("#paginationDeath").html("");
                }

                $("#deathListTable").html(html);
                $('.tooltipped').tooltip({delay: 50});

                /// Print Confirmation Certificate
                $(".btnPrintDCertificate").on('click', function(e){
                    e.preventDefault();
                    var certificateId = $(this).attr("id").substr('btnPrintDCertificate-'.length);
                    printTypeCertificate(certificateId, 'death');
                });
            
                /// Update Confirmation Certificate
                $(".btnUpdateDCertificate").on('click', function(e){
                    e.preventDefault();
                    var certificateId = $(this).attr("id").substr('btnUpdateDCertificate-'.length);
                    showToUpdateDeathCertificate(certificateId, $(this).attr("id"));
                });

                
                /// Delete Birth Certificate
                $(".btnDeleteDCertificate").on("click",function(){
                    var certificateId = $(this).attr("id").substr('btnDeleteDCertificate-'.length);
                    
                    $(".btnCancelDeathUpdate").addClass('hide');
                    
                    // update Form Title
                    $(".headerDeath").html('Add Birth');

                    $('#single_death_form').find('input:text, input:password, select')
                    .each(function () {
                        $(this).val('');
                    });
                    $('#single_death_form').find('input:hidden')
                    .each(function () {
                        $(this).val(0);
                    });
                    $('#single_death_form').find('label')
                    .each(function () {
                        $(this).removeClass('active');
                    });
                    $("#death_age").val('');
                    $('#death_parish_priest').material_select();

                    deleteDeathCertificate(certificateId);
                });
            }
        }, error: function(e){
            console.log('Something is not right:: ',e);
        }
    });


    function printDeathCertificate(certificateId){
        isTokenExist();
        var AT = localStorage.getItem("AT");
        checkTokenValidity(AT);

        if(certificateId == undefined || certificateId == null){
            $('#modalSysError').modal('open');
        }else{
        }

    }

    function showToUpdateDeathCertificate(certificateId){
        isTokenExist();
        var AT = localStorage.getItem("AT");
        checkTokenValidity(AT);

        if(certificateId == undefined || certificateId == null){
            $('#modalSysError').modal('open');
        }else{
            localStorage.setItem('defaultForm','individual');
            setFormSelection();
            // update Form Title
            $(".headerDeath").html('Update Death');
            // Show Cancel Button
            $(".btnCancelDeathUpdate").removeClass('hide');
            // Display Information to Form
            $.ajax({
                type: "GET",
                url: certificate_endpoint+"/"+certificateId,
                data: {'certificate_type':'death', 'isIdSearch':'true'},
                success: function(response){
                    if(response.status >= 200 && response.status < 400){    
                        var metaContent = JSON.parse(response.data[0].meta);
                        var rootContent = response.data[0];

                        $("#dis_update").val(1);
                        $("#did").val(certificateId);
                        $("#death_firstname").val(rootContent['firstname']);
                        $("#death_middlename").val(rootContent['middlename']);
                        $("#death_lastname").val(rootContent['lastname']);
                        $("#death_extension").val(rootContent['suffix']);
                        $("#death_age").val(metaContent.age);
                        $("#death_residence").val(metaContent.residence);
                        
                        $("#death_place_of_burial").val(metaContent.place_of_burial);
                        
                        $("#death_informant").val(metaContent.informant_or_relatives);
                        $("#death_book_number").val(metaContent.book_number);
                        $("#death_page_number").val(metaContent.page_number);
                        $("#death_registry_number").val(metaContent.registry_number);
                        
                        $("#death_parish_priest").val(rootContent['priest_id']);
                        $("#death_parish_priest").material_select();


                        if(metaContent.date_of_death != null){
                            // Confirmation Date
                            var convertDeathDate = new Date(metaContent.date_of_death);
                            $('#death_date_of_death').val(convertDeathDate.getDate() + " " +monthNames[convertDeathDate.getMonth()] +", "+convertDeathDate.getFullYear());
                            var $confirmationDateInput = $('#death_date_of_death').pickadate();

                            // Use the picker object directly.
                            var deathDatePicker = $confirmationDateInput.pickadate('picker');
                            deathDatePicker.set('select', [convertDeathDate.getFullYear(), convertDeathDate.getMonth(), convertDeathDate.getDate()]);
                        }
                        if(metaContent.date_of_burial != null){
                            // Confirmation Date
                            var convertDeathDateBurial = new Date(metaContent.date_of_burial);
                            $('#death_date_of_burial').val(convertDeathDateBurial.getDate() + " " +monthNames[convertDeathDateBurial.getMonth()] +", "+convertDeathDateBurial.getFullYear());
                            var $deathDateInput = $('#death_date_of_burial').pickadate();

                            // Use the picker object directly.
                            var deathDatePicker = $deathDateInput.pickadate('picker');
                            deathDatePicker.set('select', [convertDeathDateBurial.getFullYear(), convertDeathDateBurial.getMonth(), convertDeathDateBurial.getDate()]);
                        }
                        if(metaContent.date_issued != 'NaN/NaN/NaN'){
                            // Date Issued
                            var convertDateIssued = new Date(metaContent.date_issued);
                            $('#death_date_issued').val(convertDateIssued.getDate() + " " +monthNames[convertDateIssued.getMonth()] +", "+convertDateIssued.getFullYear());
                            var $input = $('#death_date_issued').pickadate();
    
                            // Use the picker object directly.
                            var picker = $input.pickadate('picker');
                            picker.set('select', [convertDateIssued.getFullYear(), convertDateIssued.getMonth(), convertDateIssued.getDate()]);
                        }
                    }else{
                        if(response.status == 404){
                            Materialize.toast('Something Went Wrong (404):: No Record Found', 5000, 'red rounded');
                        }else{
                            Materialize.toast('Something Went Wrong', 5000, 'red rounded');
                        }
                    }
                    $('#single_death_form').find('label')
                    .each(function () {
                        if($(this).html() != "Select Parish Priest"){
                            $(this).addClass('active');
                        }
                    });
                }, error: function(e){
                    Materialize.toast('Something Went Wrong (406):: '+e.responseJSON.message, 5000, 'red rounded');
                    console.log('["Confirmation Error"]: '+e.responseJSON.message);
                }
            });
        }
    }

    function deleteDeathCertificate(certificateId){
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
                data: {'certificate_type':'death', 'isIdSearch':'true'},
                success: function(response){

                    if(response.status >= 200 && response.status < 400){
                        /// Prepare Delete Confirmation Modal
                        $("#recordToDelete").html(response.data['firstname']);
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
                                        getDeathList("NA");
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
                        $("#closeConrimation").click(function(){
                            $('#deleteConfirmationModal').modal('close');
                        });

                    }else{
                        if(response.status == 404){
                            Materialize.toast('Something Went Wrong (404):: No Record Found', 5000, 'red rounded');
                        }else{
                            Materialize.toast('Something Went Wrong', 5000, 'red rounded');
                        }
                    }
                }, error: function(e){
                    Materialize.toast('Something Went Wrong (406):: '+e.responseJSON.message, 5000, 'red rounded');
                    console.log('["Confirmation Error"]: '+e.responseJSON.message);
                }
            });
        }
    }

    function generateDeathPagination(lastPage, currentPage, pageHtml, path, nextPageURL, certificate){
        if(currentPage > 2){
            pageHtml += `<li class="waves-effect"><a class="btnPaginationForDeath" url="${path + "?page=" + 1}&certificate_type=${certificate}">${1}...</a></li>`;
        }
        for(let i = currentPage - 1; i < (currentPage - 1 )+3; i++){
            if(currentPage != lastPage){
                if(currentPage == parseInt(i+1)){
                    pageHtml += `<li class="active"><a class="btnPaginationForDeath" url="${path + "?page=" + parseInt(i+1)}&certificate_type=${certificate}">${currentPage}</a></li>`;
                }else{
                    if(parseInt(i+1) >= lastPage){

                    }else{
                        pageHtml += `<li class="waves-effect"><a class="btnPaginationForDeath" url="${path + "?page=" + parseInt(i+1)}&certificate_type=${certificate}">${i+1}</a></li>`;
                    }
                }
            }else{
                pageHtml += `<li class="waves-effect"><a class="btnPaginationForDeath" url="${path + "?page=" + i}&certificate_type=${certificate}">${i}</a></li>`;
                break;
            }
        }
        pageHtml += `<li class="waves-effect ${lastPage == currentPage ? "active":""}"><a class="btnPaginationForDeath" url="${path + "?page=" + lastPage}&certificate_type=${certificate}">... up to ${lastPage}</a></li>`;
        pageHtml += `<li class='${lastPage == currentPage ? "disabled" : "waves-effect"}'><a class="btnPaginationForDeath ${lastPage == currentPage ? "disabled" : "waves-effect"}" url="${nextPageURL}&certificate_type=${certificate}"><i class="material-icons">chevron_right</i></a></li>
                    </ul>`;
        
        //display the pagination
        $("#paginationDeath").html(pageHtml);
    }
}


// ==================================== Paginations
// DT: pagination button here...
// Pagination For Birth
$(document).on('click', '.btnPaginationForBirth', function(){
    let url = $(this).attr("url");
    let status = $(this).attr("class").split(" ")[1];
    if(status != "disabled"){
        getBirthList(url);
    }
});


// DT: pagination button here...
// Pagination For Death
$(document).on('click', '.btnPaginationForDeath', function(){
    let url = $(this).attr("url");
    let status = $(this).attr("class").split(" ")[1];
    if(status != "disabled"){
        getDeathList(url);
    }
});


// DT: pagination button here...
// Pagination For Marriage
$(document).on('click', '.btnPaginationForMarriage', function(){
    let url = $(this).attr("url");
    let status = $(this).attr("class").split(" ")[1];
    if(status != "disabled"){
        getMarriageList(url);
    }
});


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
    }else if(selectionTableVal == "marriage"){
        /// Fixing table display
        $('#marriageTable').removeClass('hide');

        /// Fixing dropdown selction for records
        $("#selectCertificate option:selected").removeAttr('selected');
        $("#selectCertificate option[value='marriage']").prop('selected', true);

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