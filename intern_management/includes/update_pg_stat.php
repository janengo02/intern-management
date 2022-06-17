<?php
//-------- -------------UPDATE PROGRAM STATUS--------------------------
function updatePG($pg_id)
{
	$total = 0;
	$done_n = 0;
	$blocked_n = 0;
	$todo_n = 0;
	include 'db_connect.php';
	$sql_t = mysqli_query($conn, "SELECT program_list.pg_id,
	program_list.pg_status,
	task_list.task_id,task_list.status_id
	FROM program_list LEFT JOIN task_list
	ON program_list.pg_id = task_list.pg_id
	WHERE task_list.pg_id=$pg_id");
	while ($row = $sql_t->fetch_assoc()) {
		$total++;
		// echo "----------------- <br>";
		// echo "id:", $row['task_id'], "<br>";
		// echo "status:", $row['task_status'], "<br>";
		if ($row['status_id'] == 2) {
			$done_n++;
		}
		// echo "total:", $total, "<br>";
		// echo "todo:", $todo_n, "<br>";
		// echo "blocked:", $blocked_n, "<br>";
		// echo "done:", $done_n, "<br>";
	}

	mysqli_query($conn, "UPDATE program_list SET pg_status=(($done_n/$total)*100)
			WHERE pg_id=$pg_id");
}