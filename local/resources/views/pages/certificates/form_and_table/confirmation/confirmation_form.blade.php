<div class="card">
    <div class="card-content">
        <div class="row">
            <div class="col s12">
                <h5 class="headerConfirmation">Add Confirmation</h5>
            </div>
        </div>
        <div class="row">
            <form class="col s12" id="single_confirmation_form" autocomplete="off">
                <div class="fix_height_form">
                    <div class="row">
                        <div class="col s12">
                            <b>Record of</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12 m4">
                                    <input type="hidden" value="0" id="cis_update" name="cis_update">
                                    <input type="hidden" value="0" id="cid" name="cid">
                                    <input id="single_confirmation_firstname" type="text" class="validate" name="single_confirmation_firstname">
                                    <label for="single_confirmation_firstname">First Name</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <input id="single_confirmation_middlename" type="text" class="validate" name="single_confirmation_middlename">
                                    <label for="single_confirmation_middlename">Middle Name</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <input id="single_confirmation_lastname" type="text" class="validate" name="single_confirmation_lastname">
                                    <label for="single_confirmation_lastname">Last Name</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <b>Fathers' Name</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12 m4">
                                    <input id="single_confirmation_father_firstname" type="text" class="validate" name="single_confirmation_father_firstname">
                                    <label for="single_confirmation_father_firstname">First Name</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <input id="single_confirmation_father_middlename" type="text" class="validate" name="single_confirmation_father_middlename">
                                    <label for="single_confirmation_father_middlename">Middle Name</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <input id="single_confirmation_father_lastname" type="text" class="validate" name="single_confirmation_father_lastname">
                                    <label for="single_confirmation_father_lastname">Last Name</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <b>Mothers' Name</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12 m4">
                                    <input id="single_confirmation_mother_firstname" type="text" name="single_confirmation_mother_firstname">
                                    <label for="single_confirmation_mother_firstname">First Name</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <input id="single_confirmation_mother_middlename" type="text" name="single_confirmation_mother_middlename">
                                    <label for="single_confirmation_mother_middlename">Middle Name</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <input id="single_confirmation_mother_lastname" type="text" name="single_confirmation_mother_lastname">
                                    <label for="single_confirmation_mother_lastname">Last Name</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <b>Confirmation Date</b>
                            <div class="row removeBottomMargin">
                                <!-- Extract Date to three parts. -->
                                <div class="input-field col s12 m6">
                                    <input id="single_confirmation_date" type="text" class="datepicker" name="single_confirmation_date">
                                    <label for="single_confirmation_date">Confirmation Date</label>
                                </div>
                                
                                <div class="input-field col s12 m6">
                                    <input id="single_conrfirmation_date_issued" type="text" class="datepicker" name="single_conrfirmation_date_issued">
                                    <label for="single_conrfirmation_date_issued">Date Confirmation Issued</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <b>Confirmation by</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12">
                                    <input id="single_confirmation_by" type="text" class="validate" name="single_confirmation_by">
                                    <label for="single_confirmation_by">Confirmation by</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <b>Sponsors</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12 m6">
                                    <input id="single_confirmation_fsponsor_firstname" type="text" name="single_confirmation_fsponsor_firstname">
                                    <label for="single_confirmation_fsponsor_firstname">First Sponsor Name</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="single_confirmation_ssponsor_firstname" type="text" name="single_confirmation_ssponsor_firstname">
                                    <label for="single_confirmation_ssponsor_firstname">Second Sponsor Name</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <b>Registration Book Detail</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12 m4">
                                    <input id="single_confirmation_register_book" type="text" name="single_confirmation_register_book">
                                    <label for="single_confirmation_register_book">Register Book</label>
                                </div>

                                <div class="input-field col s12 m4">
                                    <input id="single_confirmation_book_page" type="text" name="single_confirmation_book_page">
                                    <label for="single_confirmation_book_page">Book Page</label>
                                </div>

                                <div class="input-field col s12 m4">
                                    <input id="single_confirmation_book_number" type="text" name="single_confirmation_book_number">
                                    <label for="single_confirmation_book_number">Number</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <b>Parish Priest</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12">
                                    <select id="single_confirmation_parish_priest" class="priest_select_dropdown">
                                        <option value="" disabled selected>Select Parish Priest</option>
                                        <option value="special">Add Parish Priest</option>
                                    </select>
                                    <label>Select Parish Priest</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect" id="btnSaveConfirmationForm" type="submit">Save</button>
                    <button class="btn waves-effect btnCancelConfirmationUpdate hide">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('document').ready(function(){
        // Calendars
        $("#single_confirmation_date").pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 30,
        });
        $("#single_confirmation_date").on('mousedown',function(event){ event.preventDefault(); });
        $("#single_conrfirmation_date_issued").pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 30,
        });
        $("#single_conrfirmation_date_issued").on('mousedown',function(event){ event.preventDefault(); });
        

        // Adding or updating record
        $("#single_confirmation_form").on('submit', function(e){
            e.preventDefault();
            isTokenExist();
            var AT = localStorage.getItem("AT");
            checkTokenValidity(AT);

            if(localStorage.getItem('delegatedUser') === null){
                forceLogout();
            }else{
                var cis_update = $('#cis_update').val();
                var cid = $('#cid').val();
                var single_confirmation_firstname = $('#single_confirmation_firstname').val();
                var single_confirmation_middlename = $('#single_confirmation_middlename').val();
                var single_confirmation_lastname = $('#single_confirmation_lastname').val();
                
                var single_confirmation_father_firstname = $('#single_confirmation_father_firstname').val();
                var single_confirmation_father_middlename = $('#single_confirmation_father_middlename').val();
                var single_confirmation_father_lastname = $('#single_confirmation_father_lastname').val();

                var single_confirmation_mother_firstname = $('#single_confirmation_mother_firstname').val();
                var single_confirmation_mother_middlename = $('#single_confirmation_mother_middlename').val();
                var single_confirmation_mother_lastname = $('#single_confirmation_mother_lastname').val();
                var single_confirmation_date = new Date($('#single_confirmation_date').val());
                var single_confirmation_converted_month = single_confirmation_date.getMonth() + 1;
                console.log('single_confirmation_converted_month',single_confirmation_converted_month);
                var single_confirmation_converted_date = single_confirmation_date.getDate();
                var single_confirmation_converted_year = single_confirmation_date.getFullYear();

                var single_confirmation_by = $("#single_confirmation_by").val();
                var date_issued_to_save = new Date($('#single_conrfirmation_date_issued').val());
                var single_conrfirmation_date_issued = (date_issued_to_save.getMonth()+1)+"/"+date_issued_to_save.getDate()+"/"+date_issued_to_save.getFullYear();

                var single_confirmation_fsponsor_firstname = $('#single_confirmation_fsponsor_firstname').val();

                var single_confirmation_ssponsor_firstname = $("#single_confirmation_ssponsor_firstname").val();

                var single_confirmation_register_book = $('#single_confirmation_register_book').val();
                var single_confirmation_book_page = $('#single_confirmation_book_page').val();
                var single_confirmation_book_number = $('#single_confirmation_book_number').val();
                var single_confirmation_parish_priest = $('#single_confirmation_parish_priest').val();
                var payload, metaContent;
                var delagatedId = parseInt(localStorage.getItem('delegatedUser'));
                var delegated_user = AT.substring(delagatedId+1, AT.length);

                metaContent = {
                    "father_firstname": single_confirmation_father_firstname,
                    "father_middlename": single_confirmation_father_middlename,
                    "father_lastname": single_confirmation_father_lastname,
                    "mother_firstname": single_confirmation_mother_firstname,
                    "mother_middlename": single_confirmation_mother_middlename,
                    "mother_lastname": single_confirmation_mother_lastname,
                    "confirmation_day":single_confirmation_converted_date,
                    "confirmation_month":single_confirmation_converted_month,
                    "confirmation_year":single_confirmation_converted_year,
                    "confirmation_by":single_confirmation_by,
                    "first_sponsor":single_confirmation_fsponsor_firstname,
                    "second_sponsor":single_confirmation_ssponsor_firstname,
                    "registration_book":single_confirmation_register_book,
                    "book_page":single_confirmation_book_page,
                    "book_number":single_confirmation_book_number,
                    "date_issued":single_conrfirmation_date_issued
                };
                // 0 for add
                // 1 for update
                
                $("#btnSaveConfirmationForm").prop('disabled', true);
                if(cis_update == 0){                    
                    payload = {
                        "firstname": single_confirmation_firstname,
                        "middlename": single_confirmation_middlename,
                        "lastname": single_confirmation_lastname,
                        "certificate_type": "confirmation",
                        "priest_id": single_confirmation_parish_priest == null ? 0:single_confirmation_parish_priest,
                        "meta": JSON.stringify(metaContent),
                        "created_by": delegated_user,
                    };
                    $.ajax({
                        type: "POST",
                        url: certificate_endpoint,
                        data: JSON.stringify(payload),
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        success: function(response){
                            if(response.status >= 200 && response.status < 400){
                                Materialize.toast('Added', 5000, 'green rounded');
                                getConfirmationList('NA');
                                clearConfirmationInputFields();
                            }else{
                                Materialize.toast('Something Went Wrong:: '+response.message, 5000, 'red rounded');
                                console.log('["Confirmation Status"]: '+response.status);
                            }
                            $("#btnSaveConfirmationForm").removeAttr('disabled');
                        }, error: function(e){
                            Materialize.toast('Something Went Wrong:: '+e.responseJSON.message, 5000, 'red rounded');
                            console.log('["Confirmation Error"]: '+e.responseJSON.message);
                            
                            $("#btnSaveConfirmationForm").removeAttr('disabled');
                        }
                    });
                }else{
                    payload = {
                        "id": cid,
                        "firstname": single_confirmation_firstname,
                        "middlename": single_confirmation_middlename,
                        "lastname": single_confirmation_lastname,
                        "certificate_type": "confirmation",
                        "priest_id": single_confirmation_parish_priest == null ? 0:single_confirmation_parish_priest,
                        "meta": JSON.stringify(metaContent),
                        "created_by": delegated_user,
                    };
                    $.ajax({
                        type: "PUT",
                        url: certificate_endpoint+"/"+cid,
                        data: payload,
                        success: function(response){
                            if(response.status >= 200 && response.status < 400){
                                Materialize.toast('Updated', 5000, 'green rounded');
                                clearConfirmationInputFields();
                                getConfirmationList('NA');
                            }else{
                                Materialize.toast('Something Went Wrong:: '+response.message, 5000, 'red rounded');
                                console.log('["Confirmation Status"]: '+response.status);
                            }
                            $("#btnSaveConfirmationForm").removeAttr('disabled');
                        }, error: function(e){
                            Materialize.toast('Something Went Wrong:: '+e.responseJSON.message, 5000, 'red rounded');
                            console.log('["Confirmation Error"]: '+e.responseJSON.message);
                            
                            $("#btnSaveConfirmationForm").removeAttr('disabled');
                        }
                    });
                }
            }
        });

        // CancelC Confirmation Update
        $(".btnCancelConfirmationUpdate").on('click', function(e){
            e.preventDefault();
            clearConfirmationInputFields();
        });

        // clear field
        function clearConfirmationInputFields(){
            $(".btnCancelConfirmationUpdate").addClass('hide');
            
            // update Form Title
            $(".headerConfirmation").html('Add Confirmation');

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
        }
    });
</script>