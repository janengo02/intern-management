<!--======== INTERN TASK Modal========= -->
<?php
include '../includes/variances.php';
?>
<div class="modal fade" id="taskeditModal<?php echo $rows['task_id'] ?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> View Task </h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x"></i>
                </button>
            </div>

            <form action="db/edit_task_db.php" method="POST">

                <div class="modal-body">

                    <input type="hidden" name="taskid" value="<?php echo $rows['task_id'] ?>">
                    <input type="hidden" name="pgid" value="<?php echo $rows['pg_id'] ?>">

                    <div class="mb-3">
                        <label>Name: </label>
                        <?php echo "<b>" . $rows['name'] . "</b>" ?>
                    </div>
                    <div class="mb-3">
                        <label>Program: </label>
                        <?php echo "<b>" . $rows['pg_type'] . "</b>" ?>
                    </div>
                    <div class="mb-3">
                        <label>Task</label>
                        <input type="text" name="task" value="<?php echo $rows['task'] ?>" class="form-control"
                            placeholder="Enter task's name" disabled>
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" cols="53" rows="5" class="form-control"
                            placeholder="Enter task's description"
                            disabled><?php echo $rows['description'] ?></textarea>
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
                        <div class="selectWrapper">
                            <select class="selectBox" name="taskstatus">
                                <option value="<?php echo $rows['status_id'] ?>" selected hidden>
                                    <?php echo $rows['status']; ?></option>
                                <?php
                                $i = 0;
                                while ($i < $stat_count) {
                                ?>
                                <option value=" <?php echo $stat_id[$i]; ?>"><?php echo $stat[$i]; ?> </option>
                                <?php
                                    $i++;
                                }
                                ?>
                            </select>
                        </div>
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