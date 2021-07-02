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
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>First Name</th>
                                                    <th>Middle Name</th>
                                                    <th>Last Name</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="appendPriestList">

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
                                <h5 id="priestFormHeader">Add Priest</h5>
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
                                    <input class="btn waves-effect" id="btnSavePriest" type="submit" value="Save">
                                    <button class="btn waves-effect hide" id="cancelPriestUpdate">Cancel</button>
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
            $(".priest").addClass('active');
            isTokenExist();
            getPriestList("NA");

            // -------------------------------- EVENTS ----------------------------------- //

            $("#btnRefresh").on('click', function(e){
                $(".errMessage").addClass('hide');
                $(".errorProgressIndicator").removeClass('hide');
                $(this).delay(3000).queue(function(){
                    location.reload();
                });
            });
            
            /// Save
            $("#priest_form").on('submit', function(e){
                e.preventDefault();
                isTokenExist();
                var AT = localStorage.getItem("AT");
                checkTokenValidity(AT);

                var is_deleted = $('#is_deleted').val();
                var is_update = $('#is_update').val();
                var pid = $('#pid').val();
                var prefix = $('#prefix').val();
                var firstname = $('#firstname').val();
                var middlename = $('#middlename').val();
                var lastname = $('#lastname').val();
                var payload;

                /// It's either update or add
                if(is_update == 1){
                    payload = {
                        'id': pid,
                        'is_deleted': is_deleted,
                        'prefix':prefix,
                        'firstname': firstname,
                        'middlename': middlename,
                        'lastname': lastname
                    };
                    $.ajax({
                        type: "PUT",
                        url: priest_endpoint+"/"+pid,
                        data: payload,
                        success: function(data){
                            if(data.status >= 200 && response.status < 400){
                                getPriestList("NA");
                            }else{
                                Materialize.toast('Something Went Wrong:: '+JSON.stringify(response.message), 5000, 'red rounded');
                                console.log('["Confirmation Status"]: '+response.status);
                            }
                        }, error: function(e){
                            Materialize.toast('Something Went Wrong:: '+e.responseJSON.message, 5000, 'red rounded');
                            console.log('["Confirmation Error"]: '+e.responseJSON.message);
                        }
                    });
                }else{
                    payload = {
                        'is_deleted': is_deleted,
                        'prefix':prefix,
                        'firstname': firstname,
                        'middlename': middlename,
                        'lastname': lastname
                    };
                    $.ajax({
                        type: "POST",
                        url: priest_endpoint,
                        data: payload,
                        success: function(data){
                            if(data.status == 201){
                                getPriestList("NA");
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
                $('#pid').val(0);
                $('#prefix').val('');
                $('#firstname').val('');
                $('#middlename').val('');
                $('#lastname').val('');
            });

            // DT: pagination button here...
            $(document).on('click', '.btnPagination', function(){
                let url = $(this).attr("url");
                let status = $(this).attr("class").split(" ")[1];
                if(status != "disabled"){
                    getPriestList(url);
                }
            });

            $('#cancelPriestUpdate').on('click', function(){
                clearForm();
                $(this).addClass('hide');
                $('#priestFormHeader').html('Add Priest');
            });

            //added search handler
            $(document).on('keydown', '.btnSearch', function(e){
                if(e.keyCode == 13 || e.keyCode == 9){

                    let val = $(".btnSearch").val();

                    //set the url to be returned
                    let url = `${api_server}priest/${val}`;
                    
                    //then recall the function for calling the api
                    getPriestList(url);
                }
            })


            // ------------------------------------------ FUNCITONS ------------------------------------------ //
            // Will fetch all not deleted priest
            function getPriestList(url){
                isTokenExist();
                var AT = localStorage.getItem("AT");
                checkTokenValidity(AT);

                $.ajax({
                    type: 'GET',
                    url: url == "NA" ? priest_endpoint : url,
                    data: {'isIdSearch':false},
                    // url: priest_endpoint,
                    success: function(response){
                        var html = "";
                        var priestObject = response.data.data;
                        var prevPageURL = response.data.prev_page_url;
                        var nextPageURL = response.data.next_page_url;
                        var path = response.data.path;
                        var currentPage = response.data.current_page;
                        var lastPage = response.data.last_page;
                        var pageHtml = `<ul class="pagination">
                                        <li class='${currentPage == 1 ? "disabled" : "waves-effect"}'><a class="btnPagination ${currentPage == 1 ? "disabled" : "waves-effect"}" url="${prevPageURL}"><i class="material-icons">chevron_left</i></a></li>`;
                        
                        console.log("getPriestList", response);

                        if(response.data.length !== 0){
                            for(var x = 0; x < priestObject.length; x++){
                                html += "<tr>"
                                +"<td>"+priestObject[x]['prefix']+"</td>"
                                +"<td>"+priestObject[x]['firstname']+"</td>"
                                +"<td>"+priestObject[x]['middlename']+"</td>"
                                +"<td>"+priestObject[x]['lastname']+"</td>"
                                +"<td>"
                                    +"<button class='btn btn-wave btnDelete' id='btnDelete-"+priestObject[x]['id']+"'><i class='material-icons'>delete</i></button>"
                                    +" "
                                    +"<button class='btn btn-wave btnUpdate' id='btnUpdate-"+priestObject[x]['id']+"'><i class='material-icons'>edit</i></button>"
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
                        $("#appendPriestList").html(html);

                        /// Delete Priest
                        $(".btnDelete").on("click",function(){
                            var priestId = $(this).attr("id").substr('btnDelete-'.length);
                            deletePriest(priestId);
                        });

                        /// Update Priest
                        $(".btnUpdate").click(function(){
                            var priestId = $(this).attr("id").substr('btnUpdate-'.length);
                            showToUpdatePriest(priestId, $(this).attr("id"));
                        });

                    },error: function(e){
                        $('#modalSysError').modal('open');
                    }
                });
            }

            // Will delete a priest
            function deletePriest(priestId){
                isTokenExist();
                var AT = localStorage.getItem("AT");
                checkTokenValidity(AT);

                if(priestId == undefined || priestId == null){
                    $('#modalSysError').modal('open');
                }else{
                    /// Pull out record first
                    $.ajax({
                        type: "GET",
                        url: priest_endpoint+"/"+priestId,
                        success: function(response){
                            if(response.status == 200){
                                /// Prepare Delete Confirmation Modal
                                $("#recordToDelete").html(response.data[0]['firstname']);
                                var buttonConfirmation = "<button class='btn btnPriestDelete' id='"+priestId+"'>Delete</button> <button class='btn' id='closeConrimation'>Cancel</button>";
                                $('#buttonConfirmation').html(buttonConfirmation);
                                
                                /// Open the modal
                                $('#deleteConfirmationModal').modal('open');

                                /// if confirmed Delete
                                $(".btnPriestDelete").click(function(){
                                    var fetchPriestId = $(this).attr('id');
                                    $.ajax({
                                        type: "DELETE",
                                        url: priest_endpoint+"/"+fetchPriestId,
                                        data: {"id": priestId, "is_deleted": 1},
                                        success: function(response){
                                            if(response.status == 202){
                                                getPriestList("NA");
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
            function showToUpdatePriest(priestId, btnId){
                isTokenExist();
                var AT = localStorage.getItem("AT");
                checkTokenValidity(AT);
                
                if(priestId == undefined || priestId == null){
                    $('#modalSysError').modal('open');
                }else{
                    $.ajax({
                        type: "GET",
                        url: priest_endpoint+"/"+priestId,
                        data: {'isIdSearch':true},
                        success: function(response){
                            var data = response.data.data;
                            if(response.status >= 200 & response.status < 400){
                                $('#prefix').val(data[0].prefix);
                                $("label[for='prefix']").addClass('active');
                                $('#firstname').val(data[0].firstname);
                                $("label[for='firstname']").addClass('active');
                                $('#middlename').val(data[0].middlename);
                                $("label[for='middlename']").addClass('active');
                                $('#lastname').val(data[0].lastname);
                                $("label[for='lastname']").addClass('active');
                                $('#is_update').val(1);
                                $('#pid').val(priestId);
                                $('#priestFormHeader').html('Update Priest');
                                $('#cancelPriestUpdate').removeClass('hide');
                            }else{
                                Materialize.toast('Something Went Wrong:: '+JSON.stringify(response.message), 5000, 'red rounded');
                            }
                        }, error: function(e){
                            Materialize.toast('Something Went Wrong:: '+e.responseJSON.message, 5000, 'red rounded');
                        }
                    });
                }
            }

            // Will clear form
            function clearForm(){
                $('#priest_form').find('input:text, input:password, select')
                .each(function () {
                    $(this).val('');
                });
                $('#priest_form').find("label[for='prefix'], label[for='firstname'], label[for='middlename'], label[for='lastname']")
                .each(function () {
                    $(this).removeClass('active');
                });
            }

        });
    </script>
@endsection