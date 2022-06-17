	<!--======== INTERN ADD Modal========= -->
	<?php
	include '../includes/variances.php';
	?>
	<div class="modal fade" id="tasknaddModal<?php echo $rows['pg_id'] ?>" tabindex="-1"
	    aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">ADD NEW TASK</h5>
	                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><i
	                        class="bi bi-x-lg"></i></button>
	            </div>
	            <form action="db/add_task_db.php" method="POST">
	                <div class="modal-body">

	                    <input type="hidden" name="pgid" value="<?php echo $rows['pg_id'] ?>">

	                    <div class="mb-3">
	                        <label>Name: </label>
	                        <b><?php echo $rows['name'] ?></b>
	                    </div>
	                    <div class="mb-3">
	                        <label>Program: </label>
	                        <?php echo $rows['pg_type'] ?>
	                    </div>
	                    <div class="mb-3">
	                        <label>Task</label>
	                        <input type="text" name="task" class="form-control" placeholder="Enter task's name">
	                    </div>
	                    <div class="mb-3">
	                        <label>Task Description</label>
	                        <textarea name="description" cols="53" rows="5" class="form-control"
	                            placeholder="Enter task's description"></textarea>
	                    </div>
	                    <div class="mb-3">
	                        <label>Start date</label>
	                        <input type="date" id="taskstartdate" name="taskstartdate" class="form-control"
	                            onInput="validDates_addtask()" required>
	                    </div>
	                    <div class="mb-3">
	                        <label>End date</label>
	                        <input type="date" name="taskenddate" id="taskenddate" class="form-control"
	                            onInput="validDates_addtask()" required>
	                    </div>
	                    <div class="alert alert-danger" role="alert" id="datealert_addtask" style="display:none;">
	                        Start date must be before end date!
	                    </div>

	                </div>
	                <div class="modal-footer">
	                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
	                    <button type="submit" name="addtask" id="submit_addtask" class="btn btn-primary">Add</button>
	                </div>
	            </form>
	        </div>
	    </div>
	</div>
	<script>
function validDates_addtask() {
    var inputStartDate = document.getElementById("taskstartdate").value;
    var inputEndDate = document.getElementById("taskenddate").value;
    var showDateAlert = document.getElementById("datealert_addtask");
    if ((inputStartDate != "") && (inputEndDate != "")) {
        if (inputStartDate > inputEndDate) {
            showDateAlert.style.display = 'block';
            document.getElementById("submit_addtask").disabled = true;
        } else {
            showDateAlert.style.display = 'none';
            document.getElementById("submit_addtask").disabled = false;
        }
    }
}
	</script>