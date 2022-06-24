<?php
include '../../includes/db_connect.php';
include '../../includes/update_pg_stat.php';
if (isset($_POST['taskid'])) {
    $task_id = mysqli_real_escape_string($conn, $_POST['taskid']);
    $pg_id =  mysqli_real_escape_string($conn, $_POST['pgid']);
    $task =  mysqli_real_escape_string($conn, $_POST['task']);
    $description =  mysqli_real_escape_string($conn, $_POST['description']);
    $taskstartdate = $_POST['taskstartdate'];
    $taskenddate = $_POST['taskenddate'];
    $taskstatus = $_POST['taskstatus'];

    $query = "UPDATE `task_list` SET `task`='$task', `description`='$description', 
    `task_start_date`='$taskstartdate', `task_end_date`='$taskenddate',`status_id`='$taskstatus'
    WHERE `task_id`=$task_id";

    $query_run = mysqli_query($conn, $query);


    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('location:../index.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
    updatePG($pg_id);
} else {
    echo '<script> alert("Cannot reach"); </script>';
}