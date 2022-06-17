	<!--======== INTERN ADD Modal========= -->
	<?php
	include '../includes/variances.php';
	global $prev_pg, $prev_intern;

	$pg = "SELECT `pg_type_id` FROM `program_list` WHERE`pg_id` = $prev_pg";
	$result = mysqli_query($conn, $pg);
	$row = $result->fetch_assoc();
	$pg_type_id = $row['pg_type_id'];
	$i = 0;
	while ($i < $pgtype_count) {
		if ($pgtype_id[$i] == $pg_type_id) {
			break;
		}
		$i++;
	}
	$pg_type = $pgtype[$i];

	$intern = "SELECT `name` FROM `interns` WHERE`intern_id` = $prev_intern";
	$result2 = mysqli_query($conn, $intern);
	$row2 = $result2->fetch_assoc();
	$name = $row2['name'];
	?>
	<div class="modal fade" id="tasknaddModal2<?php echo $prev_pg ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
	    aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">ADD NEW TASK</h5>
	                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><i
	                        class="bi bi-x-lg"></i></button>
	            </div>
	            <form action="db/add_task_db.php" method="POST">
	                <div class="modal-body">

	                    <input type="hidden" name="pgid" value="<?php echo $prev_pg ?>">

	                    <div class="mb-3">
	                        <label>Name: </label>
	                        <b><?php echo $name ?></b>
	                    </div>
	                    <div class="mb-3">
	                        <label>Program: </label>
	                        <?php echo $pg_type ?>
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
	                        <input type="date" id="taskstartdate2" name="taskstartdate" class="form-control"
	                            onInput="validDates_addtask2()" required>
	                    </div>
	                    <div class="mb-3">
	                        <label>End date</label>
	                        <input type="date" name="taskenddate" id="taskenddate2" class="form-control"
	                            onInput="validDates_addtask2()" required>
	                    </div>
	                    <div class="alert alert-danger" role="alert" id="datealert_addtask2" style="display:none;">
	                        Start date must be before end date!
	                    </div>

	                </div>
	                <div class="modal-footer">
	                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
	                    <button type="submit" name="addtask" id="submit_addtask2" class="btn btn-primary">Add</button>
	                </div>
	            </form>
	        </div>
	    </div>
	</div>
	<script>
function validDates_addtask2() {
    var inputStartDate = document.getElementById("taskstartdate2").value;
    var inputEndDate = document.getElementById("taskenddate2").value;
    var showDateAlert = document.getElementById("datealert_addtask2");
    if ((inputStartDate != "") && (inputEndDate != "")) {
        if (inputStartDate > inputEndDate) {
            showDateAlert.style.display = 'block';
            document.getElementById("submit_addtask2").disabled = true;
        } else {
            showDateAlert.style.display = 'none';
            document.getElementById("submit_addtask2").disabled = false;
        }
    }
}
	</script>