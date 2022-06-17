<!--======== INTERN TASK Modal========= -->
<?php
include '../includes/variances.php';
?>
<div class="modal fade" id="taskeditModal<?php echo $rows['task_id'] ?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> TASK'S DETAILS </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>

            <form action="db/edit_task_db.php" method="POST">

                <div class="modal-body">

                    <input type="hidden" name="taskid" value="<?php echo $rows['task_id'] ?>">
                    <input type="hidden" name="pgid" value="<?php echo $rows['pg_id'] ?>">
                    <div class="mb-3">
                        <label>Task</label>
                        <input type="text" name="task" value="<?php echo $rows['task'] ?>" class="form-control"
                            placeholder="Enter task's name" disabled>
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" cols="53" rows="5" class="form-control"
                            placeholder="Enter task's description"
                            disabled><?php echo $rows['description'] ?> </textarea>
                    </div>
                    <div class="mb-3">
                        <label>Start date</label>
                        <input type="date" name="taskstartdate" value="<?php echo $rows['task_start_date'] ?>"
                            class="form-control" disabled>
                    </div>
                    <div class="mb-3">
                        <label>End date</label>
                        <input type="date" name="taskenddate" value="<?php echo $rows['task_end_date'] ?>"
                            class="form-control" disabled>
                    </div>
                    <div class="form-select form-select-lg mb-3">
                        <label>Status</label><br>
                        <select name="taskstatus">
                            <option selected value="<?php echo $rows['task_status'] ?>">
                                <?php echo $stat[$rows['task_status'] - 1] ?></option>
                            <option value="1">To-do</option>
                            <option value="2">On-Progress</option>
                            <option value="3">Blocked</option>
                            <option value="4">Done</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="editintern" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>