@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <br>
    <div class="row" style="margin-bottom: 0px !important;">
        <div class="col s12 m6">
            <div class="row" style="margin-bottom: 0px !important;">
                <h5 class="col s12 m3 left">Records</h5>
                <div class="input-field col s12 m4">
                    <select id="selectCertificate">
                        <option value="" disabled>Choose Record</option>
                        <option value="confirmation" selected>Confirmation Record</option>
                        <option value="marriage">Marriage Record</option>
                        <option value="birth">Birth Record</option>
                        <option value="death">Death Record</option>
                    </select>
                    <label>Choose Record</label>
                </div>
                <div class="input-field col s12 m4">
                    <input type="search" type="search" class="validate" id="searchARecord" style="background-color: transparent;">
                    <label>Search a record</label>
                </div>
                <div class="col s12 m1">
                    <a class="tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Show more filter" href="#filterTable">
                        <i class="material-icons" id="showFilter" style="margin-top: 25px;">filter_list</i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="input-field col s4">
                <!-- <select id="selectForm">
                    <option value="" disabled>Choose your option to Add</option>
                    <option value="individual" selected>Add individually</option>
                    <option value="group">Add per batch</option>
                </select>
                <label>Choose your option to Add</label> -->
            </div>
            <!-- Modal Trigger -->
            <a class="waves-effect waves-light btn modal-trigger right purple" href="#importExport" id="importExportButton">
                <i class="material-icons left">cloud_upload</i>Import
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m6">
            <!-- Tables -->
            <div id="confirmationTable" class="hide">
                @include('pages.certificates.form_and_table.confirmation.confirmation_table')
            </div>
            <div id="marriageTable" class="hide">
                @include('pages.certificates.form_and_table.mariage.mariage_table')
            </div>
            <div id="birthTable" class="hide">
                @include('pages.certificates.form_and_table.birth.birth_table')
            </div>
            <div id="deathTable" class="hide">
                @include('pages.certificates.form_and_table.death.death_table')
            </div>
        </div>

        <div class="col s12 m6">
            <!-- Forms -->
            <div id="confirmationForm" class="hide">
                <!-- Single Add Form -->
                <div class="singleConfirmation hide">
                    @include('pages.certificates.form_and_table.confirmation.confirmation_form')                    
                </div>
                <!-- Multiple Add Form -->
                <div class="groupConfirmation hide">
                    @include('pages.certificates.form_and_table.confirmation.confirmation_form_group')
                </div>
            </div>
            <div id="marriageForm" class="hide">
                <!-- Single Add Form -->
                <div class="singleMarriage hide">
                    @include('pages.certificates.form_and_table.mariage.mariage_form')                    
                </div>
                <!-- Multiple Add Form -->
                <div class="groupMarriage hide">
                    @include('pages.certificates.form_and_table.mariage.mariage_form_group')
                </div>
            </div>
            <div id="birthForm" class="hide">
                <!-- Single Add Form -->
                <div class="singleBirth hide">
                    @include('pages.certificates.form_and_table.birth.birth_form')                    
                </div>
                <!-- Multiple Add Form -->
                <div class="groupBirth hide">
                    @include('pages.certificates.form_and_table.birth.birth_form_group')
                </div>
            </div>
            <div id="deathForm" class="hide">
                <!-- Single Add Form -->
                <div class="singleDeath hide">
                    @include('pages.certificates.form_and_table.death.death_form')                    
                </div>
                <!-- Multiple Add Form -->
                <div class="groupDeath hide">
                    @include('pages.certificates.form_and_table.death.death_form_group')
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $(".certificate").addClass('active');
        $(".priest").removeClass('active');
        isTokenExist();
        tokenValid();
        setFormSelection();
        setPriestDropdown();

        // Initiate Confirmation Worker
        initiateConfirmationWorker();

        function tokenValid(){
            if(localStorage.getItem('AT') != null){
                var atVal = localStorage.getItem('AT');
                checkTokenValidity(atVal);
            }
        }

        function setPriestDropdown(){
            isTokenExist();
            var AT = localStorage.getItem("AT");
            checkTokenValidity(AT);

            $.ajax({
                type: 'GET',
                url: priest_endpoint+"/0",
                data: {"isDropdown": true},
                success: function(response){
                    var html = "";
                    var priestObject = response.data;
                    $(".priest_select_dropdown").html('');
                    html += "<option value='' disabled selected>Select Parish Priest</option>";
                    for(var x = 0; x < priestObject.length; x++){
                        var midname = priestObject[x]['middlename'] == null ? '':priestObject[x]['middlename'];
                        var trimed_middle_name;
                        if(midname == ""){
                            trimed_middle_name = midname;
                        }else{
                            trimed_middle_name = priestObject[x]['middlename'].charAt(0)+".";
                        }
                        
                        var trimed_prefix = priestObject[x]['prefix'];
                        html += "<option value='"+priestObject[x]['id']+"'>"+trimed_prefix+" "+priestObject[x]['firstname']+" "+trimed_middle_name+" "+priestObject[x]['lastname']+"</option>";
                    }
                    html += "<option value='0'>Unset Parish Priest</option>";
                    html += "<option value='special'>Add Parish Priest</option>";
                    $(".priest_select_dropdown").html(html);
                    $('.priest_select_dropdown').material_select();
                },error: function(e){
                    $('#modalSysError').modal('open');
                }
            });
        }

        $("#selectForm").on('change', function(){
            var selectedOption = $(this).val();
            localStorage.setItem('defaultForm',selectedOption);
            setFormSelection();
        });
        $("#selectCertificate").on('change', function(){
            var selectedOption = $(this).val();
            // Clear Search Input first
            $("#searchARecord").val('');

            localStorage.setItem('defaultTable',selectedOption);
            setFormSelection();
        });

        $(".priest_select_dropdown").on('change', function(e){
            e.preventDefault();
            var selectedOption = $(this).val();
            if(selectedOption == 'special'){
                $('.priest_select_dropdown').val('');
                location.href="/ihmp/priest";
            }
        });



        // ------------------------- Confirmation Import
        // Will hold a list of array,
        // Values of array are the data to import in db
        var arrayToImport = [];
        // will hold the values
        var emptyRowsImportConfirmation = [];
        var rowsWithValueImportConfirmation = [];

        $("#templateDownloadDropdown").on('change', function(){
            // Clear Record First
            emptyRowsImportConfirmation = [];
            rowsWithValueImportConfirmation = [];
            arrayToImport = [];
            $("#importCSV").val('');
            $("#btnStartImportSequence").addClass('disabled');
            $("#showDataToImport").html('');
            $("#countRecord").html('Data To Import Will Show Below');

            // Set up settings
            var getVal = $(this).val();
            localStorage.setItem("templateDropdown", getVal);

            if(getVal == ""){
                $("#btnDownload").addClass('disabled');
                $("#uploadFile").addClass('disabled');
                // $("#btnStartImportSequence").addClass('disabled');
            }else{
                $("#btnDownload").removeClass('disabled');
                $("#uploadFile").removeClass('disabled');
                // $("#btnStartImportSequence").removeClass('disabled');

                // Create a link file to download
                if(getVal == "confirmation"){
                    $("#btnDownload").prop('href','download/Confirmation_Template.csv');
                }else if(getVal == "marriage"){
                    $("#btnDownload").prop('href','download/Marriage_Template.csv');
                }else if(getVal == "birth"){
                    $("#btnDownload").prop('href','download/Birth_Template.csv');
                }else if(getVal == "death"){
                    $("#btnDownload").prop('href','download/Death_Template.csv');
                }
            }
        });

        // will return unique values of array
        function getUnique(array){
            var uniqueArray = [];
            
            // Loop through array values
            for(i=0; i < array.length; i++){
                if(array[i] != ""){
                    if(uniqueArray.indexOf(array[i]) === -1) {
                        uniqueArray.push(array[i]);
                    }
                }
            }
            return uniqueArray;
        }

        // will validate the uploaded file if it match to the selected template
        function isFileToUploadValid(file){
            var getDropdownValue = $("#templateDownloadDropdown").val();
            if(file.toLowerCase().includes(getDropdownValue.toLowerCase())){
                return true;
            }else{
                return false;
            }
        }

        // Clear the import field
        $("#importCSV").on('click', function(e){
            $("#importCSV").val('');
            arrayToImport = [];
            emptyRowsImportConfirmation = [];
            rowsWithValueImportConfirmation = [];
        });

        // Uploading Data to Html
        $("#importCSV").change(function(e) {
            e.preventDefault();

            var ext = $("#importCSV").val().split(".").pop().toLowerCase();
            if($.inArray(ext, ["csv"]) == -1) {
                Materialize.toast('Uploaded file is not csv file', 5000, 'red rounded');
                return false;
            } 
            if (e.target.files != undefined) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var lines = e.target.result.split('\r\n');
                    var firstLine = lines[0];
                    var headersLength = 0;
                    var newSetArray = [];
                    // Validate Template to upload
                    var isTrue = isFileToUploadValid(firstLine);
                    if(isTrue){
                        html = "";
                        // Used a condition to test whether what type of certificate is uploaded
                        // this will help also to categorize the certificates wether the template
                        // has more header message than the other templates
                        if(firstLine.toLowerCase().includes('confirmation')){
                            html+="<table class='striped' style='width: 340%;'>"
                            +"<thead>";
                            var getHeaders = lines[6].split(",");
                            headersLength = getHeaders.length;
                            // Create Headers First
                            for(var x = 0; x < getHeaders.length; x++){
                                html+="<th>"+getHeaders[x]+"</th>";
                            }
                            // Remove the headers
                            lines.splice(0,7);
                            newSetArray = lines;
                        }else if(firstLine.toLowerCase().includes('birth')){
                            html+="<table class='striped' style='width: 340%;'>"
                            +"<thead>";
                            var getHeaders = lines[6].split(",");
                            headersLength = getHeaders.length;
                            // Create Headers First
                            for(var x = 0; x < getHeaders.length; x++){
                                html+="<th>"+getHeaders[x]+"</th>";
                            }
                            // Remove the headers
                            lines.splice(0,7);
                            newSetArray = lines;
                        }else if(firstLine.toLowerCase().includes('marriage')){
                            html+="<table class='striped' style='width: 520%;'>"
                            +"<thead>";
                            var getHeaders = lines[6].split(",");
                            headersLength = getHeaders.length;
                            // Create Headers First
                            for(var x = 0; x < getHeaders.length; x++){
                                html+="<th>"+getHeaders[x]+"</th>";
                            }
                            // Remove the headers
                            lines.splice(0,7);
                            newSetArray = lines;
                        }else if(firstLine.toLowerCase().includes('death')){
                            html+="<table class='striped' style='width: 340%;'>"
                            +"<thead>";
                            var getHeaders = lines[6].split(",");
                            headersLength = getHeaders.length;
                            // Create Headers First
                            for(var x = 0; x < getHeaders.length; x++){
                                html+="<th>"+getHeaders[x]+"</th>";
                            }
                            // Remove the headers
                            lines.splice(0,7);
                            newSetArray = lines;
                        }else{
                            // CSV File is been edited.
                            Materialize.toast('It seems that the header of the uploaded file i edited\nPlease download the file again', 5000, 'red rounded');
                            return false;
                        }
                        html+="</thead>"
                        +"<tbody>";
                        // Remove Duplicate Values
                        newSetArray = getUnique(newSetArray);

                        // Display the total number of records
                        newSetArray.length > 0 ? 
                        $("#countRecord").html(newSetArray.length+" "+(newSetArray.length > 1 ? "Records":"Record")+" found and ready to import!"):
                        $("#countRecord").html('It seems you uploaded an empty file');

                        if(newSetArray.length > 0){
                            $("#btnStartImportSequence").removeClass('disabled');
                            // Display Fields to table
                            for (i = 0; i < newSetArray.length; ++i)
                            {
                                // Convert String to array
                                var record = newSetArray[i].split(",");

                                // Save Record to use in insert
                                arrayToImport.push(record);

                                // Generate Records
                                html+="<tr>";
                                for(var y = 0; y < record.length; y++){
                                    html+="<td>"+record[y]+"</td>";
                                }
                                html+="</tr>";
                            }
                        }else{
                            $("#btnStartImportSequence").addClass('disabled');
                            html+="<tr><td colspan='"+headersLength+"'>No Record Found</td></tr>"
                        }

                        html+="</tbody>"
                        +"</table>";
                        $("#showDataToImport").html(html);

                        // TODO:: Generate Import Sequence
                        console.log(arrayToImport);
                    }else{
                        Materialize.toast('Uploaded file is different from the one selected', 5000, 'red rounded');
                        return false;
                    }
                };
                reader.readAsText(e.target.files.item(0));
            }
            return false;
        });

        // to start import sequence
        $("#btnStartImportSequence").on('click', function(){
            isTokenExist();
            var AT = localStorage.getItem("AT");
            checkTokenValidity(AT);

            var delagatedId = parseInt(localStorage.getItem('delegatedUser'));
            var delegated_user = AT.substring(delagatedId+1, AT.length);

            if(localStorage.getItem("templateDropdown") != null){
                var getCert = localStorage.getItem("templateDropdown");
                for(var x = 0; x < arrayToImport.length; x++){
                    var splitRecord = arrayToImport[x];
                    // console.log(splitRecord);
                    if(getCert == "confirmation"){
                        validateAllFieldsAndCreatePayloadImportConfirmation(
                            x,
                            splitRecord[0], // Firstname
                            splitRecord[1], // Middle Name
                            splitRecord[2], // Last Name
                            splitRecord[3], // Fathers First name
                            splitRecord[4], // Fathers Middle name
                            splitRecord[5], // Fathers Last name
                            splitRecord[6], // Mothers First name
                            splitRecord[7], // Mothers Middle name
                            splitRecord[8], // Mothers Last name
                            splitRecord[9], // Confirmation Date
                            splitRecord[10], // Date Issued
                            splitRecord[11], // Confirmation By
                            splitRecord[12], // First Sponsor
                            splitRecord[13], // Second Sponsor
                            splitRecord[14], // Register Book
                            splitRecord[15], // Book Page
                            splitRecord[16], // Number
                            0,
                            delegated_user
                        );
                    }else if(getCert == "marriage"){
                        // console.log('validateAllFieldsAndCreatePayloadForMarriage');
                        // console.log(splitRecord[4]);
                        validateAllFieldsAndCreatePayloadForMarriage(
                            x,
                            splitRecord[0], //husband_firstname,
                            splitRecord[1], //husband_middlename,
                            splitRecord[2], //husband_lastname,
                            splitRecord[3], //husband_civil_status,
                            splitRecord[4], //husband_birthdate,
                            splitRecord[6], //husband_birth_place,
                            splitRecord[7], //husband_residence,
                            splitRecord[5], //husband_baptismdate,
                            splitRecord[8], //husband_fathersname,
                            splitRecord[9], //husband_mothersname,
                            splitRecord[10], //husband_first_witness,
                            splitRecord[11], //husband_second_witness,
                            splitRecord[12], //wife_firstname,
                            splitRecord[13], //wife_middlename,
                            splitRecord[14], //wife_lastname,
                            splitRecord[15], //wife_civil_status,
                            splitRecord[16], //wife_birthdate,
                            splitRecord[18], //wife_birthplace,
                            splitRecord[19], //wife_residence,
                            splitRecord[17], //wife_baptismdate,
                            splitRecord[20], //wife_fathersname,
                            splitRecord[21], //wife_mothersname,
                            splitRecord[22], //wife_firstwitness,
                            splitRecord[23], //wife_secondwitness,
                            splitRecord[24], //marriage_place,
                            splitRecord[25], //marriage_date,
                            splitRecord[26], //solemnized_by,
                            splitRecord[27], //marriage_number,
                            splitRecord[28], //marriage_page,
                            splitRecord[29], //marriage_line,
                            splitRecord[30], //marriage_date_issue,
                            delegated_user,
                        );
                    }else if(getCert == "birth"){
                        validateAllFieldsAndCreatePayloadForBirth(
                            x,
                            splitRecord[0], // Firstname
                            splitRecord[1], // Middle Name
                            splitRecord[2], // Last Name
                            splitRecord[3], // birth_born_on,
                            splitRecord[4], // birth_born_in,
                            splitRecord[5], // birth_father_first_name,
                            splitRecord[6], // birth_father_middle_name,
                            splitRecord[7], // birth_father_last_name,
                            splitRecord[8], // birth_mothers_first_name,
                            splitRecord[9], // birth_father_middle_name,
                            splitRecord[10], // birth_mother_last_name,
                            splitRecord[11], // birth_resident_of,
                            splitRecord[14], // birth_godparents,
                            splitRecord[15], // birth_baptismal_register,
                            splitRecord[16], // birth_volume,
                            splitRecord[17], // birth_page,
                            splitRecord[18], // birth_date_issued,
                            0, // birth_parish_priest,
                            splitRecord[12], // birth_baptism_date,
                            splitRecord[13], // birth_minister,
                            delegated_user, // delegated_user,
                        );
                    }else if(getCert == "death"){
                        validateAllFieldsAndCreatePayloadForDeath(
                            x,
                            splitRecord[0], //death_firstname,
                            splitRecord[1], // death_middlename,
                            splitRecord[2], //death_lastname,
                            splitRecord[3], //death_age,
                            splitRecord[4], //death_residence,
                            splitRecord[5], //date_of_death,
                            splitRecord[6], //death_place_of_burial,
                            splitRecord[7], //date_of_burial,
                            splitRecord[7], //death_informant,
                            splitRecord[8], //death_book_number,
                            splitRecord[9], //death_page_number,
                            splitRecord[10], //death_registry_number,
                            splitRecord[11], //death_date_issued,
                            0,
                            delegated_user
                        );
                    }
                }
                
                if(emptyRowsImportConfirmation.length > 0){
                    Materialize.toast('Number of Records with Issue '+emptyRowsImportConfirmation.length, 5000,'red rounded');
                }
                // console.log('emptyRowsImportConfirmation:: ', emptyRowsImportConfirmation);
                // console.log('rowsWithValueImportConfirmation:: ', rowsWithValueImportConfirmation);

                // Store rowsWithValueImportConfirmation to localStorage
                if(rowsWithValueImportConfirmation.length > 0){
                    if(localStorage.getItem('transactionsImportConfirmation') === null){
                        localStorage.setItem('transactionsImportConfirmation',JSON.stringify(rowsWithValueImportConfirmation));
                    }else{
                        if(localStorage.getItem('transactionsImportConfirmation') == "[]"){
                            localStorage.setItem('transactionsImportConfirmation',JSON.stringify(rowsWithValueImportConfirmation));
                        }
                    }
                }
                // Clearing array since record is already in localStorage
                rowsWithValueImportConfirmation = [];
                emptyRowsImportConfirmation = [];

                // Clear modal form before closes
                $("#showDataToImport").html('');
                $("#countRecord").html('Data To Import Will Show Below');
                $("#templateDownloadDropdown").val('');
                $("#templateDownloadDropdown").material_select();
                $("#btnDownload").addClass('disabled');
                $("#uploadFile").addClass('disabled');
                $("#btnStartImportSequence").addClass('disabled');
                $("#importExport").modal('close');
                
                
                // Clear Search Input first
                $("#searchARecord").val('');
                // Update Dropdown Records

                // reinstalling table base on selected import
                // localStorage.setItem('defaultTable',getCert);
                // setFormSelection();

                // Initiate Worker
                initiateConfirmationWorker();
            }else{
                Materialize.toast('Please Refresh Browser', 5000,'red rounded');
            }
        });

        // will hold error records
        var errorSavingRecords = [];

        // Get Age
        function getAge(birthdate){
            var translatedDate = (birthdate.getMonth()+1)+"/"+birthdate.getDate()+"/"+birthdate.getFullYear();
            var today = new Date();
            var birthDate = new Date(translatedDate);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        }


        /// will validate all fields for confirmation
        function validateAllFieldsAndCreatePayloadImportConfirmation(
            row,
            firstname,
            middlename,
            lastname,
            father_firstname,
            father_middlename,
            father_lastname,
            mother_firstname,
            mother_middlename,
            mother_lastname,
            confirmation_date,
            date_issued,
            confirmation_by,
            fsponsor_firstname,
            ssponsor_firstname,
            register_book,
            book_page,
            book_number,
            priest_id,
            delegated_user
        ){
            /// Validate for all empty rows
            if(
                firstname == null || firstname == undefined || firstname == "" ||
                lastname == null || lastname == undefined || lastname == "" ||
                confirmation_date == null || confirmation_date == undefined || confirmation_date == ""
            ){
                emptyRowsImportConfirmation.push(row);
                Materialize.toast('Number of Records with Issue'+emptyRowsImportConfirmation.length, 5000,'red rounded');
            }else{
                if(isNaN(Date.parse(confirmation_date))){
                    emptyRowsImportConfirmation.push(row);
                }else if(isNaN(Date.parse(date_issued))){
                    emptyRowsImportConfirmation.push(row);
                }else{
                    var payloadToCreate;
                    var single_confirmation_date = new Date(confirmation_date);
                    var single_confirmation_converted_month = single_confirmation_date.getMonth()+1;
                    var single_confirmation_converted_date = single_confirmation_date.getDate();
                    var single_confirmation_converted_year = single_confirmation_date.getFullYear();
                    date_issued = new Date(date_issued);
                    var metaContent = {
                        "father_firstname": father_firstname,
                        "father_middlename": father_middlename,
                        "father_lastname": father_lastname,
                        "mother_firstname": mother_firstname,
                        "mother_middlename": mother_middlename,
                        "mother_lastname": mother_lastname,
                        "confirmation_day":single_confirmation_converted_date,
                        "confirmation_month":single_confirmation_converted_month,
                        "confirmation_year":single_confirmation_converted_year,
                        "confirmation_by":confirmation_by,
                        "first_sponsor":fsponsor_firstname,
                        "second_sponsor":ssponsor_firstname,
                        "registration_book":register_book,
                        "book_page":book_page,
                        "book_number":book_number,
                        "date_issued":(date_issued.getMonth()+1)+"/"+date_issued.getDate()+"/"+date_issued.getFullYear()
                    };
                    payloadToCreate = {
                        "firstname": firstname,
                        "middlename": middlename,
                        "lastname": lastname,
                        "certificate_type": "confirmation",
                        "priest_id": priest_id,
                        "meta": JSON.stringify(metaContent),
                        "created_by": delegated_user,
                    };
                    rowsWithValueImportConfirmation.push({
                        "row": row,
                        "payload": payloadToCreate,
                    });
                }
            }
        }

        // will validate all fields for birth
        function validateAllFieldsAndCreatePayloadForBirth(
            row,
            birth_first_name,
            birth_middle_name,
            birth_last_name,
            birth_born_on,
            birth_born_in,
            birth_father_first_name,
            birth_father_middle_name,
            birth_father_last_name,
            birth_mothers_first_name,
            birth_father_middle_name,
            birth_mother_last_name,
            birth_resident_of,
            birth_godparents,
            birth_baptismal_register,
            birth_volume,
            birth_page,
            birth_date_issued,
            birth_parish_priest,
            birth_baptism_date,
            birth_minister,
            delegated_user,
        ){
            /// Validate for all empty rows
            if(
                birth_first_name == null || birth_first_name == undefined || birth_first_name == "" ||
                birth_last_name == null || birth_last_name == undefined || birth_last_name == "" ||
                birth_born_on == null || birth_born_on == undefined || birth_born_on == "" ||
                birth_baptism_date == null || birth_baptism_date == undefined || birth_baptism_date == ""||
                birth_minister == null || birth_minister == undefined || birth_minister == ""
            ){
                emptyRowsImportConfirmation.push(row);
            }else{
                
                if(
                    isNaN(Date.parse(birth_born_on)) ||
                    isNaN(Date.parse(birth_date_issued)) ||
                    isNaN(Date.parse(birth_date_issued))
                ){
                    emptyRowsImportConfirmation.push(row);
                }else{
                    var payloadToCreate;
                    birth_date_issued = new Date(birth_date_issued);
                    birth_born_on = new Date(birth_born_on);
                    birth_baptism_date = new Date(birth_baptism_date);
                    var metaContent = {                    
                        "born_on":birth_born_on.getMonth()+"/"+birth_born_on.getDate()+"/"+birth_born_on.getFullYear(),
                        "born_in":birth_born_in,
                        "father_firstname":birth_father_first_name,
                        "father_middlename":birth_father_middle_name,
                        "father_lastname":birth_father_last_name,
                        "mother_firstname":birth_mothers_first_name,
                        "mother_middlename":birth_father_middle_name,
                        "mother_lastname":birth_mother_last_name,
                        "resident_of":birth_resident_of,
                        "baptism_date":birth_baptism_date.getMonth()+"/"+birth_baptism_date.getDate()+"/"+birth_baptism_date.getFullYear(),
                        "baptism_minister":birth_minister,
                        "godparents":birth_godparents,
                        "baptismal_register":birth_baptismal_register,
                        "volume":birth_volume,
                        "page":birth_page,
                        "date_issued":birth_date_issued.getMonth()+"/"+birth_date_issued.getDate()+"/"+birth_date_issued.getFullYear(),
                    };
                    payloadToCreate = {
                        "firstname": birth_first_name,
                        "middlename": birth_middle_name,
                        "lastname": birth_last_name,
                        "certificate_type": "baptism",
                        "priest_id": birth_parish_priest == null ? 0:birth_parish_priest,
                        "meta": JSON.stringify(metaContent),
                        "created_by": delegated_user,
                    };
                    rowsWithValueImportConfirmation.push({
                        "row": row,
                        "payload": payloadToCreate,
                    });
                }
            }
        }
        
        // will validate all fields for Marriage
        function validateAllFieldsAndCreatePayloadForMarriage(
            row,
            husband_firstname,
            husband_middlename,
            husband_lastname,
            husband_civil_status,
            husband_birthdate_import,
            husband_birth_place,
            husband_residence,
            husband_baptismdate,
            husband_fathersname,
            husband_mothersname,
            husband_first_witness,
            husband_second_witness,
            wife_firstname,
            wife_middlename,
            wife_lastname,
            wife_civil_status,
            wife_birthdate,
            wife_birthplace,
            wife_residence,
            wife_baptismdate,
            wife_fathersname,
            wife_mothersname,
            wife_firstwitness,
            wife_secondwitness,
            marriage_place,
            marriage_date,
            solemnized_by,
            marriage_number,
            marriage_page,
            marriage_line,
            marriage_date_issue,
            delegated_user,
        ){
            /// Validate for all empty rows
            if(
                husband_firstname == null || husband_firstname == undefined || husband_firstname == "" ||
                husband_lastname == null || husband_lastname == undefined || husband_lastname == "" ||
                isNaN(Date.parse(husband_birthdate_import)) ||
                wife_firstname == null || wife_firstname == undefined || wife_firstname == "" ||
                wife_middlename == null || wife_middlename == undefined || wife_middlename == ""||
                wife_lastname == null || wife_lastname == undefined || wife_lastname == "" ||
                isNaN(Date.parse(wife_birthdate)) ||
                isNaN(Date.parse(marriage_date))
                // !husband_civil_status.toLowerCase().includes('single') ||
                // !husband_civil_status.toLowerCase().includes('widowed') ||
                // !husband_civil_status.toLowerCase().includes('divorced')
            ){
                emptyRowsImportConfirmation.push(row);
            }else{                
                var payloadToCreate;
                console.log(husband_birthdate_import);
                husband_birthdate_import = new Date(husband_birthdate_import);
                husband_baptismdate = new Date(husband_baptismdate);
                wife_birthdate = new Date(wife_birthdate);
                wife_baptismdate = new Date(wife_baptismdate);
                marriage_date = new Date(marriage_date);
                marriage_date_issue = new Date(marriage_date_issue);
                
                
                var metaContent = {
                    "husband_firstname":husband_firstname,
                    "husband_middlename":husband_middlename,
                    "husband_lastname":husband_lastname,
                    "husband_age":getAge(husband_birthdate_import),
                    "husband_civil_status":husband_civil_status,
                    "husband_birthdate":(husband_birthdate_import.getMonth()+1)+"/"+husband_birthdate_import.getDate()+"/"+husband_birthdate_import.getFullYear(),
                    "husband_birthplace":husband_birth_place,
                    "husband_residence":husband_residence,
                    "husband_baptismdate":(husband_baptismdate.getMonth()+1)+"/"+husband_baptismdate.getDate()+"/"+husband_baptismdate.getFullYear(),
                    "husband_fathersname":husband_fathersname,
                    "husband_mothersname":husband_mothersname,
                    "husband_firstwitness":husband_first_witness,
                    "husband_secondwitness":husband_second_witness,
                    "wife_firstname":wife_firstname,
                    "wife_middlename":wife_middlename,
                    "wife_lastname":wife_lastname,
                    "wife_age":getAge(wife_birthdate),
                    "wife_civil_status":wife_civil_status,
                    "wife_birthdate":(wife_birthdate.getMonth()+1)+"/"+wife_birthdate.getDate()+"/"+wife_birthdate.getFullYear(),
                    "wife_birthplace":wife_birthplace,
                    "wife_residence":wife_residence,
                    "wife_baptismdate":(wife_baptismdate.getMonth()+1)+"/"+wife_baptismdate.getDate()+"/"+wife_baptismdate.getFullYear(),
                    "wife_fathersname":wife_fathersname,
                    "wife_mothersname":wife_mothersname,
                    "wife_firstwitness":wife_firstwitness,
                    "wife_secondwitness":wife_secondwitness,
                    "marriage_place":marriage_place,
                    "marriage_date":(marriage_date.getMonth()+1)+"/"+marriage_date.getDate()+"/"+marriage_date.getFullYear(),
                    "solemnized_by":solemnized_by,
                    "marriage_number":marriage_number,
                    "marriage_page":marriage_page,
                    "marriage_line":marriage_line,
                    "marriage_day":marriage_date_issue.getDate(),
                    "marriage_month":marriage_date_issue.getMonth()+1,
                    "marriage_year":marriage_date_issue.getFullYear(),
                };
                payloadToCreate = {
                    "firstname": husband_firstname,
                    "middlename": husband_middlename,
                    "lastname": husband_lastname,
                    "certificate_type": "marriage",
                    "priest_id": 0,
                    "meta": JSON.stringify(metaContent),
                    "created_by": delegated_user,
                };
                rowsWithValueImportConfirmation.push({
                    "row": row,
                    "payload": payloadToCreate,
                });
            }
        }

        // will validate all fields for Death
        function validateAllFieldsAndCreatePayloadForDeath(
            row,
            death_firstname,
            death_middlename,
            death_lastname,
            death_age,
            death_residence,
            date_of_death,
            death_place_of_burial,
            date_of_burial,
            death_informant,
            death_book_number,
            death_page_number,
            death_registry_number,
            death_date_issued,
            delegated_user,
        ){
            /// Validate for all empty rows
            if(
                death_firstname == null || death_firstname == undefined || death_firstname == "" ||
                death_lastname == null || death_lastname == undefined || death_lastname == "" ||
                isNaN(Date.parse(date_of_death)) ||
                isNaN(Date.parse(date_of_burial)) ||
                isNaN(Date.parse(death_date_issued))
            ){
                emptyRowsImportConfirmation.push(row);
            }else{                
                var payloadToCreate;
                date_of_death = new Date(date_of_death);
                date_of_burial = new Date(date_of_burial);
                death_date_issued = new Date(death_date_issued);
                var metaContent = {
                    "deceased_name":death_firstname+" "+death_middlename+" "+death_lastname,
                    "age":death_age,
                    "residence":death_residence,
                    "date_of_death":(date_of_death.getMonth()+1)+"/"+date_of_death.getDate()+"/"+date_of_death.getFullYear(),
                    "place_of_burial":death_place_of_burial,
                    "date_of_burial":(date_of_burial.getMonth()+1)+"/"+date_of_burial.getDate()+"/"+date_of_burial.getFullYear(),
                    "informant_or_relatives":death_informant,
                    "book_number":death_book_number,
                    "page_number":death_page_number,
                    "registry_number":death_registry_number,
                    "date_issued":(death_date_issued.getMonth()+1)+"/"+death_date_issued.getDate()+"/"+death_date_issued.getFullYear(),
                };
                payloadToCreate = {
                    "firstname": death_firstname,
                    "middlename": death_middlename,
                    "lastname": death_lastname,
                    "certificate_type": "death",
                    "priest_id": 0,
                    "meta": JSON.stringify(metaContent),
                    "created_by": delegated_user,
                };
                rowsWithValueImportConfirmation.push({
                    "row": row,
                    "payload": payloadToCreate,
                });
            }
        }

        // worker will do the saving of the transaction
        function initiateConfirmationWorker(){
            if(localStorage.getItem("templateDropdown") != null){
                var dropdownVal = localStorage.getItem("templateDropdown");
                // Worker Main Transaction
                if(localStorage.getItem('transactionsImportConfirmation') != null){
                    
                    // Close and Disable modal button
                    $("#importExportButton").addClass('disabled');
                    if(localStorage.getItem('transactionsImportConfirmation') != "[]"){
                        console.log('Starting saving sequence');

                        // TODO:: FETCH Transactions from localStorage
                        var listOfTransactions = localStorage.getItem('transactionsImportConfirmation');

                        // Convert Transaction string to iterable
                        var convertedListOfTranscations = JSON.parse(listOfTransactions);
                        
                        // Show the progress indicator
                        $("#importProgress").removeClass('hide');
                        $("#importInProgressMessage").html('Import in progress ('+convertedListOfTranscations.length+' Records left)');
                        
                        // always get the first record
                        var toSavePayload = convertedListOfTranscations[0]['payload'];
                        var currentRow = convertedListOfTranscations[0]['row'];

                        // create the condition to initiate a recursive command
                        savingConfirmationRecord(currentRow, toSavePayload, convertedListOfTranscations);
                    }else{
                        $("#errorImports").css('right', '5%');
                        $("#importInProgressMessage").html('Records Imported');
                        $("#importExportButton").removeClass('disabled');
                        // Clear Arrays
                        emptyRowsImportConfirmation = [];
                        rowsWithValueImportConfirmation = [];
                        arrayToImport = [];
                        setTimeout(function(){
                            $("#importProgress").addClass('hide');
                        }, 3000);
                        setTimeout(() => {
                            $("#errorImports").addClass('hide');
                        }, 8000);
                    }
                }
            }else{
                localStorage.removeItem('transactionsImportConfirmation');
            }
        }
        

        function savingConfirmationRecord(row, payload, listOfTransactions){
            $.ajax({
                type: "POST",
                url: certificate_endpoint,
                data: JSON.stringify(payload),
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(response){
                    // removing the first object of the transaction list
                    listOfTransactions.shift();
                    // remove transactions in local Storage to replace new
                    localStorage.removeItem('transactionsImportConfirmation');
                    localStorage.setItem('transactionsImportConfirmation', JSON.stringify(listOfTransactions));
                    if(response.status >= 200 && response.status < 400){
                        // update the table
                        if(localStorage.getItem("templateDropdown") != null){
                            var getCert = localStorage.getItem("templateDropdown");
                            if(getCert == 'confirmation'){                        
                                getConfirmationList('NA');
                            }else if(getCert == 'marriage'){                        
                                getMarriageList('NA');
                            }else if(getCert == 'birth'){                        
                                getBirthList('NA');
                            }else if(getCert == 'death'){                        
                                getDeathList('NA');
                            }
                        }
                    }else if(response.status >= 400){
                        errorSavingRecords.push({
                            "row": row,
                            "payload": payload,
                            "message": "Duplicated"
                        });
                        $("#errorImports").css('right', '24%');
                        $("#errorImports").removeClass("hide");
                        $("#errorImportMessage").html("Some record already exists ("+errorSavingRecords.length+")");
                    }
                    
                    // call again initiate worker after 3 seconds to create a recursive effect
                    setTimeout(function(){
                        initiateConfirmationWorker();
                    }, 1500);
                }, error: function(e){
                    console.log(e);
                    errorSavingRecords.push({
                        "row": row,
                        "payload": payload,
                        "message": e
                    });
                }
            });

        }
        // ------------------------- End Confirmation Import
    });
</script>
@endsection