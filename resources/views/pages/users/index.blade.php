@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col s12">
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col s12 m4">
                                        <h5>Users</h5>
                                    </div>
                                    <div class="col s12 m4">
                                        <input type="search" class="btnSearch" placeholder="Search . . .">
                                    </div>
                                    <div class="col s12 m4">
                                        <div id="paginationDiv" class="right"></div>
                                    </div>

                                    <div class="col s12">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Actions</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="appendUserList">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            isTokenExist();
            getUserList("NA");
            function getUserList(url){
                $.ajax({
                    type: "GET",
                    url: url == "NA" ? user_endpoint : url,
                    success: function(response){
                        if(response.status >= 200 && response.status < 400){
                            var html = "";
                            var userObject = response.data.data;
                            var prevPageURL = response.data.prev_page_url;
                            var nextPageURL = response.data.next_page_url;
                            var path = response.data.path;
                            var currentPage = response.data.current_page;
                            var lastPage = response.data.last_page;
                            var pageHtml = `<ul class="pagination">
                                            <li class='${currentPage == 1 ? "disabled" : "waves-effect"}'><a class="btnPagination ${currentPage == 1 ? "disabled" : "waves-effect"}" url="${prevPageURL}"><i class="material-icons">chevron_left</i></a></li>`;
                            
                            

                            if(response.data.length !== 0){
                                var AT = localStorage.getItem("AT");
                                var delagatedId = parseInt(localStorage.getItem('delegatedUser'));
                                var delegated_user = AT.substring(delagatedId+1, AT.length);
                                for(var x = 0; x < userObject.length; x++){
                                    var rootContent = userObject[x];
                                    // if(delegated_user != rootContent['id']){
                                        var status = rootContent['is_active'] == 0 ? 'Deactivated':'Active';
                                        var buttonStat = status == "Active" ? 'Deactivate':'Activate';
                                        var buttonType = rootContent['role_name'] == 'Administrator' ? 'Staff':'Administrator';
                                        html += "<tr>"
                                        +'<td><button class="btn waves-effect btn-actions red tooltipped btnResetPassword" id="btnResetPassword-'+rootContent['id']+'" data-position="bottom" data-delay="50" data-tooltip="Reset Password"><i class="material-icons">vpn_key</i></button></td>'
                                        +'<td><button class="btn waves-effect btn-actions green tooltipped btnSwitchUserRole" id="btnSwitchUserRole-'+rootContent['id']+'" data-position="bottom" data-delay="50" data-tooltip="Switch role to '+buttonType+'"><i class="material-icons">sync</i></button></td>'
                                        +'<td><button class="btn waves-effect btn-actions blue tooltipped btnSwitchUserStatus" id="btnSwitchUserStatus-'+rootContent['id']+'" data-position="bottom" data-delay="50" data-tooltip="'+buttonStat+' User"><i class="material-icons">supervisor_account</i></button></td>'
                                        +"<td>"+rootContent['name']+"</td>"
                                        +"<td>"+rootContent['email']+"</td>"
                                        +"<td>"+rootContent['role_name']+"</td>"
                                        +"<td>"+status+"</td>"
                                        +"</tr>";
                                    // }
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
                            $("#appendUserList").html(html);
                            $('.tooltipped').tooltip({delay: 50});

                            /// Switch User Status
                            $(".btnSwitchUserStatus").on("click",function(){
                                var userId = $(this).attr("id").substr('btnSwitchUserStatus-'.length);
                                switchUserStatus(userId);
                            });

                            /// Switch User Role
                            $(".btnSwitchUserRole").click(function(){
                                var userId = $(this).attr("id").substr('btnSwitchUserRole-'.length);
                                switchUserRole(userId);
                            });

                            /// Reset Password
                            $(".btnResetPassword").click(function(){
                                var userId = $(this).attr("id").substr('btnResetPassword-'.length);
                                resetPassword(userId);
                            });

                        }else{
                            Materialize.toast('Something Went Wrong:: ('+response.status+')', 5000, 'red rounded');
                        }
                    }, error: function(e){
                        Materialize.toast('Something Went Wrong:: '+e.responseJSON.message, 5000, 'red rounded');
                        console.log('["Confirmation Error"]: '+e.responseJSON.message);
                    }
                });
            }

            // Pagination For Birth
            $(document).on('click', '.btnPagination', function(){
                let url = $(this).attr("url");
                let status = $(this).attr("class").split(" ")[1];
                if(status != "disabled"){
                    getUserList(url);
                }
            });

            function switchUserRole(userId){
                isTokenExist();
                var AT = localStorage.getItem("AT");
                checkTokenValidity(AT);
                
                if(userId == undefined || userId == null){
                    $('#modalSysError').modal('open');
                }else{
                    $.ajax({
                        type: "GET",
                        url: user_endpoint+"/"+userId,
                        data: {'isIdSearch':true, 'id':userId},
                        success: function(response){
                            var data = response.data.data;
                            if(response.status >= 200 && response.status < 400){
                                var user_status = data[0]['is_active'];
                                var role_id = data[0]['role_id'] == 1 ? 2:1;
                                $.ajax({
                                    type: "PUT",
                                    url: user_endpoint+"/"+userId,
                                    data: {'role_id':role_id, 'is_active':user_status, 'id':userId,'isResetPassword':false},
                                    success: function(response){
                                        if(response.status >= 200 && response.status < 400){
                                            getUserList("NA");
                                            Materialize.toast('Role Successfully Switched', 5000, 'green rounded');
                                        }else{
                                            Materialize.toast('Something Went Wrong::('+response.status+')', 5000, 'red rounded');
                                        }
                                    }, error: function(e){
                                        Materialize.toast('Something Went Wrong:: '+e.responseJSON.message, 5000, 'red rounded');
                                        console.log('["Confirmation Error"]: '+e.responseJSON.message);
                                    }
                                });
                            }else{
                                Materialize.toast('Record not found: ('+response.status+')', 5000, 'red rounded');
                            }
                        }, error: function(e){
                            Materialize.toast('Something Went Wrong:: '+e.responseJSON.message, 5000, 'red rounded');
                            console.log('["Confirmation Error"]: '+e.responseJSON.message);
                        }
                    });
                }
            }

            function switchUserStatus(userId){
                isTokenExist();
                var AT = localStorage.getItem("AT");
                checkTokenValidity(AT);
                
                if(userId == undefined || userId == null){
                    $('#modalSysError').modal('open');
                }else{
                    $.ajax({
                        type: "GET",
                        url: user_endpoint+"/"+userId,
                        data: {'isIdSearch':true, 'id':userId},
                        success: function(response){
                            var data = response.data.data;
                            if(response.status >= 200 && response.status < 400){
                                var user_status = data[0]['is_active'] == 0 ? 1:0;
                                var role_id = data[0]['role_id'];
                                $.ajax({
                                    type: "PUT",
                                    url: user_endpoint+"/"+userId,
                                    data: {'role_id':role_id, 'is_active':user_status, 'id':userId,'isResetPassword':false},
                                    success: function(response){
                                        if(response.status >= 200 && response.status < 400){
                                            getUserList("NA");
                                            Materialize.toast('Successfully Switch Status', 5000, 'green rounded');
                                        }else{
                                            Materialize.toast('Something Went Wrong::('+response.status+')', 5000, 'red rounded');
                                        }
                                    }, error: function(e){
                                        Materialize.toast('Something Went Wrong:: '+e.responseJSON.message, 5000, 'red rounded');
                                        console.log('["Confirmation Error"]: '+e.responseJSON.message);
                                    }
                                });
                            }else{
                                Materialize.toast('Record not found: ('+response.status+')', 5000, 'red rounded');
                            }
                        }, error: function(e){
                            Materialize.toast('Something Went Wrong:: '+e.responseJSON.message, 5000, 'red rounded');
                            console.log('["Confirmation Error"]: '+e.responseJSON.message);
                        }
                    });
                }
            }

            function resetPassword(userId){
                isTokenExist();
                var AT = localStorage.getItem("AT");
                checkTokenValidity(AT);
                
                if(userId == undefined || userId == null){
                    $('#modalSysError').modal('open');
                }else{
                    $.ajax({
                        type: "GET",
                        url: user_endpoint+"/"+userId,
                        data: {'isIdSearch':true, 'id':userId},
                        success: function(response){
                            var data = response.data.data;
                            if(response.status >= 200 && response.status < 400){
                                var user_status = data[0]['is_active'] == 0 ? 1:0;
                                var role_id = data[0]['role_id'];
                                $.ajax({
                                    type: "PUT",
                                    url: user_endpoint+"/"+userId,
                                    data: {'isResetPassword':true, "id":userId},
                                    success: function(response){
                                        if(response.status >= 200 && response.status < 400){
                                            getUserList();
                                            Materialize.toast('Successfully Reset Password: Default Password (1234567890)', 5000, 'green rounded');
                                        }else{
                                            Materialize.toast('Something Went Wrong::('+response.status+')', 5000, 'red rounded');
                                        }
                                    }, error: function(e){
                                        Materialize.toast('Something Went Wrong:: '+e.responseJSON.message, 5000, 'red rounded');
                                        console.log('["Confirmation Error"]: '+e.responseJSON.message);
                                    }
                                });
                            }else{
                                Materialize.toast('Record not found: ('+response.status+')', 5000, 'red rounded');
                            }
                        }, error: function(e){
                            Materialize.toast('Something Went Wrong:: '+e.responseJSON.message, 5000, 'red rounded');
                            console.log('["Confirmation Error"]: '+e.responseJSON.message);
                        }
                    });
                }
            }

        });
    </script>
@endsection