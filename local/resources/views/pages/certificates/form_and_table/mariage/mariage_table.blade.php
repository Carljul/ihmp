<div class="card">
    <div class="card-content">
        <div class="row">
            <div class="col s12 m6">
                <h5>Marriage Record</h5>
            </div>
            <div class="col s12 m6">
                <ul class="pagination right removeBottomMargin" id="paginationMarriage">
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col s12 fix_height_table" style="overflow-x: scroll;">
                <table class="marriage_group_table striped">
                    <thead>
                        <tr>
                            <th colspan="3">Actions</th>
                            <th colspan="14">Husbands Info</th>
                            <th colspan="14">Wifes Info</th>
                            <th colspan="3">Marriage Details</th>
                            <th colspan="4">Other Details</th>
                            <th>Priest</th>
                        </tr>
                    </thead>
                    <tbody id="marriageListTable">
                        <!-- Keep it empty -->
                        <tr>
                            <td colspan="37">No Records Yet</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        getMarriageList('NA');
    });
</script>