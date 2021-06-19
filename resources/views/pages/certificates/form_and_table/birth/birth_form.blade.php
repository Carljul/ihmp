<div class="card">
    <div class="card-content">
        <div class="row">
            <div class="col s12">
                <h5 class="headerBirth">Add Birth</h5>
            </div>
        </div>
        <div class="row">
            <form class="col s12" id="single_birth_form" autocomplete="off">
                <div class="fix_height_form">
                    <div class="row">
                        <div class="col s12">
                            <b>Record of</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12 m4">
                                    <input type="hidden" value="0" id="bis_update" name="bis_update">
                                    <input type="hidden" value="0" id="bid" name="bid">
                                    <input id="birth_firstname" type="text" class="validate" name="birth_firstname">
                                    <label for="birth_firstname">First Name</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <input id="birth_middlename" type="text" class="validate" name="birth_middlename">
                                    <label for="birth_middlename">Middle Name</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <input id="birth_lastname" type="text" class="validate" name="birth_lastname">
                                    <label for="birth_lastname">Last Name</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <b>Born Detail</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12 m3">
                                    <input id="birth_date" type="text" class="" name="birth_date">
                                    <label for="birth_date">Born On</label>
                                </div>
                                <div class="input-field col s12 m9">
                                    <input id="birth_location" type="text" class="validate" name="birth_location">
                                    <label for="birth_location">Born in</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <b>Fathers' Name</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12 m4">
                                    <input id="birth_father_firstname" type="text" class="validate" name="birth_father_firstname">
                                    <label for="birth_father_firstname">First Name</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <input id="birth_father_middlename" type="text" class="validate" name="birth_father_middlename">
                                    <label for="birth_father_middlename">Middle Name</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <input id="birth_father_lastname" type="text" class="validate" name="birth_father_lastname">
                                    <label for="birth_father_lastname">Last Name</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <b>Mothers' Name</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12 m4">
                                    <input id="birth_mother_firstname" type="text" class="validate" name="birth_mother_firstname">
                                    <label for="birth_mother_firstname">First Name</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <input id="birth_mother_middlename" type="text" class="validate" name="birth_mother_middlename">
                                    <label for="birth_mother_middlename">Middle Name</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <input id="birth_mother_lastname" type="text" class="validate" name="birth_mother_lastname">
                                    <label for="birth_mother_lastname">Last Name</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <b>Address</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12">
                                    <input id="birth_address" type="text" class="validate" name="birth_address">
                                    <label for="birth_address">Resident of</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <b>Minister</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12">
                                    <input id="birth_minister" type="text" class="validate" name="birth_minister">
                                    <label for="birth_minister">Minister</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <b>Godparents</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12">
                                    <input id="birth_godparents" type="text" class="validate" name="birth_godparents">
                                    <label for="birth_godparents">Godparents <i>(Please separate with comma if record is more than 1)</i></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <b>Other Details</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12 m3">
                                    <input id="birth_baptismal_register" type="text" class="validate" name="birth_baptismal_register">
                                    <label for="birth_baptismal_register">Baptismal Register</label>
                                </div>
                                <div class="input-field col s12 m3">
                                    <input id="birth_volume" type="text" class="validate" name="birth_volume">
                                    <label for="birth_volume">Volume</label>
                                </div>
                                <div class="input-field col s12 m3">
                                    <input id="birth_page" type="text" class="validate" name="birth_page">
                                    <label for="birth_page">Page</label>
                                </div>
                                <div class="input-field col s12 m3">
                                    <input id="birth_date_issue" type="text" class="datepicker" name="birth_date_issue">
                                    <label for="birth_date_issue">Date Issue</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <b>Parish Priest</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12">
                                    <select id="birth_parish_priest" class="priest_select_dropdown">
                                    </select>
                                    <label>Select Parish Priest</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect" id="btnSaveBirthForm" type="submit">Save</button>
                    <button class="btn waves-effect btnCancelBirthUpdate hide">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#birth_date").pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 30, 
            max: new Date()
        });
        $('#birth_date').on('mousedown',function(event){ event.preventDefault(); });
        $("#single_birth_form").on('submit', function(e){
            e.preventDefault();
            isTokenExist();
            var AT = localStorage.getItem("AT");
            checkTokenValidity(AT);

            if(localStorage.getItem('delegatedUser') === null){
                forceLogout();
            }else{
                var bis_update = $('#bis_update').val();
                var bid = $('#bid').val();
                var birth_firstname = $('#birth_firstname').val();
                var birth_middlename = $('#birth_middlename').val();
                var birth_lastname = $('#birth_lastname').val();
                var birth_date = $('#birth_date').val();
                var birth_location = $('#birth_location').val();
                var birth_father_firstname = $('#birth_father_firstname').val();
                var birth_father_middlename = $('#birth_father_middlename').val();
                var birth_father_lastname = $('#birth_father_lastname').val();
                var birth_mother_firstname = $('#birth_mother_firstname').val();
                var birth_mother_middlename = $('#birth_mother_middlename').val();
                var birth_mother_lastname = $('#birth_mother_lastname').val();
                var birth_address = $('#birth_address').val();
                var birth_minister = $("#birth_minister").val();
                var birth_godparents = $('#birth_godparents').val();
                var birth_baptismal_register = $('#birth_baptismal_register').val();
                var birth_volume = $('#birth_volume').val();
                var birth_page = $('#birth_page').val();
                var birth_date_issue = $('#birth_date_issue').val();
                var birth_parish_priest = $("#birth_parish_priest").val();
                var payload, metaContent;
                var delagatedId = parseInt(localStorage.getItem('delegatedUser'));
                var delegated_user = AT.charAt(delagatedId+1);
                // 0 for add
                // 1 for update
                if(bis_update == 0){
                    metaContent = {
                        "born_on": birth_location,
                        "born_in": birth_date,
                        "father_firstname": birth_father_firstname,
                        "father_middlename": birth_father_middlename,
                        "father_lastname": birth_father_lastname,
                        "mother_firstname": birth_mother_firstname,
                        "mother_middlename": birth_mother_middlename,
                        "mother_lastname": birth_mother_lastname,
                        "resident_of": birth_address,
                        "baptism_date": birth_date_issue,
                        "baptism_minister": birth_minister,
                        "godparents": birth_godparents,
                        "baptismal_register": birth_baptismal_register,
                        "volume": birth_volume,
                        "page": birth_page,
                        "date_issued": birth_date_issue,
                    };

                    payload = {
                        "firstname": birth_firstname,
                        "middlename": birth_middlename,
                        "lastname": birth_lastname,
                        "certificate_type": "baptism",
                        "priest_id": birth_parish_priest,
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
                            if(response.status == 201){
                                getBirthList('NA');
                                clearBirthInputFields();
                            }else{
                                console.log('something is not right: '+response.status);
                            }
                        }, error: function(e){
                            console.log('something is not right: '+e);
                        }
                    });
                }else{
                    metaContent = {

                    };

                    payload = {

                    };
                }
            }
        });

        // clear field
        function clearBirthInputFields(){
            $('#single_birth_form').find('input:text, input:password, select')
            .each(function () {
                $(this).val('');
            });
            $('#single_birth_form').find('label')
            .each(function () {
                $(this).removeClass('active');
            });
        }
    });
</script>