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
                                    <h3>Update your Profile</h3>
                                    <form class="col s12" id="user_form" autocomplete="off">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input type="hidden" value="1" id="is_active" name="is_active">
                                                <input type="hidden" value="0" id="uid" name="uid">
                                                <input id="username" type="text" class="validate" name="username">
                                                <label for="username">Name</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="email" type="email" class="validate" name="email">
                                                <label for="email">Email</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="password" type="password" name="password">
                                                <label for="password">Password (Leave it blank if you dont want to update your password)</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="current-password" type="password" name="current-password">
                                                <label for="current-password">Confirm Password (Leave it blank if you dont want to update your password)</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <input class="btn waves-effect" id="btnSaveUser" type="submit" value="Save">
                                        </div>
                                    </form>          
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
            var AT = localStorage.getItem('AT');
            var delagatedId = parseInt(localStorage.getItem('delegatedUser'));
            var delegated_user = AT.substring(delagatedId+1, AT.length);
            getUser();
            // ================================ EVENTS
            $("#user_form").on('submit', function(e){
                e.preventDefault();
                var name = $('#username').val();
                var email = $("#email").val();
                var password = $("#password").val();
                var cpassword = $("#current-password").val();
                if(password == "" && cpassword == ""){
                    var payload = {
                        'id': delegated_user,
                        'name': name,
                        'email': email
                    };
                    $.ajax({
                        type: "PUT",
                        url: user_info_endpoint+"/"+delegated_user,
                        data: payload,
                        success: function(response){
                            if(response.status >= 200 && response.status < 400){
                                Materialize.toast('Updated', 5000, 'green rounded');
                                
                                $("#password").val('');
                                $("#current-password").val('');
                                getUser();
                            }else{
                                Materialize.toast('Something Went Wrong::'+response.message, 5000, 'red rounded');
                            }
                        }, error: function(e){
                            console.log(e);
                        }
                    });
                }else if(password == cpassword){
                    if(password.length > 7){
                        var payload = {
                            'id': delegated_user,
                            'name': name,
                            'email': email,
                            'password': password
                        };
                        $.ajax({
                            type: "PUT",
                            url: user_info_endpoint+"/"+delegated_user,
                            data: payload,
                            success: function(response){
                                if(response.status >= 200 && response.status < 400){
                                    Materialize.toast('Updated', 5000, 'green rounded');
                                    $("#password").val('');
                                    $("#current-password").val('');
                                    getUser();
                                }else{
                                    Materialize.toast('Something Went Wrong::'+response.message, 5000, 'red rounded');
                                }
                            }, error: function(e){
                                Materialize.toast('Something Went Wrong::'+e.responseJson['message'], 5000, 'red rounded');
                            }
                        });
                    }else{
                        console.log("Password atleast 8");
                        Materialize.toast('Password must be atleast 8 characters', 5000, 'red rounded');
                    }
                }else if(password == "" && cpassword != "" || password != "" && cpassword == ""){
                    console.log("Password did not match");
                    Materialize.toast('Password and Confirm Password did not match', 5000, 'red rounded');
                }else{
                    console.log("Password did not match");
                    Materialize.toast('Password and Confirm Password did not match', 5000, 'red rounded');
                }
            });

            // ================================ FUNCTIONS
            function getUser(){
                $.ajax({
                    type: "GET",
                    url: user_endpoint+"/"+delegated_user,
                    data: {'isIdSearch':true, 'isOwnedAccount': true, 'id':delegated_user},
                    success: function(response){
                        if(response.status >= 200 && response.status < 400){
                            var rootContent = response.data[0];
                            $('#uid').val(rootContent['email']);
                            $('#username').val(rootContent['name']);
                            $('#email').val(rootContent['email']);
                            $("#user_form").find('label')
                            .each(function () {
                                $(this).addClass('active');
                            });
                        }else{
                            Materialize.toast('Account not found', 5000, 'red rounded');
                        }
                    }, error: function(e){
                        console.log(e);
                    }
                });
            }
        });
    </script>
@endsection