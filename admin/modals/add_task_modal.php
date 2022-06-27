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
	                        <input type="text" name="task" class="form-control" placeholder="Enter task's name" required>
	                    </div>
	                    <div class="mb-3">
	                        <label>Task Description</label>
	                        <textarea name="description" cols="53" rows="5" class="form-control"
	                            placeholder="Enter task's description"></textarea>
	                    </div>
	                    <div class="mb-3">
	                        <label>Start date</label>
	                        <input type="date" name="taskstartdate" class="form-control" required>
	                    </div>
	                    <div class="mb-3">
	                        <label>End date</label>
	                        <input type="date" name="taskenddate" class="form-control" required>
	                    </div>
	                </div>
	                <div class="modal-footer">
	                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
	                    <button type="submit" name="addtask" class="btn btn-primary">Add</button>
	                </div>
	            </form>
	        </div>
	    </div>
	</div>
	<script>