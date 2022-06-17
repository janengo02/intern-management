<?php
include '../../includes/db_connect.php';
if (isset($_POST['statusid'])) {

    $status_id = $_POST['statusid'];
    $query2 = "UPDATE `task_list`SET `status_id`='7'WHERE `status_id`=$status_id";
    $query = "DELETE FROM `status_list` WHERE `status_id` = $status_id";

    $run2 = mysqli_query($conn, $query2);
    $run = mysqli_query($conn, $query);

    if (($run2) && ($run)) {
        header('location:../settings.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    updatePG($pg_id);
}