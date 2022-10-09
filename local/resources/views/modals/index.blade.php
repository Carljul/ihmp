<!-- Modal Structure -->
<div id="modalSysError" class="modal small-modal">
    <div class="modal-content center system-error-modal-height">
        <div class="errorProgressIndicator hide">
            <div class="system-error-loader">
                <div class="preloader-wrapper big active">
                    <div class="spinner-layer spinner-blue-only">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="system-error-message">
                <h5>Preparing Screens</h5>
            </div>
        </div>
        <div class="errMessage">
            <i class="material-icons medium">bug_report</i>
            <h5>Hmmm! Something is not right</h5>
            <p>
                It seems we hit a snag.
                <br>
                Please click refresh and do the previous activity you did.
                <br>
                If issue persists, please contact your Software Developer
            </p>

            <button class="waves-effect waves-green btn btn-block" id="btnRefresh">Refresh</button>
        </div>
        <div class="customMessage hide">

        </div>
    </div>
</div>

<!-- Delete Confirmation ModalW -->
<div id="deleteConfirmationModal" class="modal small-modal">
    <div class="modal-content center errorProgressIndicator">
        <h4>Are you sure you want to delete <span id="recordToDelete"></span>?</h4>
        <div id="buttonConfirmation">

        </div>
    </div>
</div>


<!-- Import Export -->
<div id="importExport" class="modal modal-fixed-footer" style="width: 80%;">
    <div class="modal-content">
        <h4>Import Your CSV File Here</h4>
        <p>Follow the Steps</p>
        <div class="row">
            <div class="col s12">
                <div class="input-field col s3">
                    <b>1. </b>Select the type of record<br>
                    <select class="templateDownloadDropdown" id="templateDownloadDropdown">
                        <option value="" disabled selected>Select template</option>
                        <option value="marriage">Marriage</option>
                        <option value="confirmation">Confirmation</option>
                        <option value="birth">Birth</option>
                        <option value="death">Death</option>
                    </select>
                    <label>Select record</label>
                </div>
                <div class="col s3">
                    <b>2. </b>Download your template. (You can skip this step if you already downloaded this file before)
                    <a href="!#" class="btn waves-effect disabled" id="btnDownload" download>Download</a>
                </div>
                <div class="col s3">
                    <b>3. </b>Select your template and upload
                    <form enctype='multipart/form-data' method='post'>

                        <label>Upload CSV file Here</label>

                        <div class="file-field input-field">
                            <div class="btn disabled" id="uploadFile">
                                <span>Upload CSV</span>
                                <input size='50' type='file' name='filename' id="importCSV">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" style="visibility: hidden;">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col s3">
                    <b>4. </b>Final Step, Click Import button to start import sequence
                    <button class="waves-effect waves-green btn disabled" id="btnStartImportSequence">Import</button>
                </div>
            </div>
        </div>
        <div class="row removeBottomMargin">
            <div class="col s12 center">
                <smal id="countRecord">Data To Import Will Show Below</small>
            </div>
            <hr>
        </div>
        <div class="row center" id="showDataToImport" style="overflow-x: scroll;">
        </div>

    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>

<!-- Filter -->
<div id="filterTable" class="modal modal_large">
    <div class="modal-content">
        <h4>You can apply following filters</h4>
        <div class="row">
            <div class="col s3">
                <select id="selectFilterCertificateType" style="padding-top: 15px;">
                    <option value="" disabled>Choose Record</option>
                    <option value="baptism">Birth Record</option>
                    <option value="confirmation" selected>Confirmation Record</option>
                    <option value="death">Death Record</option>
                    <option value="marriage">Marriage Record</option>
                </select>
                <label>Choose Record</label>
            </div>
            <div class="col s3">
                <div class="input-field">
                    <input id="filter_date_from" type="text" class="datepicker" name="filter_date_from">
                    <label for="filter_date_from">Date From</label>
                </div>
            </div>
            <div class="col s3">
                <div class="input-field">
                    <input id="filter_date_to" type="text" class="datepicker" name="filter_date_to">
                    <label for="filter_date_to">Date To</label>
                </div>
            </div>
            <div class="col s3">
                <a href="#!" class="btn waves-effect waves-light green full_width_button" id="btnCertificateFilter">Create Filter</a>
            </div>
            <div class="col s12">
                <a href="#!" class="btn waves-effect waves-light blue full_width_button" id="btnCertificatePrint">Print</a>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m12">
                <div class="row">
                    <div id="printDiv">
                        <!-- Confirmation Certificate -->
                        <div class="col s12 fix_height_table sampleClass" style="display: none;" id="confirmationListFilterTableDIV">
                            <table class="confirmation_group_table striped bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Record of</th>
                                        <th>Confirmation Date</th>
                                        <th>Date Issued</th>
                                        <th colspan="3">Fathers' Name</th>
                                        <th colspan="3">Mothers' Name</th>
                                        <!-- <th>First Sponsor</th>
                                        <th>Second Sponsor</th> -->
                                        <th>Confirmation by</th>
                                        <th colspan="3">Registration Book Detail</th>
                                        <!-- <th>Priest</th> -->
                                    </tr>
                                </thead>
                                <tbody id="confirmationListFilterTable">
                                    <!-- Keep it empty -->
                                    <tr>
                                        <td colspan="21">No Records Yet</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Marriage Certificate -->
                        <div class="col s12 fix_height_table" style="display: none;" id="marriageListFilterTableDIV">
                            <table class="marriage_group_table striped">
                                <thead>
                                    <tr>
                                        <th colspan="8">Husbands Info</th>
                                        <th colspan="8">Wifes Info</th>
                                        <th colspan="3">Marriage Details</th>
                                        <th colspan="4">Other Details</th>
                                        <!-- <th>Priest</th> -->
                                    </tr>
                                </thead>
                                <tbody id="marriageListFilterTable">
                                    <!-- Keep it empty -->
                                    <tr>
                                        <td colspan="37">No Records Yet</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Birth Certificate -->
                        <div class="col s12 fix_height_table" style="display: none;" id="birthListFilterTableDIV">
                            <table class="birth_group_table striped">
                                <thead>
                                    <tr>
                                        <th>Born On</th>
                                        <th colspan="3">Record of</th>
                                        <th>Born In</th>
                                        <th>Baptism Date</th>
                                        <th>Minister</th>
                                        <th colspan="3">Fathers Name</th>
                                        <th colspan="3">Mothers Name</th>
                                        <th>Residents of</th>
                                        <th>Godparents</th>
                                        <th colspan="4">Other Details</th>
                                        <!-- <th>Parish Priest</th> -->
                                    </tr>
                                </thead>
                                <tbody id="birthListFilterTable">
                                    <!-- Keep it empty -->
                                    <tr>
                                        <td colspan="21">No Records Yet</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Death Certificate -->
                        <div class="col s12 fix_height_table" style="display: none;" id="deathListFilterTableDIV">
                            <table class="death_group_table striped">
                                <thead>
                                    <tr>
                                        <th colspan="3">Decease Name</th>
                                        <th colspan="10">Other Info</th>
                                        <!-- <th>Priest Name</th> -->
                                    </tr>
                                </thead>
                                <tbody id="deathListFilterTable">
                                    <!-- Keep it empty -->
                                    <tr>
                                        <td colspan="18">No Records Yet</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </div>
</div>

<!-- Rendered Filter -->
<div id="renderedFilter" class="modal">
    <div class="modal-content">
        <h4>You can apply following filters</h4>
        <p>Follow the Steps</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Create Filter</a>
    </div>
</div>


<!-- Adding Priest -->
<div id="assignPriestModalForm" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Assign Parish Priest</h4>
        <div class="row">
            <div class="col s12 m6">
                <div id="paginationPriestDiv"></div>
            </div>
            <div class="col s12 m6">
                <input type="search" class="btnSearchPriestInModal" placeholder="Search . . .">
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <table class="striped">
                    <thead>
                        <tr>
                            <th>Clergy Title</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Assign Priest</th>
                        </tr>
                    </thead>
                    <tbody id="priestList">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="/ihmp/priest" class="modal-action modal-close waves-effect waves-green btn-flat">Did not find priest? Add Priest</a>
    </div>
</div>

<!-- Floating Import Progress Indicator -->
<div id="importProgress" class="hide">
    <div class="card purple">
        <div class="card-content white-text" id="importInProgressMessage">
            Import in progress (99 Records left)
        </div>
    </div>
</div>

<!-- Error Imports -->
<div id="errorImports" class="hide">
    <div class="card red">
        <div class="card-content white-text" id="errorImportMessage">
            Error Imports (99 Records)
        </div>
    </div>
</div>

<div id="errorListModal"  class="modal">
    <div class="modal-content center">
        <div class="row">
            <div class="col s12">
                Make Sure to copy the content of this popup as when notification closes you wont get the second time to look on to this list
                <table class="striped">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                        </tr>
                    </thead>
                    <tbody id="errorListContent">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#importExport').modal({dismissible: false});
        $('.templateDownloadDropdown').material_select();

        // ------------------------------------------- CERTIFICATE FILTER (PRINT) ------------------------------------------- //
        $("#btnCertificatePrint").click(() => {

            var divContents = document.getElementById("printDiv").innerHTML;
            var a = window.open('', '', 'height=10000, width=10000');
            a.document.write(`<html><head><link href='${system_url}/css/materialize.css' rel="stylesheet"></head>`);
            a.document.write('<body>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            setTimeout(() => {
                a.print();
                window.close();
            }, 1000)
        })


        $("#btnCertificateFilter").click((e) => {
            //get the input values
            let certificate_type = $("#selectFilterCertificateType option:selected").val();
            let dateFrom = $("#filter_date_from").val();
            let dateTo = $("#filter_date_to").val();
            let divToShow = "";
            let tableToShow = "";
            let divToHideArr = ["confirmationListFilterTableDIV", "marriageListFilterTableDIV", "birthListFilterTableDIV", "deathListFilterTableDIV"];
            //decide what div to display
            if(certificate_type == "confirmation") divToShow = "confirmationListFilterTableDIV";
            if(certificate_type == "marriage") divToShow = "marriageListFilterTableDIV";
            if(certificate_type == "baptism") divToShow = "birthListFilterTableDIV";
            if(certificate_type == "death") divToShow = "deathListFilterTableDIV";
            //set the table to show by cutting the word "DIV"
            tableToShow = divToShow.slice(0, -3)
            //removing an array value
            const index = divToHideArr.indexOf(divToShow)
            if(index > -1)divToHideArr.splice(index, 1)
            //input validations here ...
            if(dateFrom == "")return Materialize.toast('Please provide Date From!', 3000, 'red')
            if(dateTo == "")return Materialize.toast('Please provide Date To!', 3000, 'red')
            //format the date into moment js
            dateFrom = moment(dateFrom).subtract(1, 'days').format("L");
            dateTo = moment(dateTo).add(1, 'days').format("L");
            //ajax call for calling the certificates data
            $.ajax({
                type: "GET",
                url: certificate_endpoint+"/[]", //by default just add empty array
                data: {dateFrom, dateTo, certificate_type}, //declare our payload
                success: function(data){
                    var html = "";
                    var dataObject = data.data;
                    if(certificate_type == "confirmation"){
                        if(dataObject.length == 0){
                            html+= "<tr>"
                            +"<td colspan='21'>No Records Yet</td>"
                            +"</tr>";
                            $(`#${tableToShow}`).html(html);
                        }else{
                            for(var x = 0; x < dataObject.length; x++){
                                var metaContent = JSON.parse(dataObject[x]['meta']);
                                var rootContent = dataObject[x];
                                html+='<tr>'
                                +'<!-- Record of -->'
                                +'<td><label style="font-size: 9px;">First Name</label><br>'+rootContent['firstname']+'</td>'
                                +'<td><label style="font-size: 9px;">Middle Name</label><br>'+(rootContent['middlename'] == null ? '' : rootContent['middlename'])+'</td>'
                                +'<td><label style="font-size: 9px;">Last Name</label><br>'+rootContent['lastname']+'</td>'
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
                                html+='<!-- Fathers Name -->'
                                +'<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['father_firstname']+'</td>'
                                +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['father_middlename']+'</td>'
                                +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['father_lastname']+'</td>'
                                +'<!-- Mothers Name -->'
                                +'<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['mother_firstname']+'</td>'
                                +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['mother_middlename']+'</td>'
                                +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['mother_lastname']+'</td>'
                                +'<!-- Confirmation by -->'
                                +'<td>'+metaContent['confirmation_by']+'</td>'
                                +'<!-- Registration Book Detail -->'
                                +'<td><label style="font-size: 9px;">Registration Book</label><br>'+metaContent['registration_book']+'</td>'
                                +'<td><label style="font-size: 9px;">Book Page</label><br>'+metaContent['book_page']+'</td>'
                                +'<td><label style="font-size: 9px;">Book Number</label><br>'+metaContent['book_number']+'</td>'

                                html+='</tr>';
                            }
                        }
                    }
                    if(certificate_type == "marriage"){
                        if(dataObject.length == 0){
                            html+= "<tr>"
                            +"<td colspan='21'>No Records Yet</td>"
                            +"</tr>";
                            $(`#${tableToShow}`).html(html);
                        }else{
                            for(var x = 0; x < dataObject.length; x++){
                                var metaContent = JSON.parse(dataObject[x]['meta']);
                                var rootContent = dataObject[x];
                                html+= '<tr>'
                                    +'<!-- Husbands Info -->'
                                    +'<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['husband_firstname']+'</td>'
                                    +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['husband_middlename']+'</td>'
                                    +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['husband_lastname']+'</td>'
                                    +'<td><label style="font-size: 9px;">Civil Status</label><br>'+metaContent['husband_civil_status']+'</td>'
                                    +'<td><label style="font-size: 9px;">Age</label><br>'+metaContent['husband_age']+'</td>'
                                    +'<td><label style="font-size: 9px;">Birth Date</label><br>'+metaContent['husband_birthdate']+'</td>'
                                    +'<td><label style="font-size: 9px;">Birth Place</label><br>'+metaContent['husband_birthplace']+'</td>'
                                    +'<td><label style="font-size: 9px;">Baptism Date</label><br>'+metaContent['husband_baptismdate']+'</td>'
                                    +'<!-- Wifes Info -->'
                                    +'<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['wife_firstname']+'</td>'
                                    +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['wife_middlename']+'</td>'
                                    +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['wife_lastname']+'</td>'
                                    +'<td><label style="font-size: 9px;">Civil Status</label><br>'+metaContent['wife_civil_status']+'</td>'
                                    +'<td><label style="font-size: 9px;">Age</label><br>'+metaContent['wife_age']+'</td>'
                                    +'<td><label style="font-size: 9px;">Birth Date</label><br>'+metaContent['wife_birthdate']+'</td>'
                                    +'<td><label style="font-size: 9px;">Birth Place</label><br>'+metaContent['wife_birthplace']+'</td>'
                                    +'<td><label style="font-size: 9px;">Baptism Date</label><br>'+metaContent['wife_baptismdate']+'</td>'
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
                                    html+='</tr>';
                            }
                        }
                    }
                    if(certificate_type == "baptism"){
                        if(dataObject.length == 0){
                            html+= "<tr>"
                            +"<td colspan='21'>No Records Yet</td>"
                            +"</tr>";
                            $(`#${tableToShow}`).html(html);
                        }else{
                            for(var x = 0; x < dataObject.length; x++){
                                var metaContent = JSON.parse(dataObject[x]['meta']);
                                var rootContent = dataObject[x];
                                html+= '<tr>'
                                    +'<!-- Born On -->'
                                    +'<td>'+metaContent['born_on']+'</td>'
                                    +'<!-- Record of -->'
                                    +'<td><label style="font-size: 9px;">First Name</label><br>'+rootContent['firstname']+'</td>'
                                    +'<td><label style="font-size: 9px;">Middle Name</label><br>'+rootContent['middlename']+'</td>'
                                    +'<td><label style="font-size: 9px;">Last Name</label><br>'+rootContent['lastname']+'</td>'
                                    +'<!-- Born In -->'
                                    +'<td><label style="font-size: 9px;">Born In</label><br>'+metaContent['born_in']+'</td>'
                                    +'<!-- Born In -->'
                                    +'<td><label style="font-size: 9px;">Baptism Date</label><br>'+metaContent['baptism_date']+'</td>'
                                    +'<td><label style="font-size: 9px;">Minister</label><br>'+metaContent['baptism_minister']+'</td>'
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
                                    html+='</tr>';
                            }
                        }
                    }
                    if(certificate_type == "death"){
                        if(dataObject.length == 0){
                            html+= "<tr>"
                            +"<td colspan='21'>No Records Yet</td>"
                            +"</tr>";
                            $(`#${tableToShow}`).html(html);
                        }else{
                            for(var x = 0; x < dataObject.length; x++){
                                var metaContent = JSON.parse(dataObject[x]['meta']);
                                var responseContent = dataObject[x];
                                html+= '<tr>'
                                        +'<!-- Decease Name -->'
                                        +'<td><label style="font-size: 9px;">First Name</label><br>'+responseContent['firstname']+'</td>'
                                        +'<td><label style="font-size: 9px;">Middle Name</label><br>'+responseContent['middlename']+'</td>'
                                        +'<td><label style="font-size: 9px;">Last Name</label><br>'+responseContent['lastname']+'</td>'
                                        +'<!-- Other Info -->'
                                        +'<td><label style="font-size: 9px;">Age</label><br>'+metaContent['age']+'</td>'
                                        +'<td><label style="font-size: 9px;">Residence of</label><br>'+metaContent['residence']+'</td>'
                                        +'<td><label style="font-size: 9px;">Date of Death</label><br>'+metaContent['date_of_death']+'</td>'
                                        +'<td><label style="font-size: 9px;">Place of Burial</label><br>'+metaContent['place_of_burial']+'</td>'
                                        +'<td><label style="font-size: 9px;">Date of Burial</label><br>'+metaContent['date_of_burial']+'</td>'
                                        +'<td><label style="font-size: 9px;">Book Number</label><br>'+metaContent['book_number']+'</td>'
                                        +'<td><label style="font-size: 9px;">Page Number</label><br>'+metaContent['page_number']+'</td>'
                                        +'<td><label style="font-size: 9px;">Registry Number</label><br>'+metaContent['registry_number']+'</td>'
                                        +'<td><label style="font-size: 9px;">Date Issued</label><br>'+metaContent['date_issued']+'</td>'
                                        +'<!-- Priest Name -->';
                                +'</tr>';
                            }
                        }
                    }

                    //display the div
                    $(`#${divToShow}`).css("display", "block");
                    //hide the other DIVS
                    for(let divTohide of divToHideArr){
                        $(`#${divTohide}`).css("display", "none");
                    }
                    //display the data into table
                    $(`#${tableToShow}`).html(html);
                }, error: function(e){
                    Materialize.toast('Something Went Wrong:: '+e.responseJSON.message, 5000, 'red rounded');
                    console.log('["Confirmation Error"]: '+e.responseJSON.message);
                }
            });

        })
    });
</script>
