<?php
include '../../includes/db_connect.php';
include '../../includes/update_pg_stat.php';

if (isset($_POST['addtask'])) {
    $pg_id = $_POST['pgid'];
    $task = $_POST['task'];
    $description = $_POST['description'];
    $task_start_date = $_POST['taskstartdate'];
    $task_end_date = $_POST['taskenddate'];

    $query = "INSERT INTO `task_list`(`pg_id`, `task`, `description`,`task_start_date`,`task_end_date`,`status_id`) 
    VALUES ('$pg_id','$task','$description','$task_start_date', '$task_end_date','7')";
    $query_run = mysqli_query($conn, $query);
    $query2 = "DELETE FROM `task_list` WHERE `pg_id`= '$pg_id' AND `task`='No task'";
    $query_run2 = mysqli_query($conn, $query2);


    if (($query_run) && ($query_run2)) {
        echo '<script> alert("Data Saved"); </script>';
        // header('Location: ../index.php');
        // header("location:javascript://history.go(-1)");
        header('location:../index.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
    updatePG($pg_id);
}