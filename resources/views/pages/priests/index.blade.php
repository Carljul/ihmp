@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col s12">
                <h5>{{$title}}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6">
                <div class="card">
                    <div class="card-content">
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
            
            <div class="col s12 m6">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12">
                                <h5>Add Priest</h5>
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
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $(".certificate").removeClass('active');
            $(".priest").addClass('active');
            getPriestList();

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
                if (localStorage.getItem("AT") === null) {
                    forceLogout();
                }else{
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
                                if(data.status == 200){
                                    getPriestList();
                                }else{
                                    $('#modalSysError').modal('open');
                                }
                            }, error: function(e){
                                console.log('Something went wrong: '+e);
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
                                    getPriestList();
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
                }
            });

            // Will fetch all not deleted priest
            function getPriestList(){
                if (localStorage.getItem("AT") === null) {
                    forceLogout();
                }else{
                    var AT = localStorage.getItem("AT");
                    checkTokenValidity(AT);
                    $.ajax({
                        type: 'GET',
                        url: priest_endpoint,
                        success: function(response){
                            var html = "";
                            var priestObject = response.data;
                            for(var x = 0; x < priestObject.length; x++){
                                html += "<tr>"
                                +"<td>"+priestObject[x]['prefix']+"</td>"
                                +"<td>"+priestObject[x]['firstname']+"</td>"
                                +"<td>"+priestObject[x]['middlename']+"</td>"
                                +"<td>"+priestObject[x]['lastname']+"</td>"
                                +"<td>"
                                    +"<button class='btn btn-wave btnDelete' id='btnDelete-"+priestObject[x]['id']+"'>Delete</button>"
                                    +" "
                                    +"<button class='btn btn-wave btnUpdate' id='btnUpdate-"+priestObject[x]['id']+"'>Update</button>"
                                +"</td>"
                                +"</tr>";
                            }
                            
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
            }
            
            // Will delete a priest
            function deletePriest(priestId){
                if(priestId == undefined || priestId == null){
                    $('#modalSysError').modal('open');
                }else{
                    $.ajax({
                        type: "DELETE",
                        url: priest_endpoint+"/"+priestId,
                        data: {"id": priestId, "is_deleted": 1},
                        success: function(response){
                            if(response == 200){
                                getPriestList();
                            }
                        }, error: function(e){
                            console.log(e.message);
                        }
                    });
                }
            }
            
            // Will pull a specific record to update
            function showToUpdatePriest(priestId, btnId){
                if(priestId == undefined || priestId == null){
                    $('#modalSysError').modal('open');
                }else{
                    $.ajax({
                        type: "GET",
                        url: priest_endpoint+"/"+priestId,
                        success: function(response){
                            if(response.status == 200){
                                $('#prefix').val(response.data.prefix);
                                $("label[for='prefix']").addClass('active');
                                $('#firstname').val(response.data.firstname);
                                $("label[for='firstname']").addClass('active');
                                $('#middlename').val(response.data.middlename);
                                $("label[for='middlename']").addClass('active');
                                $('#lastname').val(response.data.lastname);
                                $("label[for='lastname']").addClass('active');
                                $('#is_update').val(1);
                                $('#pid').val(priestId);
                            }else{
                                var html = "";
                                html += "<h5>Something went wrong!</h5>"
                                +""+response.message+"";
                                $('#modalSysError').modal('open');
                                $(".errMessage").addClass('hide');
                                $('.customMessage').html(html);
                                $(".customMessage").removeClass('hide');
                            }
                        }, error: function(e){
                            var html = "";
                            html += "<h5>Something went wrong!</h5>"
                            +""+e.message+"";
                            $('#modalSysError').modal('open');
                            $(".errMessage").addClass('hide');
                            $('.customMessage').html(html);
                            $(".customMessage").removeClass('hide');
                        }
                    });
                }
            }


        });
    </script>
@endsection