<div class="card">
    <div class="card-content">
        <div class="row">
            <div class="col s12">
                <h5>Add Birth</h5>
            </div>
        </div>
        <div class="row">
            <form class="col s12" id="birth_form" autocomplete="off">
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
                                    <input id="birth_date" type="text" class="datepicker" name="birth_date">
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
                                    <select id="birth_parish_priest">
                                        <option value="" disabled selected>Select Parish Priest</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                        <option value="special">Add Parish Priest</option>
                                    </select>
                                    <label>Select Parish Priest</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <input class="btn btn-wave" id="btnSavePriest" type="submit" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>