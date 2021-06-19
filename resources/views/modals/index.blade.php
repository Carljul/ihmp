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
<div id="importExport" class="modal bottom-sheet">
    <div class="modal-content">
        <h4>Import Your CSV File Here</h4>
        <p>Follow the Steps</p>
        <b>1. </b>Select the type of certificate<br>
        <div class="row">
            <div class="col s3">                
                <div class="input-field">
                    <select class="templateDownloadDropdown">
                        <option value="" disabled selected>Select template</option>
                        <option value="mariage">Marriage</option>
                        <option value="confirmation">Confirmation</option>
                        <option value="birth">Birth</option>
                        <option value="death">Death</option>
                    </select>
                    <label>Select Parish Priest</label>
                </div>
            </div>
        </div>
        <b>2. </b>Download your template. (You can skip this step if you already downloaded this file before)
        <div class="row">
            <div class="col s3">
                <button class="btn waves-effect">Download</button>
            </div>
        </div>
        <b>3. </b>Select your template and upload
        <div class="row">
            <form enctype='multipart/form-data' method='post'>
            
                <label>Upload Product CSV file Here</label>

                <input size='50' type='file' name='filename' id="importCSV">
                </br>
                <input type='submit' name='submit' value='Upload Products' id="uploadCSV">

            </form>
        </div>

    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Import</a>
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

<script>
    $(document).ready(function(){
        $('.templateDownloadDropdown').material_select();

        $("#uploadCSV").on('click', function(e){
            e.preventDefault();
            var value = $("#importCSV").val();
            console.log('value');
            console.log(value);

            var input = document.getElementById("importCSV");
            var fReader = new FileReader();
            fReader.readAsDataURL(input.files[0]);
            fReader.onloadend = function(event){
                console.log(response);
                console.log(event.target);
            }
        });

        $("#importCSV").change(function(e) {
            var ext = $("#importCSV").val().split(".").pop().toLowerCase();
            if($.inArray(ext, ["csv"]) == -1) {
                alert('Upload CSV');
                return false;
            } 
            if (e.target.files != undefined) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var lines = e.target.result.split('\r\n');
                    console.log('lines');
                    console.log(lines[0]);
                    // for (i = 0; i < lines.length; ++i)
                    // {
                    //     $('div').append('<br>' + lines[i]);
                    // }
                };
                reader.readAsText(e.target.files.item(0));
            }
            return false;
        });
    });
</script>