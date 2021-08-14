<div class="card">
    <div class="card-content">
        <div class="row">
            <div class="col s12 m6">
                <h5>Confirmation Record</h5>
            </div>
            <div class="col s12 m6">
                <ul class="pagination right removeBottomMargin" id="paginationCertificate">
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col s12 fix_height_table" style="overflow-x: scroll;">
                <table class="confirmation_group_table striped">
                    <thead>
                        <tr>
                            <th colspan="3">Actions</th>
                            <th colspan="4">Record of</th>
                            <th>Confirmation Date</th>
                            <th>Date Issued</th>
                            <th colspan="4">Fathers' Name</th>
                            <th colspan="4">Mothers' Name</th>
                            <th>First Sponsor</th>
                            <th>Second Sponsor</th>
                            <th>Confirmation by</th>
                            <th colspan="3">Registration Book Detail</th>
                            <th>Priest</th>
                        </tr>
                    </thead>
                    <tbody id="confirmationListTable">
                        <!-- Keep it empty -->
                        <tr>
                            <td colspan="21">No Records Yet</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        // You can find this in general
        getConfirmationList('NA');
    });
</script>