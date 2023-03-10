
$(document).ready(function(){
    initiateWorker();
    // will hold the values
    var emptyRows = [];
    var rowsWithValue = [];

    // will hold error records
    var errorSavingRecords = [];


    /// will validate all fields
    function validateAllFieldsAndCreatePayload(
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
            emptyRows.push(row);
        }else{
            var payloadToCreate;
            var single_confirmation_date = new Date(confirmation_date);
            var single_confirmation_converted_month = single_confirmation_date.getMonth();
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
                "date_issued":date_issued.getMonth()+"/"+date_issued.getDate()+"/"+date_issued.getFullYear()
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
            rowsWithValue.push({
                "row": row,
                "payload": payloadToCreate,
            });
        }
    }
    // worker will do the saving of the transaction
    function initiateWorker(){
        if(localStorage.getItem('transactions') != null){
            if(localStorage.getItem('transactions') != "[]"){
                console.log('Starting saving sequence');

                // TODO:: FETCH Transactions from localStorage
                var listOfTransactions = localStorage.getItem('transactions');

                // Convert Transaction string to iterable
                var convertedListOfTranscations = JSON.parse(listOfTransactions);
                
                // Show the progress indicator
                $("#labelValidRecord").removeClass('hide');
                $("#extraSmallLoaderForSaving").removeClass('hide');
                $("#labelValidRecord").html('Saving '+convertedListOfTranscations.length+' valid records');
                
                // always get the first record
                var toSavePayload = convertedListOfTranscations[0]['payload'];
                var currentRow = convertedListOfTranscations[0]['row'];

                // create the condition to initiate a recursive command
                savingRecord(currentRow, toSavePayload, convertedListOfTranscations);
            }else{
                $("#labelValidRecord").html('Batch saved done');
                $("#labelInvalidRecord").addClass('hide');
                setTimeout(function(){
                    $("#extraSmallLoaderForSaving").addClass('hide');
                    $("#labelValidRecord").addClass('hide');
                }, 3000);
            }
        }
    }

    function savingRecord(row, payload, listOfTransactions){
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
                    localStorage.removeItem('transactions');
                    localStorage.setItem('transactions', JSON.stringify(listOfTransactions));
                    // update the table
                    getConfirmationList('NA');
                    // call again initiate worker to create a recursive effect
                    initiateWorker();
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

        // TODO: log errorSavingRecords to localStorage
    }

    $('#saveConfirmationByGroup').on('click', function(){
        isTokenExist();
        var AT = localStorage.getItem("AT");
        checkTokenValidity(AT);

        var delagatedId = parseInt(localStorage.getItem('delegatedUser'));
        var delegated_user = AT.substring(delagatedId+1, AT.length);
        
        // Validate each row of data
        for(var x = 1; x <= 10; x++){
            var confirmation_first_name = $('#confirmation_first_name_'+x).val();
            var confirmation_middle_name = $('#confirmation_middle_name_'+x).val();
            var confirmation_last_name = $('#confirmation_last_name_'+x).val();
            var confirmation_father_first_name = $('#confirmation_father_first_name_'+x).val();
            var confirmation_father_middle_name = $('#confirmation_father_middle_name_'+x).val();
            var confirmation_father_last_name = $('#confirmation_father_last_name_'+x).val();
            var confirmation_mother_first_name = $('#confirmation_mother_first_name_'+x).val();
            var confirmation_mother_middle_name = $('#confirmation_mother_middle_name_'+x).val();
            var confirmation_mother_last_name = $('#confirmation_mother_last_name_'+x).val();
            var confirmation_confirmation_date = $('#confirmation_confirmation_date_'+x).val();
            var confirmation_date_issued = $('#confirmation_date_issued_'+x).val();
            var confirmation_by = $('#confirmation_by_'+x).val();
            var confirmation_fsponsor_first_name = $('#confirmation_fsponsor_first_name_'+x).val();
            var confirmation_ssponsor_first_name = $('#confirmation_ssponsor_first_name_'+x).val();
            var confirmation_register_book = $('#confirmation_register_book_'+x).val();
            var confirmation_book_page = $('#confirmation_book_page_'+x).val();
            var confirmation_book_number = $('#confirmation_book_number_'+x).val();
            var confirmation_parish_priest = $('#confirmation_parish_priest_'+x).val();
            validateAllFieldsAndCreatePayload(
                x,
                confirmation_first_name,
                confirmation_middle_name,
                confirmation_last_name,
                confirmation_father_first_name,
                confirmation_father_middle_name,
                confirmation_father_last_name,
                confirmation_mother_first_name,
                confirmation_mother_middle_name,
                confirmation_mother_last_name,
                confirmation_confirmation_date,
                confirmation_date_issued,
                confirmation_by,
                confirmation_fsponsor_first_name,
                confirmation_ssponsor_first_name,
                confirmation_register_book,
                confirmation_book_page,
                confirmation_book_number,
                confirmation_parish_priest,
                delegated_user
            );
        }
        console.log('emptyRows:: ', emptyRows);
        console.log('rowsWithValue:: ', rowsWithValue);

        // Store rowsWithValue to localStorage
        if(rowsWithValue.length > 0){
            $("#labelInvalidRecord").removeClass('hide');
            $("#labelInvalidRecord").html(emptyRows.length+' invalid records');
            if(localStorage.getItem('transactions') === null){
                localStorage.setItem('transactions',JSON.stringify(rowsWithValue));
            }else{
                if(localStorage.getItem('transactions') == "[]"){
                    localStorage.setItem('transactions',JSON.stringify(rowsWithValue));
                }else{
                    // TODO:: Fetch the new transactions and update the transactions in localStorage
                }
            }

            // Clear Input Fields
            for(var x = 1; x <= 10; x++){
                $('#confirmation_first_name_'+x).val('');
                $('#confirmation_middle_name_'+x).val('');
                $('#confirmation_last_name_'+x).val('');
                $('#confirmation_father_first_name_'+x).val('');
                $('#confirmation_father_middle_name_'+x).val('');
                $('#confirmation_father_last_name_'+x).val('');
                $('#confirmation_mother_first_name_'+x).val('');
                $('#confirmation_mother_middle_name_'+x).val('');
                $('#confirmation_mother_last_name_'+x).val('');
                $('#confirmation_confirmation_date_'+x).val('');
                $('#confirmation_date_issued_'+x).val('');
                $('#confirmation_by_'+x).val('');
                $('#confirmation_fsponsor_first_name_'+x).val('');
                $('#confirmation_fsponsor_middle_name_'+x).val('');
                $('#confirmation_fsponsor_last_name_'+x).val('');
                $('#confirmation_ssponsor_first_name_'+x).val('');
                $('#confirmation_ssponsor_middle_name_'+x).val('');
                $('#confirmation_ssponsor_last_name_'+x).val('');
                $('#confirmation_register_book_'+x).val('');
                $('#confirmation_book_page_'+x).val('');
                $('#confirmation_book_number_'+x).val('');
                $('#confirmation_parish_priest_'+x).val('');
        }
            
            // Clear the records since this are already stored in localStorage
            emptyRows = [];
            rowsWithValue = [];
            
            // initaite Worker
            initiateWorker();
        }else{
            emptyRows = [];
            $("#labelInvalidRecord").removeClass('hide');
            $("#labelInvalidRecord").html('All rows are empty');
        }
    });
});