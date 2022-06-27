<!--======== DELETE Status Modal========= -->
<div class="modal fade" id="statusdeleteModal<?php echo $stat_id[$i] ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Warning! </h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <form action="db/delete_status_db.php" method="POST">

                <div class="modal-body">

                    <input type="hidden" name="statusid" value="<?php echo $stat_id[$i] ?>">

                    All tasks that are labelled <b>"<?php echo $stat[$i]; ?>"</b> will be changed into "No
                    status".
                    <br>
                    Are you sure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="deletestatus" class="btn btn-primary">Delete</button>
                </div>
            </form>

        </div>
    </div>
</div>