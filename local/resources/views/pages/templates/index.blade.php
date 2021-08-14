@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col s12 m8">
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col s6">
                                        <h5>{{$title}}</h5>
                                    </div>
                                    <div class="col s6">
                                        <div id="paginationDiv" class="right"></div>
                                    </div>

                                    <!-- search -->
                                    <div class="col s12 m6"></div>
                                    <div class="col s12 m6">
                                        <input type="search" class="btnSearch" placeholder="Search . . .">
                                    </div>

                                    <div class="col s12">
                                        <table class="striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Template Type</th>
                                                    <th>Content</th>
                                                    <th>Is Template</th>
                                                    <th>Updated at</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="appendTemplateList">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12">
                                <h5 id="templateFormHeader">Add Template</h5>
                            </div>
                        </div>
                        <div class="row">
                            <form class="col s12" id="template_form" autocomplete="off">
                                <div class="row">
                                    <div class="input-field col s12 m12">
                                        <input type="hidden" value="0" id="tid" name="tid">
                                        <input type="hidden" value="0" id="is_deleted" name="is_deleted">
                                        <input type="hidden" value="0" id="is_update" name="is_update">
                                        <select id="selectTemplateType">
                                            <option value="" disabled>Choose Template Type</option>
                                            <option value="birth" selected>Birth</option>
                                            <option value="confirmation">Confirmation</option>
                                            <option value="death">Death</option>
                                            <option value="marriage">Mariage</option>
                                        </select>
                                        <label>Template Type</label>
                                    </div>
                                </div>
                                <style>
                                    textarea.materialize-textarea{height: 100px !important;}
                                </style>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="content" type="text" class="validate materialize-textarea" name="content" row='10'></textarea>
                                        <label for="content">Content</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m12">
                                        <select id="selectIsTemplate">
                                            <option value="" disabled>Choose Record</option>
                                            <option value="1" selected>Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        <label>Is Template</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <input class="btn waves-effect" id="btnSaveTemplate" type="submit" value="Save">
                                    <button class="btn waves-effect hide" id="cancelTemplateUpdate">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $(".certificate").removeClass('active');
            $(".template").addClass('active');
            isTokenExist();
            getTemplateList("NA");

            // -------------------------------- EVENTS ----------------------------------- //
            
            /// Save
            $("#template_form").on('submit', function(e){
                e.preventDefault();
                isTokenExist();
                var AT = localStorage.getItem("AT");
                checkTokenValidity(AT);

                var is_deleted = $('#is_deleted').val();
                var is_update = $('#is_update').val();
                var tid = $('#tid').val();
                var templatetype = $('#selectTemplateType option:selected').val();
                var content = $('#content').val();
                var istemplate = $('#selectIsTemplate').val();
                var payload;

                /// It's either update or add
                if(is_update == 1){
                    payload = {
                        'id': tid,
                        'is_deleted': is_deleted,
                        'template_type':templatetype,
                        'content': content,
                        'is_template': istemplate
                    };
                    $.ajax({
                        type: "PUT",
                        url: template_endpoint+"/"+tid,
                        data: payload,
                        success: function(data){
                            if(data.status >= 200 && data.status < 400){
                                getTemplateList("NA");
                            }else{
                                Materialize.toast('Something Went Wrong:: '+JSON.stringify(data.message), 5000, 'red rounded');
                                console.log('["Confirmation Status"]: '+data.status);
                            }
                        }, error: function(e){
                            Materialize.toast('Something Went Wrong:: '+e.responseJSON.message, 5000, 'red rounded');
                            console.log('["Confirmation Error"]: '+e.responseJSON.message);
                        }
                    });
                }else{
                    payload = {
                        'is_deleted': is_deleted,
                        'template_type':templatetype,
                        'content': content,
                        'is_template': istemplate
                    };
                    $.ajax({
                        type: "POST",
                        url: template_endpoint,
                        data: payload,
                        success: function(data){
                            if(data.status == 201){
                                getTemplateList("NA");
                                clearForm();
                            }else{
                                $('#modalSysError').modal('open');
                            }
                        }, error: function(e){
                            console.log('Something went wrong: '+e);
                        }
                    });
                }

                /// Clear Input fields
                $('#is_deleted').val(0);
                $('#is_update').val(0);
                $('#tid').val(0);
                $('#selectTemplateType').val('');
                $('#content').val('');
                $('#selectIsTemplate').val('');
            });

            // DT: pagination button here...
            $(document).on('click', '.btnPagination', function(){
                let url = $(this).attr("url");
                let status = $(this).attr("class").split(" ")[1];
                if(status != "disabled"){
                    getTemplateList(url);
                }
            });

            $('#cancelTemplateUpdate').on('click', function(e){
                e.preventDefault();
                clearForm();
                $(this).addClass('hide');
                $('#templateFormHeader').html('Add Template');
            });

            //added search handler
            $(document).on('keydown', '.btnSearch', function(e){
                if(e.keyCode == 13 || e.keyCode == 9){
                    let val = $(".btnSearch").val();

                    //set the url to be returned
                    let url = `${api_server}template/${val}`;
                    
                    //then recall the function for calling the api
                    getTemplateList(url);
                }
            })


            // ------------------------------------------ FUNCITONS ------------------------------------------ //
            // Will fetch all not deleted template
            function getTemplateList(url){
                isTokenExist();
                var AT = localStorage.getItem("AT");
                checkTokenValidity(AT);

                $.ajax({
                    type: 'GET',
                    url: url == "NA" ? template_endpoint : url,
                    data: {'isIdSearch':false},
                    // url: template_endpoint,
                    success: function(response){
                        var html = "";
                        var templateObject = response.data.data;
                        var prevPageURL = response.data.prev_page_url;
                        var nextPageURL = response.data.next_page_url;
                        var path = response.data.path;
                        var currentPage = response.data.current_page;
                        var lastPage = response.data.last_page;
                        var pageHtml = `<ul class="pagination">
                                        <li class='${currentPage == 1 ? "disabled" : "waves-effect"}'><a class="btnPagination ${currentPage == 1 ? "disabled" : "waves-effect"}" url="${prevPageURL}"><i class="material-icons">chevron_left</i></a></li>`;

                        if(response.data.length !== 0){
                            for(var x = 0; x < templateObject.length; x++){
                                let istemplate = templateObject[x]['is_template'] === 1 ? "Yes" : "No"
                                let updatedDate = new Date(templateObject[x]['updated_at']);
                                html += "<tr>"
                                +"<td>"+templateObject[x]['id']+"</td>"
                                +"<td>"+templateObject[x]['template_type']+"</td>"
                                +"<td>"+templateObject[x]['template_type'].charAt(0).toUpperCase() + templateObject[x]['template_type'].slice(1)+" template is added</td>"
                                +"<td>"+istemplate+"</td>"
                                +"<td>"+monthNames[updatedDate.getMonth()+1]+" "+updatedDate.getDate()+", "+updatedDate.getFullYear()+" "+updatedDate.getTime()+"</td>"
                                +"<td>"
                                    +"<button class='btn btn-wave btnDelete red' id='btnDelete-"+templateObject[x]['id']+"'><i class='material-icons'>delete</i></button>"
                                    +" "
                                    +"<button class='btn btn-wave btnUpdate blue' id='btnUpdate-"+templateObject[x]['id']+"'><i class='material-icons'>edit</i></button>"
                                +"</td>"
                                +"</tr>";
                            }
                        }else{
                            html += "<tr>"
                                        +"<td colspan='5' class='center'> No records found</td>"
                                    +"</tr>";
                        }

                        if(lastPage > 1){                                
                            if(currentPage > 2){
                                pageHtml += `<li class="waves-effect"><a class="btnPagination" url="${path + "?page=" + 1}">${1}...</a></li>`;
                            }
                            for(let i = currentPage - 1; i < (currentPage - 1 )+3; i++){
                                if(currentPage != lastPage){
                                    if(currentPage == parseInt(i+1)){
                                        pageHtml += `<li class="active"><a class="btnPagination" url="${path + "?page=" + parseInt(i+1)}">${currentPage}</a></li>`;
                                    }else{
                                        if(parseInt(i+1) >= lastPage){

                                        }else{
                                            pageHtml += `<li class="waves-effect"><a class="btnPagination" url="${path + "?page=" + parseInt(i+1)}">${i+1}</a></li>`;
                                        }
                                    }
                                }else{
                                    pageHtml += `<li class="waves-effect"><a class="btnPagination" url="${path + "?page=" + i}">${i}</a></li>`;
                                    break;
                                }
                            }
                            pageHtml += `<li class="waves-effect ${lastPage == currentPage ? "active":""}"><a class="btnPagination" url="${path + "?page=" + lastPage}">... up to ${lastPage}</a></li>`;
                            pageHtml += `<li class='${lastPage == currentPage ? "disabled" : "waves-effect"}'><a class="btnPagination ${lastPage == currentPage ? "disabled" : "waves-effect"}" url="${nextPageURL}"><i class="material-icons">chevron_right</i></a></li>
                                        </ul>`;
                            //display the pagination
                            $("#paginationDiv").html(pageHtml);
                        }

                        //display the data to table
                        $("#appendTemplateList").html(html);

                        /// Delete Template
                        $(".btnDelete").on("click",function(){
                            var templateId = $(this).attr("id").substr('btnDelete-'.length);
                            deleteTemplate(templateId);
                        });

                        /// Update Template
                        $(".btnUpdate").click(function(){
                            var templateId = $(this).attr("id").substr('btnUpdate-'.length);
                            showToUpdateTemplate(templateId, $(this).attr("id"));
                        });

                    },error: function(e){
                        $('#modalSysError').modal('open');
                    }
                });
            }

            // Will delete a template
            function deleteTemplate(templateId){
                isTokenExist();
                var AT = localStorage.getItem("AT");
                checkTokenValidity(AT);

                if(templateId == undefined || templateId == null){
                    $('#modalSysError').modal('open');
                }else{
                    /// Pull out record first
                    $.ajax({
                        type: "GET",
                        url: template_endpoint+"/"+templateId,
                        data: {'isIdSearch':false, 'templateToSearch':null},
                        success: function(response){
                            if(response.status == 200){
                                /// Prepare Delete Confirmation Modal
                                $("#recordToDelete").html(response.data.data[0]['firstname']);
                                var buttonConfirmation = "<button class='btn btnTemplateDelete' id='"+templateId+"'>Delete</button> <button class='btn' id='closeConrimation'>Cancel</button>";
                                $('#buttonConfirmation').html(buttonConfirmation);
                                
                                /// Open the modal
                                $('#deleteConfirmationModal').modal('open');

                                /// if confirmed Delete
                                $(".btnTemplateDelete").click(function(){
                                    var fetchTemplateId = $(this).attr('id');
                                    $.ajax({
                                        type: "DELETE",
                                        url: template_endpoint+"/"+fetchTemplateId,
                                        data: {"id": templateId, "is_deleted": 1},
                                        success: function(response){
                                            if(response.status == 202){
                                                getTemplateList("NA");
                                                $('#deleteConfirmationModal').modal('close');
                                            }else{
                                                console.log('Invalid Code status');
                                            }
                                        }, error: function(e){
                                            console.log(e.message);
                                        }
                                    });
                                });

                                /// else close modal
                                $("#closeConrimation").click(function(){
                                    $('#deleteConfirmationModal').modal('close');
                                });

                            }else{
                                console.log('Invalid Code Status');
                            }
                        }, error: function(e){
                            console.log(e.message);
                        }
                    });
                }
            }
            
            // Will pull a specific record to update
            function showToUpdateTemplate(templateId, btnId){
                isTokenExist();
                var AT = localStorage.getItem("AT");
                checkTokenValidity(AT);
                
                if(templateId == undefined || templateId == null){
                    $('#modalSysError').modal('open');
                }else{
                    $.ajax({
                        type: "GET",
                        url: template_endpoint+"/"+templateId,
                        data: {'isIdSearch':true},
                        success: function(response){
                            var data = response.data.data;
                            console.log(response);
                            if(response.status >= 200 && response.status < 400){
                                $('#content').val(data[0].content);
                                $("label[for='content']").addClass('active');
                                $('#selectTemplateType').val(data[0].template_type);
                                $("label[for='selectTemplateType']").addClass('active');
                                $('#selectIsTemplate').val(data[0].is_template);
                                $("label[for='selectIsTemplate']").addClass('active');
                                $('#lastname').val(data[0].lastname);
                                $("label[for='lastname']").addClass('active');
                                $('#is_update').val(1);
                                $('#tid').val(templateId);
                                $('#templateFormHeader').html('Update Template');
                                $('#cancelTemplateUpdate').removeClass('hide');

                                $('#template_form').find('select')
                                .each(function () {
                                    $(this).material_select();
                                });
                            }else{
                                Materialize.toast('Something Went Wrong:: ('+response.status+')',5000, 'red rounded');
                            }
                        }, error: function(e){
                            Materialize.toast('Something Went Wrong:: ('+e+')',5000, 'red rounded');
                        }
                    });
                }
            }

            // Will clear form
            function clearForm(){
                $('#template_form').find('input:text, input:password, select')
                .each(function () {
                    $(this).val('');
                });
                $('#template_form').find("label[for='prefix'], label[for='firstname'], label[for='middlename'], label[for='lastname']")
                .each(function () {
                    $(this).removeClass('active');
                });
            }

        });
    </script>
@endsection