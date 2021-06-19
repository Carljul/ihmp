<div class="card">
    <div class="card-content">
        <div class="row">
            <div class="col s12 m6">
                <h5>Birth Record</h5>
            </div>
            <div class="col s12 m6">
                <ul class="pagination right removeBottomMargin" id="paginationBirth">
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col s12 fix_height_table" style="overflow-x: scroll;">
                <table class="birth_group_table striped">
                    <thead>
                        <tr>
                            <th colspan="3">Actions</th>
                            <th>Born On</th>
                            <th colspan="3">Record of</th>
                            <th>Born In</th>
                            <th colspan="3">Fathers Name</th>
                            <th colspan="3">Mothers Name</th>
                            <th>Residents of</th>
                            <th>Godparents</th>
                            <th colspan="4">Other Details</th>
                            <th>Parish Priest</th>
                        </tr>
                    </thead>
                    <tbody id="birthListTable">
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
        getBirthList('NA');
    });
</script>