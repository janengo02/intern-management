<!--======== DELETE Task Modal========= -->
<div class="modal fade" id="taskdeleteModal<?php echo $rows['task_id'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Warning! </h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <form action="db/delete_task_db.php" method="POST">

                <div class="modal-body">

                    <input type="hidden" name="taskid" value="<?php echo $rows['task_id'] ?>">
                    <input type="hidden" name="pgid" value="<?php echo $rows['pg_id'] ?>">

                    This task will be deleted permanently.
                    <br>
                    Are you sure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="deleteintern" class="btn btn-primary">Delete</button>
                </div>
            </form>

        </div>
    </div>
</div>