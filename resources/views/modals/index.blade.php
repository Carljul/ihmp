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

<script>
    $(document).ready(function(){
        $('.templateDownloadDropdown').material_select();

        $("#templateDownloadDropdown").on('change', function(){
            var getVal = $(this).val();

            if(getVal == ""){
                $("#btnDownload").addClass('disabled');
                $("#uploadFile").addClass('disabled');
                $("#btnStartImportSequence").addClass('disabled');
            }else{
                $("#btnDownload").removeClass('disabled');
                $("#uploadFile").removeClass('disabled');
                $("#btnStartImportSequence").removeClass('disabled');


                // Create a link file to download
                $("#btnDownload").prop('href','download/Confirmation_Template.csv');
            }
        });

        // will return unique values of array
        function getUnique(array){
            var uniqueArray = [];
            
            // Loop through array values
            for(i=0; i < array.length; i++){
                if(array[i] != ""){
                    if(uniqueArray.indexOf(array[i]) === -1) {
                        uniqueArray.push(array[i]);
                    }
                }
            }
            return uniqueArray;
        }

        // Uploading Data to Html
        $("#importCSV").change(function(e) {
            e.preventDefault();

            // Show In Progress
            var html = "Fetching Data";
            $("#showDataToImport").html(html);


            var ext = $("#importCSV").val().split(".").pop().toLowerCase();
            if($.inArray(ext, ["csv"]) == -1) {
                alert('Upload CSV');
                return false;
            } 
            if (e.target.files != undefined) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var lines = e.target.result.split('\r\n');
                    var firstLine = lines[0];
                    var headersLength = 0;
                    var newSetArray = [];

                    // Will hold a list of array,
                    // Values of array are the data to import in db
                    var arrayToImport = [];

                    html = "";

                    html+="<table class='striped' style='width: 340%;'>"
                    +"<thead>";
                    if(firstLine.toLowerCase().includes('confirmation')){
                        var getHeaders = lines[6].split(",");
                        console.log(getHeaders.length);
                        // Create Headers First
                        for(var x = 0; x < getHeaders.length; x++){
                            html+="<th>"+getHeaders[x]+"</th>";
                        }
                        // Remove the headers
                        lines.splice(0,7);
                        newSetArray = lines;
                    }else if(firstLine.toLowerCase().includes('birth')){
                        
                    }else if(firstLine.toLowerCase().includes('marriage')){
                        
                    }else if(firstLine.toLowerCase().includes('death')){
                        
                    }else{
                        // CSV File is been edited.
                        Materialize.toast('It seems that the header of the uploaded file i edited\nPlease download again the file', 5000, 'red rounded');
                        return false;
                    }
                    html+="</thead>"
                    +"<tbody>";

                    // Remove Duplicate Values
                    newSetArray = getUnique(newSetArray);

                    // Display the total number of records
                    $("#countRecord").html(newSetArray.length+" "+(newSetArray.length > 1 ? "Records":"Record")+" Found and ready to import!");

                    // Display Fields to table
                    for (i = 0; i < newSetArray.length; ++i)
                    {
                        // Convert String to array
                        var record = newSetArray[i].split(",");

                        // Save Record to use in insert
                        arrayToImport.push(record);

                        // Generate Records
                        html+="<tr>";
                        for(var y = 0; y < record.length; y++){
                            html+="<td>"+record[y]+"</td>";
                        }
                        html+="</tr>";
                    }
                    
                    html+="</tbody>"
                    +"</table>";
                    $("#showDataToImport").html(html);



                    // TODO:: Generate Import Sequence
                    console.log(arrayToImport);

                };
                reader.readAsText(e.target.files.item(0));
            }
            return false;
        });
    });
</script>