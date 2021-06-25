<div class="card">
    <div class="card-content">
        <div class="row">
            <div class="col s12">
                <h5 class="headerDeath">Add Death</h5>
            </div>
        </div>
        <div class="row">
            <form class="col s12" id="death_form" autocomplete="off">
                <div class="row">
                    <div class="col s12">
                        <b>Deceased name</b>
                        <div class="row removeBottomMargin">
                            <div class="input-field col s12 m4">
                                <input type="hidden" value="0" id="dis_update" name="dis_update">
                                <input type="hidden" value="0" id="did" name="did">
                                <input id="death_firstname" type="text" class="validate" name="death_firstname">
                                <label for="death_firstname">First Name</label>
                            </div>
                            <div class="input-field col s12 m4">
                                <input id="death_middlename" type="text" class="validate" name="death_middlename">
                                <label for="death_middlename">Middle Name</label>
                            </div>
                            <div class="input-field col s12 m4">
                                <input id="death_lastname" type="text" class="validate" name="death_lastname">
                                <label for="death_lastname">Last Name</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <b>Other Info</b>
                        <div class="row removeBottomMargin">
                            <div class="input-field col s12 m4">
                                <input id="death_age" type="number" class="validate" name="death_age">
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
                            <div class="input-field col s12 m4">
                                <input id="death_age" type="number" class="validate" name="death_age">
                                <label for="death_age">Place of Burial</label>
                            </div>
                            <div class="input-field col s12 m4">
                                <input id="death_residence" type="text" class="validate" name="death_residence">
                                <label for="death_residence">Date of Burial</label>
                            </div>
                            <div class="input-field col s12 m4">
                                <input id="death_date_of_death" type="text" class="validate datepicker" name="death_date_of_death">
                                <label for="death_date_of_death">Date of Death</label>
                            </div>
                        </div>
                        <div class="row removeBottomMargin">
                            <div class="input-field col s12">
                                <input id="death_date_of_death" type="text" class="validate datepicker" name="death_date_of_death">
                                <label for="death_date_of_death">Informant or Relatives <i>(Separate names with comma if more than 1)</i></label>
                            </div>
                        </div>
                        <div class="row removeBottomMargin">
                            <div class="input-field col s12 m6">
                                <input id="death_age" type="number" class="validate" name="death_age">
                                <label for="death_age">Book Number</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="death_residence" type="text" class="validate" name="death_residence">
                                <label for="death_residence">Page Number</label>
                            </div>
                        </div>
                        <div class="row removeBottomMargin">
                            <div class="input-field col s12 m6">
                                <input id="death_age" type="number" class="validate" name="death_age">
                                <label for="death_age">Registry Number</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="death_residence" type="text" class="validate" name="death_residence">
                                <label for="death_residence">Date Issued</label>
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
                <div class="row">
                    <button class="btn waves-effect" id="btnSaveDeath" type="submit">Save</button>
                    <button class="btn waves-effect btnCancelDeathUpdate hide">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>