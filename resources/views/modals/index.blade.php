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
                    <b>1. </b>Select the type of certificate<br>  
                    <select class="templateDownloadDropdown" id="templateDownloadDropdown">
                        <option value="" disabled selected>Select template</option>
                        <option value="mariage">Marriage</option>
                        <option value="confirmation">Confirmation</option>
                        <option value="birth">Birth</option>
                        <option value="death">Death</option>
                    </select>
                    <label>Select Parish Priest</label>
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
<div id="filterTable" class="modal">
    <div class="modal-content">
        <h4>You can apply following filters</h4>
        <p>Follow the Steps</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Create Filter</a>
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
<div id="addPriestModalForm" class="modal">
    <div class="modal-content">
        <h4>Add Parish Priest</h4>
        <p>Follow the Steps</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Add Priest and Refresh Dropdown</a>
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

<script>
    $(document).ready(function(){
        $('#importExport').modal()[0].M_Modal.options.dismissible = false;
        $('.templateDownloadDropdown').material_select();
    });
</script>