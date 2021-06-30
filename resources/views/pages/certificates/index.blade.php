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
            <a class="waves-effect waves-light btn modal-trigger right" href="!#" id="importExportButton">
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
                url: priest_endpoint,
                success: function(response){
                    var html = "";
                    var priestObject = response.data.data;
                    $(".priest_select_dropdown").html('');
                    html += "<option value='' disabled selected>Select Parish Priest</option>";
                    for(var x = 0; x < priestObject.length; x++){
                        var trimed_middle_name = priestObject[x]['middlename'].charAt(0)+".";
                        var trimed_prefix = priestObject[x]['prefix'].substring(0,3)+".";
                        html += "<option value='"+priestObject[x]['id']+"'>"+trimed_prefix+" "+priestObject[x]['firstname']+" "+trimed_middle_name+" "+priestObject[x]['lastname']+"</option>";
                    }
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
                $("#addPriestModalForm").modal('open');
            }
        });



        // ------------------------- Confirmation Import
        $("#importExportButton").on('click', function(e){
            e.preventDefault();
            $("#importExport").modal('open');
            // Clear Fields
        });
        // Will hold a list of array,
        // Values of array are the data to import in db
        var arrayToImport = [];
        // will hold the values
        var emptyRowsImportConfirmation = [];
        var rowsWithValueImportConfirmation = [];

        $("#templateDownloadDropdown").on('change', function(){
            var getVal = $(this).val();

            if(getVal == ""){
                $("#btnDownload").addClass('disabled');
                $("#uploadFile").addClass('disabled');
                $("#btnStartImportSequence").addClass('disabled');
            }else{
                $("#btnDownload").removeClass('disabled');
                $("#uploadFile").removeClass('disabled');
                $("#btnStartImportSequence").removeClass('disabled');

                // Create a link file to download
                if(getVal == "confirmation"){
                    $("#btnDownload").prop('href','download/Confirmation_Template.csv');
                }else if(getVal == "mariage"){
                    // $("#btnDownload").prop('href','download/Confirmation_Template.csv');
                    $("#btnDownload").addClass('disabled');
                    $("#uploadFile").addClass('disabled');
                    $("#btnStartImportSequence").addClass('disabled');
                    Materialize.toast('Sorry! File is not ready yet', 5000, 'red rounded');
                }else if(getVal == "birth"){
                    // $("#btnDownload").prop('href','download/Confirmation_Template.csv');
                    $("#btnDownload").addClass('disabled');
                    $("#uploadFile").addClass('disabled');
                    $("#btnStartImportSequence").addClass('disabled');
                    Materialize.toast('Sorry! File is not ready yet', 5000, 'red rounded');
                }else if(getVal == "death"){
                    // $("#btnDownload").prop('href','download/Confirmation_Template.csv');
                    $("#btnDownload").addClass('disabled');
                    $("#uploadFile").addClass('disabled');
                    $("#btnStartImportSequence").addClass('disabled');
                    Materialize.toast('Sorry! File is not ready yet', 5000, 'red rounded');
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

        // Uploading Data to Html
        $("#importCSV").change(function(e) {
            e.preventDefault();

            // Show In Progress
            var html = "Fetching Data";
            $("#showDataToImport").html(html);


            var ext = $("#importCSV").val().split(".").pop().toLowerCase();
            if($.inArray(ext, ["csv"]) == -1) {
                alert('Upload CSV');
                return false;
            } 
            if (e.target.files != undefined) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var lines = e.target.result.split('\r\n');
                    var firstLine = lines[0];
                    var headersLength = 0;
                    var newSetArray = [];

                    html = "";

                    html+="<table class='striped' style='width: 340%;'>"
                    +"<thead>";
                    if(firstLine.toLowerCase().includes('confirmation')){
                        var getHeaders = lines[6].split(",");
                        console.log(getHeaders.length);
                        // Create Headers First
                        for(var x = 0; x < getHeaders.length; x++){
                            html+="<th>"+getHeaders[x]+"</th>";
                        }
                        // Remove the headers
                        lines.splice(0,7);
                        newSetArray = lines;
                    }else if(firstLine.toLowerCase().includes('birth')){
                        
                    }else if(firstLine.toLowerCase().includes('marriage')){
                        
                    }else if(firstLine.toLowerCase().includes('death')){
                        
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
                    $("#countRecord").html(newSetArray.length+" "+(newSetArray.length > 1 ? "Records":"Record")+" Found and ready to import!");

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
                    
                    html+="</tbody>"
                    +"</table>";
                    $("#showDataToImport").html(html);



                    // TODO:: Generate Import Sequence
                    console.log(arrayToImport);

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

            for(var x = 0; x < arrayToImport.length; x++){
                var splitRecord = arrayToImport[x];
                console.log(splitRecord);
                validateAllFieldsAndCreatePayloadImport(
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
            }
            console.log('emptyRowsImportConfirmation:: ', emptyRowsImportConfirmation);
            console.log('rowsWithValueImportConfirmation:: ', rowsWithValueImportConfirmation);

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

            // Close and Disable modal button
            $("#importExportButton").addClass('disabled');
            // Clear modal form before closes
            $("#showDataToImport").html('');
            $("#countRecord").html('Data To Import Will Show Below');
            $("#templateDownloadDropdown").val('');
            $("#templateDownloadDropdown").material_select();
            $("#btnDownload").addClass('disabled');
            $("#uploadFile").addClass('disabled');
            $("#btnStartImportSequence").addClass('disabled');
            $("#importExport").modal('close');
            

            // Initiate Worker
            initiateConfirmationWorker();
        });

        // will hold error records
        var errorSavingRecords = [];


        /// will validate all fields
        function validateAllFieldsAndCreatePayloadImport(
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
                firstname == null || firstname == undefined || firstname == "" &&
                middlename == null || middlename == undefined || middlename == "" &&
                lastname == null || lastname == undefined || lastname == "" &&
                confirmation_date == null || confirmation_date == undefined || confirmation_date == ""
            ){
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
        // worker will do the saving of the transaction
        function initiateConfirmationWorker(){
            if(localStorage.getItem('transactionsImportConfirmation') != null){
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
                    $("#importInProgressMessage").html('Records Imported');
                    $("#importExportButton").removeClass('disabled');
                    setTimeout(function(){
                        $("#importProgress").addClass('hide');
                    }, 3000);
                }
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
                    if(response.status == 201){
                        // removing the first object of the transaction list
                        listOfTransactions.shift();
                        // remove transactions in local Storage to replace new
                        localStorage.removeItem('transactionsImportConfirmation');
                        localStorage.setItem('transactionsImportConfirmation', JSON.stringify(listOfTransactions));
                        // update the table
                        getConfirmationList('NA');
                        // call again initiate worker after 3 seconds to create a recursive effect
                        setTimeout(function(){
                            initiateConfirmationWorker();
                        }, 1500);
                    }else if(response.status == 400){
                        errorSavingRecords.push({
                            "row": row,
                            "payload": payload,
                            "message": "Duplicated"
                        });
                    }else{
                        console.log('something is not right: '+response.status);
                    }
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