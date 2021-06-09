//Will check the session validity
function checkTokenValidity(token){
    $.ajax({
        type: "GET",
        url: access_token_endpoint+"/"+token,
        success: function(response){
            // checking response if null an automatically show session expire
            if(response != null){
                /// response set is 200 and 204
                // 200 for valid token
                // 204 for expired token
                if(response.status == 200){
                    return response['data'][0]['token_status'];
                }else if(response.status == 204){
                    forceLogout();
                }
            }else{
                /// Will show a popup if session expires or local storage is been deleted
                forceLogout();
            }
        }, error: function(e){
            return "DEBUG:: "+e;
        }
    });
}


function forceLogout(){
    $(document).ready(function(){
        /// Will show a popup if session expires or local storage is been deleted
        var html = "";
        html += "<h5>Session Expire!</h5>"
        +"You will redirected to login screen\nPlease Relogin";
        $('#modalSysError').modal('open');
        $(".errMessage").addClass('hide');
        $('.customMessage').html(html);
        $(".customMessage").removeClass('hide');

        // will force to logout after 3 seconds
        $(this).delay(3000).queue(function(){
            $('#logout-form').submit();
        });
    });
}


function isTokenExist(){
    if (localStorage.getItem("AT") === null) {
        forceLogout();
    }
}


// Certificates
// Confirmation

function confirmationList(){
    isTokenExist();
    var AT = localStorage.getItem("AT");
    checkTokenValidity(AT);

    
    $.ajax({
        type: "GET",
        url: certificate_endpoint,
        success: function(response){
            if(response.status == 200){
                var html = "";
                var confirmationObject = response.data;
                for(var x = 0; x < confirmationObject.length; x++){
                    var metaContent = JSON.parse(confirmationObject[x]['meta']);
                    html+='<tr>'
                    +'<!-- Actions -->'
                    +'<td><button class="btn waves-effect btn-actions blue tooltipped" data-position="bottom" data-delay="50" data-tooltip="Print Record"><i class="material-icons">print</i></button></td>'
                    +'<td><button class="btn waves-effect btn-actions green tooltipped" data-position="bottom" data-delay="50" data-tooltip="Update Record"><i class="material-icons">edit</i></button></td>'
                    +'<td><button class="btn waves-effect btn-actions red tooltipped" data-position="bottom" data-delay="50" data-tooltip="Delete Record"><i class="material-icons">delete</i></button></td>'
                    +'<!-- Confirmation Date -->'
                    +'<td>'+metaContent['confirmation_month']+'/'+metaContent['confirmation_day']+'/'+metaContent['confirmation_year']+'</td>'
                    +'<!-- Date Issued -->'
                    +'<td>'+metaContent['date_issued']+'</td>'
                    +'<!-- Record of -->'
                    +'<td><label style="font-size: 9px;">First Name</label><br>'+confirmationObject[x]['firstname']+'</td>'
                    +'<td><label style="font-size: 9px;">Middle Name</label><br>'+confirmationObject[x]['middlename']+'</td>'
                    +'<td><label style="font-size: 9px;">Last Name</label><br>'+confirmationObject[x]['lastname']+'</td>'
                    +'<!-- Fathers Name -->'
                    +'<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['father_firstname']+'</td>'
                    +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['father_middlename']+'</td>'
                    +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['father_lastname']+'</td>'
                    +'<!-- Mothers Name -->'
                    +'<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['mother_firstname']+'</td>'
                    +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['mother_middlename']+'</td>'
                    +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['mother_lastname']+'</td>'
                    +'<!-- First Sponsor -->'
                    +'<td><label style="font-size: 9px;">Full Name</label><br>'+metaContent['first_sponsor']+'</td>'
                    +'<!-- Second Sponsor -->'
                    +'<td><label style="font-size: 9px;">Full Name</label><br>'+metaContent['second_sponsor']+'</td>'
                    +'<!-- Confirmation by -->'
                    +'<td>'+metaContent['confirmation_by']+'</td>'
                    +'<!-- Registration Book Detail -->'
                    +'<td><label style="font-size: 9px;">Registration Book</label><br>'+metaContent['registration_book']+'</td>'
                    +'<td><label style="font-size: 9px;">Book Page</label><br>'+metaContent['book_page']+'</td>'
                    +'<td><label style="font-size: 9px;">Book Number</label><br>'+metaContent['book_number']+'</td>'
                    +'</tr>';
                }

                $("#confirmationListTable").html(html);
                $('.tooltipped').tooltip({delay: 50});
            }else{
                console.log('Something is not right:: '+response.status);
            }
        }, error: function(e){
            console.log('Something is not right:: '+e);
        }
    });
}