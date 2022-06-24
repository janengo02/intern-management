<?php
include '../../includes/db_connect.php';
include '../../includes/update_pg_stat.php';
if (isset($_POST['taskid'])) {

    $task_id = $_POST['taskid'];
    $pg_id = $_POST['pgid'];

    $query = "DELETE FROM `task_list` WHERE `task_id` = $task_id";
    $run = mysqli_query($conn, $query);
    // --------Add No task if deleted all tasks----------
    $sql_task = mysqli_query($conn, "SELECT * FROM task_list WHERE pg_id=$pg_id");
    $task_count = mysqli_num_rows($sql_task);
    echo $task_count;
    if ($task_count == 0) {
        $query3 = "INSERT INTO task_list(`pg_id`, `task`,`status_id`) VALUES ('$pg_id','No task','7')";
        $query_run3 = mysqli_query($conn, $query3);
    }


    if ($run) {
        header('location:../index.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    updatePG($pg_id);
}