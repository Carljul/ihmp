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
                            <th>Priest</th>
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
        // You can find this in general
        getConfirmationList();
    });
</script>