<div class="card">
    <div class="card-content">
        <div class="row">
            <div class="col s12">
                <h5 class="headerDeath">Add Death</h5>
            </div>
        </div>
        <div class="row">
            <form class="col s12" id="single_death_form" autocomplete="off">
                <div class="fix_height_form">
                    <div class="row">
                        <div class="col s12">
                            <b>Deceased name</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12 m3">
                                    <input type="hidden" value="0" id="dis_update" name="dis_update">
                                    <input type="hidden" value="0" id="did" name="did">
                                    <input id="death_firstname" type="text" class="validate" name="death_firstname">
                                    <label for="death_firstname">First Name</label>
                                </div>
                                <div class="input-field col s12 m3">
                                    <input id="death_middlename" type="text" class="validate" name="death_middlename">
                                    <label for="death_middlename">Middle Name</label>
                                </div>
                                <div class="input-field col s12 m3">
                                    <input id="death_lastname" type="text" class="validate" name="death_lastname">
                                    <label for="death_lastname">Last Name</label>
                                </div>
                                <div class="input-field col s12 m3">
                                    <input id="death_extension" type="text" class="validate" name="death_extension">
                                    <label for="death_extension">Extension</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <b>Other Info</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12 m4">
                                    <input id="death_age" type="text" class="validate" name="death_age">
                                    <label for="death_age">Age</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <input id="death_residence" type="text" class="validate" name="death_residence">
                                    <label for="death_residence">Residence of</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <input id="death_date_of_death" type="text" class="validate datepicker" name="death_date_of_death">
                                    <label for="death_date_of_death">Date of Death</label>
                                </div>
                            </div>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12 m6">
                                    <input id="death_place_of_burial" type="text" class="validate" name="death_place_of_burial">
                                    <label for="death_place_of_burial">Place of Burial</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="death_date_of_burial" type="text" class="datepicker" name="death_date_of_burial">
                                    <label for="death_date_of_burial">Date of Burial</label>
                                </div>
                            </div>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12">
                                    <input id="death_informant" type="text" class="validate" name="death_informant">
                                    <label for="death_informant">Informant or Relatives <i>(Separate names with comma if more than 1)</i></label>
                                </div>
                            </div>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12 m6">
                                    <input id="death_book_number" type="text" class="validate" name="death_book_number">
                                    <label for="death_book_number">Book Number</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="death_page_number" type="text" class="validate" name="death_page_number">
                                    <label for="death_page_number">Page Number</label>
                                </div>
                            </div>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12 m6">
                                    <input id="death_registry_number" type="text" class="validate" name="death_registry_number">
                                    <label for="death_registry_number">Registry Number</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="death_date_issued" type="text" class="validate datepicker" name="death_date_issued">
                                    <label for="death_date_issued">Date Issued</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <b>Parish Priest</b>
                            <div class="row removeBottomMargin">
                                <div class="input-field col s12">
                                    <select id="death_parish_priest" class="priest_select_dropdown">
                                    </select>
                                    <label>Select Parish Priest</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect" id="btnSaveDeath" type="submit">Save</button>
                    <button class="btn waves-effect btnCancelDeathUpdate hide">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#death_date_of_death").pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 30,
            max: new Date()
        });
        // This will prevent the date picker from closing automatically
        $('#death_date_of_death').on('mousedown',function(event){ event.preventDefault(); });

        $("#death_date_of_burial").pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 30
        });
        // This will prevent the date picker from closing automatically
        $('#death_date_of_burial').on('mousedown',function(event){ event.preventDefault(); });

        $("#death_date_issued").pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 30
        });
        // This will prevent the date picker from closing automatically
        $('#death_date_issued').on('mousedown',function(event){ event.preventDefault(); });

        // Saving Death Certificate
        $("#single_death_form").on('submit', function(e){
            e.preventDefault();
            isTokenExist();
            var AT = localStorage.getItem("AT");
            checkTokenValidity(AT);

            if(localStorage.getItem('delegatedUser') === null){
                forceLogout();
            }else{
                var dis_update = $("#dis_update").val();
                var did = $("#did").val();
                var death_firstname = $("#death_firstname").val();
                var death_middlename = $("#death_middlename").val();
                var death_lastname = $("#death_lastname").val();
                var death_extension = $("#death_extension").val();
                var death_age = $("#death_age").val();
                var death_residence = $("#death_residence").val();
                var death_date_of_death = $("#death_date_of_death").val() ? new Date($("#death_date_of_death").val()):null;
                var death_place_of_burial = $("#death_place_of_burial").val();
                var death_date_of_burial = $("#death_date_of_burial").val() ? new Date($("#death_date_of_burial").val()) : null;
                var death_informant = $("#death_informant").val();
                var death_book_number = $("#death_book_number").val();
                var death_page_number = $("#death_page_number").val();
                var death_registry_number = $("#death_registry_number").val();
                var death_date_issued = $("#death_date_issued").val() ? new Date($("#death_date_issued").val()) : null;
                var death_parish_priest = $("#death_parish_priest").val();
                var payload, metaContent;
                var delagatedId = parseInt(localStorage.getItem('delegatedUser'));
                var delegated_user = AT.substring(delagatedId+1, AT.length);

                if(death_firstname == "" || death_lastname == ""){
                    Materialize.toast('First Name and Last Name are required fields', 5000, 'red rounded');
                }else{
                    metaContent = {
                        "deceased_name":death_firstname+" "+death_middlename+" "+death_lastname+" "+death_extension,
                        "age":death_age,
                        "residence":death_residence,
                        "date_of_death":death_date_of_death == null ? '' :(death_date_of_death.getMonth()+1)+"/"+death_date_of_death.getDate()+"/"+death_date_of_death.getFullYear(),
                        "place_of_burial":death_place_of_burial,
                        "date_of_burial":death_date_of_burial == null ? '' :(death_date_of_burial.getMonth()+1)+"/"+death_date_of_burial.getDate()+"/"+death_date_of_burial.getFullYear(),
                        "informant_or_relatives":death_informant,
                        "book_number":death_book_number,
                        "page_number":death_page_number,
                        "registry_number":death_registry_number,
                        "date_issued":death_date_issued == null ? '' :(death_date_issued.getMonth()+1)+"/"+death_date_issued.getDate()+"/"+death_date_issued.getFullYear(),
                    };

                    // 0 for add
                    // 1 for update
                    if(dis_update == 0){
                        payload={
                            "firstname": death_firstname,
                            "middlename": death_middlename,
                            "lastname": death_lastname,
                            "suffix": death_extension,
                            "certificate_type": "death",
                            "priest_id": death_parish_priest == null ? 0:death_parish_priest,
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
                                    getDeathList('NA');
                                    clearDeathInputFields();
                                }else{
                                    console.log('something is not right: '+response.status);
                                    getDeathList('NA');
                                    clearDeathInputFields();
                                }
                            }, error: function(e){
                                console.log('something is not right: '+e);
                            }
                        });
                    }else{
                        payload = {
                            "id": did,
                            "firstname": death_firstname,
                            "middlename": death_middlename,
                            "lastname": death_lastname,
                            "suffix": death_extension,
                            "certificate_type": "death",
                            "priest_id": death_parish_priest == null ? 0:death_parish_priest,
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
                                    getDeathList('NA');
                                    clearDeathInputFields();
                                }else{
                                    console.log('something is not right: '+response.status);
                                    getDeathList('NA');
                                    clearDeathInputFields();
                                }
                            }, error: function(e){
                                console.log('something is not right: '+e);
                            }
                        });
                    }
                }
            }
        });

        $(".btnCancelDeathUpdate").on('click', function(e){
            e.preventDefault();
            clearDeathInputFields();
        });

        // clear field
        function clearDeathInputFields(){
            $(".btnCancelDeathUpdate").addClass('hide');

            // update Form Title
            $(".headerDeath").html('Add Death');

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
        }
    });
</script>
