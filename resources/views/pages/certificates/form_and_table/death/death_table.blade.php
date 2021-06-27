<div class="card">
    <div class="card-content">
        <div class="row">
            <div class="col s12 m6">
                <h5>Death Record</h5>
            </div>
            <div class="col s12 m6">
                <ul class="pagination right removeBottomMargin" id="paginationDeath">
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col s12 fix_height_table" style="overflow-x: scroll;">
                <table class="death_group_table striped">
                    <thead>
                        <tr>
                            <th colspan="3">Actions</th>
                            <th colspan="3">Decease Name</th>
                            <th colspan="10">Other Info</th>
                            <th>Priest Name</th>
                        </tr>
                    </thead>
                    <tbody id="deathListTable">
                        <!-- Keep it empty -->
                        <tr>
                            <td colspan="18">No Records Yet</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        getDeathList('NA');
    });
</script>