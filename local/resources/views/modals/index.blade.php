<!-- Modal Structure -->
<div id="modalSysError" class="modal small-modal">
    <div class="modal-content center system-error-modal-height">
        <div class="errorProgressIndicator hide">
            <div class="system-error-loader">
                <div class="preloader-wrapper big active">
                    <div class="spinner-layer spinner-blue-only">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="system-error-message">
                <h5>Preparing Screens</h5>
            </div>
        </div>
        <div class="errMessage">
            <i class="material-icons medium">bug_report</i>
            <h5>Hmmm! Something is not right</h5>
            <p>
                It seems we hit a snag.
                <br>
                Please click refresh and do the previous activity you did.
                <br>
                If issue persists, please contact your Software Developer
            </p>

            <button class="waves-effect waves-green btn btn-block" id="btnRefresh">Refresh</button>
        </div>
        <div class="customMessage hide">

        </div>
    </div>
</div>

<!-- Delete Confirmation ModalW -->
<div id="deleteConfirmationModal" class="modal small-modal">
    <div class="modal-content center errorProgressIndicator">
        <h4>Are you sure you want to delete <span id="recordToDelete"></span>?</h4>
        <div id="buttonConfirmation">

        </div>
    </div>
</div>


<!-- Import Export -->
<div id="importExport" class="modal modal-fixed-footer" style="width: 80%;">
    <div class="modal-content">
        <h4>Import Your CSV File Here</h4>
        <p>Follow the Steps</p>
        <div class="row">
            <div class="col s12">
                <div class="input-field col s3">
                    <b>1. </b>Select the type of record<br>
                    <select class="templateDownloadDropdown" id="templateDownloadDropdown">
                        <option value="" disabled selected>Select template</option>
                        <option value="marriage">Marriage</option>
                        <option value="confirmation">Confirmation</option>
                        <option value="birth">Birth</option>
                        <option value="death">Death</option>
                    </select>
                    <label>Select record</label>
                </div>
                <div class="col s3">
                    <b>2. </b>Download your template. (You can skip this step if you already downloaded this file before)
                    <a href="!#" class="btn waves-effect disabled" id="btnDownload" download>Download</a>
                </div>
                <div class="col s3">
                    <b>3. </b>Select your template and upload
                    <form enctype='multipart/form-data' method='post'>

                        <label>Upload CSV file Here</label>

                        <div class="file-field input-field">
                            <div class="btn disabled" id="uploadFile">
                                <span>Upload CSV</span>
                                <input size='50' type='file' name='filename' id="importCSV">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" style="visibility: hidden;">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col s3">
                    <b>4. </b>Final Step, Click Import button to start import sequence
                    <button class="waves-effect waves-green btn disabled" id="btnStartImportSequence">Import</button>
                </div>
            </div>
        </div>
        <div class="row removeBottomMargin">
            <div class="col s12 center">
                <smal id="countRecord">Data To Import Will Show Below</small>
            </div>
            <hr>
        </div>
        <div class="row center" id="showDataToImport" style="overflow-x: scroll;">
        </div>

    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>

<!-- Filter -->
<div id="filterTable" class="modal modal_large">
    <div class="modal-content">
        <h4>You can apply following filters</h4>
        <div class="row">
            <div class="col s3">
                <select id="selectFilterCertificateType" style="padding-top: 15px;">
                    <option value="" disabled>Choose Record</option>
                    <option value="baptism">Birth Record</option>
                    <option value="confirmation" selected>Confirmation Record</option>
                    <option value="death">Death Record</option>
                    <option value="marriage">Marriage Record</option>
                </select>
                <label>Choose Record</label>
            </div>
            <div class="col s3">
                <div class="input-field">
                    <input id="filter_date_from" type="text" class="datepicker" name="filter_date_from">
                    <label for="filter_date_from">Date From</label>
                </div>
            </div>
            <div class="col s3">
                <div class="input-field">
                    <input id="filter_date_to" type="text" class="datepicker" name="filter_date_to">
                    <label for="filter_date_to">Date To</label>
                </div>
            </div>
            <div class="col s3">
                <a href="#!" class="btn waves-effect waves-light green full_width_button" id="btnCertificateFilter">Create Filter</a>
            </div>
            <div class="col s12">
                <a href="#!" class="btn waves-effect waves-light blue full_width_button" id="btnCertificatePrint">Print</a>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m12">
                <div class="row">
                    <div id="printDiv">
                        <!-- Confirmation Certificate -->
                        <div class="col s12 fix_height_table sampleClass" style="display: none;" id="confirmationListFilterTableDIV">
                            <table class="confirmation_group_table striped bordered">
                                <thead>
                                    <tr>
                                        <th colspan="3">Record of</th>
                                        <th>Confirmation Date</th>
                                        <th>Date Issued</th>
                                        <th colspan="3">Fathers' Name</th>
                                        <th colspan="3">Mothers' Name</th>
                                        <!-- <th>First Sponsor</th>
                                        <th>Second Sponsor</th> -->
                                        <th>Confirmation by</th>
                                        <th colspan="3">Registration Book Detail</th>
                                        <!-- <th>Priest</th> -->
                                    </tr>
                                </thead>
                                <tbody id="confirmationListFilterTable">
                                    <!-- Keep it empty -->
                                    <tr>
                                        <td colspan="21">No Records Yet</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Marriage Certificate -->
                        <div class="col s12 fix_height_table" style="display: none;" id="marriageListFilterTableDIV">
                            <table class="marriage_group_table striped">
                                <thead>
                                    <tr>
                                        <th colspan="8">Husbands Info</th>
                                        <th colspan="8">Wifes Info</th>
                                        <th colspan="3">Marriage Details</th>
                                        <th colspan="4">Other Details</th>
                                        <!-- <th>Priest</th> -->
                                    </tr>
                                </thead>
                                <tbody id="marriageListFilterTable">
                                    <!-- Keep it empty -->
                                    <tr>
                                        <td colspan="37">No Records Yet</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Birth Certificate -->
                        <div class="col s12 fix_height_table" style="display: none;" id="birthListFilterTableDIV">
                            <table class="birth_group_table striped">
                                <thead>
                                    <tr>
                                        <th>Born On</th>
                                        <th colspan="3">Record of</th>
                                        <th>Born In</th>
                                        <th>Baptism Date</th>
                                        <th>Minister</th>
                                        <th colspan="3">Fathers Name</th>
                                        <th colspan="3">Mothers Name</th>
                                        <th>Residents of</th>
                                        <th>Godparents</th>
                                        <th colspan="4">Other Details</th>
                                        <!-- <th>Parish Priest</th> -->
                                    </tr>
                                </thead>
                                <tbody id="birthListFilterTable">
                                    <!-- Keep it empty -->
                                    <tr>
                                        <td colspan="21">No Records Yet</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Death Certificate -->
                        <div class="col s12 fix_height_table" style="display: none;" id="deathListFilterTableDIV">
                            <table class="death_group_table striped">
                                <thead>
                                    <tr>
                                        <th colspan="3">Decease Name</th>
                                        <th colspan="10">Other Info</th>
                                        <!-- <th>Priest Name</th> -->
                                    </tr>
                                </thead>
                                <tbody id="deathListFilterTable">
                                    <!-- Keep it empty -->
                                    <tr>
                                        <td colspan="18">No Records Yet</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </div>
</div>

<!-- Rendered Filter -->
<div id="renderedFilter" class="modal">
    <div class="modal-content">
        <h4>You can apply following filters</h4>
        <p>Follow the Steps</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Create Filter</a>
    </div>
</div>


<!-- Adding Priest -->
<div id="assignPriestModalForm" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Assign Parish Priest</h4>
        <div class="row">
            <div class="col s12 m6">
                <div id="paginationPriestDiv"></div>
            </div>
            <div class="col s12 m6">
                <input type="search" class="btnSearchPriestInModal" placeholder="Search . . .">
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <table class="striped">
                    <thead>
                        <tr>
                            <th>Clergy Title</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Assign Priest</th>
                        </tr>
                    </thead>
                    <tbody id="priestList">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="/ihmp/priest" class="modal-action modal-close waves-effect waves-green btn-flat">Did not find priest? Add Priest</a>
    </div>
</div>

<!-- Floating Import Progress Indicator -->
<div id="importProgress" class="hide">
    <div class="card purple">
        <div class="card-content white-text" id="importInProgressMessage">
            Import in progress (99 Records left)
        </div>
    </div>
</div>

<!-- Error Imports -->
<div id="errorImports" class="hide">
    <div class="card red">
        <div class="card-content white-text" id="errorImportMessage">
            Error Imports (99 Records)
        </div>
    </div>
</div>

<div id="errorListModal"  class="modal">
    <div class="modal-content center">
        <div class="row">
            <div class="col s12">
                Make Sure to copy the content of this popup as when notification closes you wont get the second time to look on to this list
                <table class="striped">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                        </tr>
                    </thead>
                    <tbody id="errorListContent">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('/js/modal.js')}}">
</script>
