<div class="card">
    <div class="card-content">
        <div class="row">
            <div class="col s12 m6">
                <h5>Confirmation Record</h5>
            </div>
            <div class="col s12 m6">
                <ul class="pagination right removeBottomMargin">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="active"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col s12 fix_height_table" style="overflow-x: scroll;">
                <table class="confirmation_group_table striped">
                    <thead>
                        <tr>
                            <th colspan="3">Actions</th>
                            <th>Confirmation Date</th>
                            <th>Date Issued</th>
                            <th colspan="3">Record of</th>
                            <th colspan="3">Fathers' Name</th>
                            <th colspan="3">Mothers' Name</th>
                            <th>First Sponsor</th>
                            <th>Second Sponsor</th>
                            <th>Confirmation by</th>
                            <th colspan="3">Registration Book Detail</th>
                        </tr>
                    </thead>
                    <tbody id="confirmationListTable">
                        <!-- Keep it empty -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        confirmationList();
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
    });
</script>