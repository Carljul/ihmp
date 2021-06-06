<div class="card">
    <div class="card-content">
        <div class="row">
            <div class="col s12">
                <h5>Add Death</h5>
            </div>
        </div>
        <div class="row">
            <form class="col s12" id="priest_form" autocomplete="off">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="hidden" value="0" id="is_deleted" name="is_deleted">
                        <input type="hidden" value="0" id="is_update" name="is_update">
                        <input type="hidden" value="0" id="pid" name="pid">
                        <input id="prefix" type="text" class="validate" name="prefix">
                        <label for="prefix">Clergy Title</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="firstname" type="text" class="validate" name="firstname">
                        <label for="firstname">First Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="middlename" type="text" class="validate" name="middlename">
                        <label for="middlename">Middle Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="lastname" type="text" class="validate" name="lastname">
                        <label for="lastname">Last Name</label>
                    </div>
                </div>
                <div class="row">
                    <input class="btn btn-wave" id="btnSavePriest" type="submit" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>