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
            
            <div class="col s12 m6">
                <div class="row">
                    <form class="col s12" id="priest_form">
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="hidden" value="0" id="is_deleted" name="is_deleted">
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

    <script>
        $(document).ready(function(){
            $(".certificate").removeClass('active');
            $(".priest").addClass('active');
            getPriestList();
            
            /// Save
            $("#priest_form").on('submit', function(e){
                e.preventDefault();
                var fields = $("#priest_form").serialize();
                
                $.ajax({
                    type: "POST",
                    url: priest_endpoint,
                    data: fields,
                    success: function(data){
                        if(data.status == 200){
                            getPriestList();
                        }
                    }, error: function(e){
                        console.log('Something went wrong: '+e);
                    }
                });
            });

           

            function getPriestList(){
                $.ajax({
                    type: 'GET',
                    url: priest_endpoint,
                    success: function(response){
                        console.log(response.data);
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
                            console.log('priestId:: '+priestId);
                            showToUpdatePriest(priestId);
                        });
                    },error: function(e){
                        console.log(e.message);
                    }
                });
            }

            function deletePriest(priestId){
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

            function showToUpdatePriest(priestId){
                $.ajax({
                    type: "GET",
                    url: priest_endpoint+"/"+priestId,
                    success: function(response){
                        if(response.status == 200){
                            console.log(response.data);
                        }
                    }, error: function(e){
                        console.log(e.message);
                    }
                });
            }
        });
    </script>
@endsection