<?php
include '../../includes/db_connect.php';
include '../../includes/update_pg_stat.php';
if (isset($_POST['taskid'])) {
    $task_id = $_POST['taskid'];
    $pg_id = $_POST['pgid'];
    $taskstatus = $_POST['taskstatus'];

    $query = "UPDATE `task_list` SET `task_status`='$taskstatus'
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