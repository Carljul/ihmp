<div class="card">
    <div class="card-content">
        <div class="row">
            <div class="col s12">
                <h5 class="headerMarriage">Add Marriage</h5>
            </div>
        </div>
        <div class="row">
            <form class="col s12" id="single_marriage_form" autocomplete="off">
                <div class="fix_height_form">
                    <div class="row">
                        <div class="col s12 m6">
                            <b>Husbands Info</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12">
                                    <input type="hidden" value="0" id="mis_update" name="mis_update">
                                    <input type="hidden" value="0" id="mid" name="mid">
                                    <input id="husband_firstname" type="text" class="validate" name="husband_firstname">
                                    <label for="husband_firstname">First Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="husband_middlename" type="text" class="validate" name="husband_middlename">
                                    <label for="husband_middlename">Middle Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="husband_lastname" type="text" class="validate" name="husband_lastname">
                                    <label for="husband_lastname">Last Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <select id="husband_civil_status" class="">
                                        <option value="" disabled selected>Select Civil Status</option>
                                        <option value="Single">Single</option>
                                        <!-- <option value="Married">Married</option> -->
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>
                                    <label>Civil Status</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="husband_birth_date" type="text" class="datepicker" name="husband_birth_date">
                                    <label for="husband_birth_date">Birth Date</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="husband_baptism_date" type="text" class="datepicker" name="husband_baptism_date">
                                    <label for="husband_baptism_date">Baptism Date</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="husband_birth_place" type="text" class="validate" name="husband_birth_place">
                                    <label for="husband_birth_place">Birth Place</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="husband_residence" type="text" class="validate" name="husband_residence">
                                    <label for="husband_residence">Residence of</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="husband_fathers_name" type="text" class="validate" name="husband_fathers_name">
                                    <label for="husband_fathers_name">Father's Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="husband_mothers_name" type="text" class="validate" name="husband_mothers_name">
                                    <label for="husband_mothers_name">Mother's Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="husband_first_witness" type="text" class="validate" name="husband_first_witness">
                                    <label for="husband_first_witness">First Witness</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="husband_second_witness" type="text" class="validate" name="husband_second_witness">
                                    <label for="husband_second_witness">Second Witness</label>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <b>Wifes Info</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12">
                                    <input id="wife_firstname" type="text" class="validate" name="wife_firstname">
                                    <label for="wife_firstname">First Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="wife_middlename" type="text" class="validate" name="wife_middlename">
                                    <label for="wife_middlename">Middle Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="wife_lastname" type="text" class="validate" name="wife_lastname">
                                    <label for="wife_lastname">Last Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <select id="wife_civil_status" class="">
                                        <option value="" disabled selected>Select Civil Status</option>
                                        <option value="Single">Single</option>
                                        <!-- <option value="Married">Married</option> -->
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>
                                    <label>Civil Status</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="wife_birth_date" type="text" class="datepicker" name="wife_birth_date">
                                    <label for="wife_birth_date">Birth Date</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="wife_baptism_date" type="text" class="datepicker" name="wife_baptism_date">
                                    <label for="wife_baptism_date">Baptism Date</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="wife_birth_place" type="text" class="validate" name="wife_birth_place">
                                    <label for="wife_birth_place">Birth Place</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="wife_residence" type="text" class="validate" name="wife_residence">
                                    <label for="wife_residence">Residence of</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="wife_fathers_name" type="text" class="validate" name="wife_fathers_name">
                                    <label for="wife_fathers_name">Father's Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="wife_mothers_name" type="text" class="validate" name="wife_mothers_name">
                                    <label for="wife_mothers_name">Mother's Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="wife_first_witness" type="text" class="validate" name="wife_first_witness">
                                    <label for="wife_first_witness">First Witness</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="wife_second_witness" type="text" class="validate" name="wife_second_witness">
                                    <label for="wife_second_witness">Second Witness</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <b>Marriage Details</b>
                            <div class="row removeBottomMargin">
                                <div class="col s12 m4">
                                    <div class="input-field col s12">
                                        <input id="marraige_place" type="text" class="validate" name="marraige_place">
                                        <label for="marraige_place">Place of Marriage</label>
                                    </div>
                                </div>
                                <div class="col s12 m4">
                                    <div class="input-field col s12">
                                        <input id="marriage_date" type="text" class="datepicker" name="marriage_date">
                                        <label for="marriage_date">Date of Marriage</label>
                                    </div>
                                </div>
                                <div class="col s12 m4">
                                    <div class="input-field col s12">
                                        <input id="marraige_solemnized_by" type="text" class="validate" name="marraige_solemnized_by">
                                        <label for="marraige_solemnized_by">Solemnized By</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <b>Other Details</b>
                            <div class="row removeBottomMargin">
                                <div class="col s12 m3">
                                    <div class="input-field col s12">
                                        <input id="marriage_no" type="text" class="validate" name="marriage_no">
                                        <label for="marriage_no">Mariages No.</label>
                                    </div>
                                </div>
                                <div class="col s12 m3">
                                    <div class="input-field col s12">
                                        <input id="marriage_page" type="text" class="validate" name="marriage_page">
                                        <label for="marriage_page">Page</label>
                                    </div>
                                </div>
                                <div class="col s12 m3">
                                    <div class="input-field col s12">
                                        <input id="marriage_line" type="text" class="validate" name="marriage_line">
                                        <label for="marriage_line">Line</label>
                                    </div>
                                </div>
                                <div class="col s12 m3">
                                    <div class="input-field col s12">
                                        <input id="marriage_date_issued" type="text" class="datepicker" name="marriage_date_issued">
                                        <label for="marriage_date_issued">Date Issued</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <b>Parish Priest</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12">
                                    <select id="marriage_parish_priest" class="priest_select_dropdown">
                                    </select>
                                    <label>Select Parish Priest</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect" id="btnSaveMarriage" type="submit">Save</button>
                    <button class="btn waves-effect btnCancelMarriageUpdate hide">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#husband_birth_date").pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 30, 
            max: new Date()
        });
        // This will prevent the date picker from closing automatically
        $('#husband_birth_date').on('mousedown',function(event){ event.preventDefault(); });

        $("#wife_birth_date").pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 30, 
            max: new Date()
        });
        // This will prevent the date picker from closing automatically
        $('#wife_birth_date').on('mousedown',function(event){ event.preventDefault(); });

        
        $("#husband_baptism_date").pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 30, 
            max: new Date()
        });
        // This will prevent the date picker from closing automatically
        $('#husband_baptism_date').on('mousedown',function(event){ event.preventDefault(); });

        $("#wife_baptism_date").pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 30, 
            max: new Date()
        });
        
        // This will prevent the date picker from closing automatically
        $('#wife_baptism_date').on('mousedown',function(event){ event.preventDefault(); });

        $("#marriage_date").pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 30,
        });
        
        // This will prevent the date picker from closing automatically
        $('#marriage_date').on('mousedown',function(event){ event.preventDefault(); });

        $("#marriage_date_issued").pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 30
        });
        
        // This will prevent the date picker from closing automatically
        $('#marriage_date_issued').on('mousedown',function(event){ event.preventDefault(); });


        // Set Dropdown
        $("#husband_civil_status").material_select();
        $("#wife_civil_status").material_select();

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


        // Saving Death Certificate
        $("#single_marriage_form").on('submit', function(e){
            e.preventDefault();
            isTokenExist();
            var AT = localStorage.getItem("AT");
            checkTokenValidity(AT);

            if(localStorage.getItem('delegatedUser') === null){
                forceLogout();
            }else{
                var mis_update = $("#mis_update").val();
                var mid = $("#mid").val();
                var husband_firstname = $("#husband_firstname").val();
                var husband_middlename = $("#husband_middlename").val();
                var husband_lastname = $("#husband_lastname").val();
                var husband_civil_status = $("#husband_civil_status").val();
                var husband_birth_date = new Date($("#husband_birth_date").val());
                var husband_age = getAge(husband_birth_date);
                var husband_baptism_date = new Date($("#husband_baptism_date").val());
                var husband_birth_place = $("#husband_birth_place").val();
                var husband_residence = $("#husband_residence").val();
                var husband_fathers_name = $("#husband_fathers_name").val();
                var husband_mothers_name = $("#husband_mothers_name").val();
                var husband_first_witness = $("#husband_first_witness").val();
                var husband_second_witness = $("#husband_second_witness").val();

                var wife_firstname = $("#wife_firstname").val();
                var wife_middlename = $("#wife_middlename").val();
                var wife_lastname = $("#wife_lastname").val();
                var wife_civil_status = $("#wife_civil_status").val();
                var wife_birth_date = new Date($("#wife_birth_date").val());
                var wife_age = getAge(wife_birth_date);
                var wife_baptism_date = new Date($("#wife_baptism_date").val());
                var wife_birth_place = $("#wife_birth_place").val();
                var wife_residence = $("#wife_residence").val();
                var wife_fathers_name = $("#wife_fathers_name").val();
                var wife_mothers_name = $("#wife_mothers_name").val();
                var wife_first_witness = $("#wife_first_witness").val();
                var wife_second_witness = $("#wife_second_witness").val();

                var marraige_place = $("#marraige_place").val();
                var marriage_no = $("#marriage_no").val();
                var marriage_page = $("#marriage_page").val();
                var marriage_line = $("#marriage_line").val();
                var marriage_date = new Date($("#marriage_date").val());
                var marriage_line = $("#marriage_line").val();
                var marraige_solemnized_by = $("#marraige_solemnized_by").val();


                var marriage_date_issued = new Date($("#marriage_date_issued").val());
                var marriage_parish_priest = $("#marriage_parish_priest").val();
                var payload, metaContent;
                var delagatedId = parseInt(localStorage.getItem('delegatedUser'));
                var delegated_user = AT.substring(delagatedId+1, AT.length);

                if(husband_age < age_limit){
                    Materialize.toast('Can\'t Save Record: Husband\'s age is too young', 5000, 'red rounded');
                } else if(wife_age < age_limit){
                    Materialize.toast('Can\'t Save Record: Wife\'s age is too young', 5000, 'red rounded');
                } else {
                    metaContent = {
                        "husband_firstname":husband_firstname,
                        "husband_middlename":husband_middlename,
                        "husband_lastname":husband_lastname,
                        "husband_age":husband_age,
                        "husband_civil_status":husband_civil_status,
                        "husband_birthdate":(husband_birth_date.getMonth()+1)+"/"+husband_birth_date.getDate()+"/"+husband_birth_date.getFullYear(),
                        "husband_birthplace":husband_birth_place,
                        "husband_residence":husband_residence,
                        "husband_baptismdate":(husband_baptism_date.getMonth()+1)+"/"+husband_baptism_date.getDate()+"/"+husband_baptism_date.getFullYear(),
                        "husband_fathersname":husband_fathers_name,
                        "husband_mothersname":husband_mothers_name,
                        "husband_firstwitness":husband_first_witness,
                        "husband_secondwitness":husband_second_witness,
                        "wife_firstname":wife_firstname,
                        "wife_middlename":wife_middlename,
                        "wife_lastname":wife_lastname,
                        "wife_age":wife_age,
                        "wife_civil_status":wife_civil_status,
                        "wife_birthdate":(wife_birth_date.getMonth()+1)+"/"+wife_birth_date.getDate()+"/"+wife_birth_date.getFullYear(),
                        "wife_birthplace":wife_birth_place,
                        "wife_residence":wife_residence,
                        "wife_baptismdate":(wife_baptism_date.getMonth()+1)+"/"+wife_baptism_date.getDate()+"/"+wife_baptism_date.getFullYear(),
                        "wife_fathersname":wife_fathers_name,
                        "wife_mothersname":wife_mothers_name,
                        "wife_firstwitness":wife_first_witness,
                        "wife_secondwitness":wife_second_witness,
                        "marriage_place":marraige_place,
                        "wife_baptismdate":(wife_baptism_date.getMonth()+1)+"/"+wife_baptism_date.getDate()+"/"+wife_baptism_date.getFullYear(),
                        "marriage_date":(marriage_date.getMonth()+1)+"/"+marriage_date.getDate()+"/"+marriage_date.getFullYear(),
                        "solemnized_by":marraige_solemnized_by,
                        "marriage_number":marriage_no,
                        "marriage_page":marriage_page,
                        "marriage_line":marriage_line,
                        "marriage_day":marriage_date_issued.getDate(),
                        "marriage_month":marriage_date_issued.getMonth()+1,
                        "marriage_year":marriage_date_issued.getFullYear(),
                    };
                    
                    // 0 for add
                    // 1 for update
                    if(mis_update == 0){
                        payload={
                            "firstname": husband_firstname,
                            "middlename": husband_middlename,
                            "lastname": husband_lastname,
                            "certificate_type": "marriage",
                            "priest_id": marriage_parish_priest == null ? 0:marriage_parish_priest,
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
                                    getMarriageList('NA');
                                    clearMarriageInputFields();
                                }else{
                                    console.log('something is not right: '+response.status);
                                    getMarriageList('NA');
                                    clearMarriageInputFields();
                                }
                            }, error: function(e){
                                console.log('something is not right: '+e);
                            }
                        });
                    }else{
                        payload = {
                            "id": mid,
                            "firstname": husband_firstname,
                            "middlename": husband_middlename,
                            "lastname": husband_lastname,
                            "certificate_type": "marriage",
                            "priest_id": marriage_parish_priest == null ? 0:marriage_parish_priest,
                            "meta": JSON.stringify(metaContent),
                            "created_by": delegated_user,
                        };

                        $.ajax({
                            type: "PUT",
                            url: certificate_endpoint+"/"+did,
                            data: JSON.stringify(payload),
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success: function(response){
                                if(response.status == 200){
                                    getMarriageList('NA');
                                    clearMarriageInputFields();
                                }else{
                                    console.log('something is not right: '+response.status);
                                    getMarriageList('NA');
                                    clearMarriageInputFields();
                                }
                            }, error: function(e){
                                console.log('something is not right: '+e);
                            }
                        });
                    }
                }
            }
        });

        $(".btnCancelMarriageUpdate").on('click', function(e){
            e.preventDefault();
            clearMarriageInputFields();
        });

        // clear field
        function clearMarriageInputFields(){
            $(".btnCancelMarriageUpdate").addClass('hide');
            
            // update Form Title
            $(".headerMarriage").html('Add Marriage');

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
            $('#husband_civil_status').material_select();
            $('#wife_civil_status').material_select();
        }
    });
</script>