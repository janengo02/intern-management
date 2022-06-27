<?php
include '../../includes/db_connect.php';

if (isset($_POST['filter'])) {
    $tasks = $_POST['search_task'];
    $startdate = $_POST['search_startdate'];
    $enddate = $_POST['search_enddate'];
    if (($enddate == "") || ($enddate == "0000-00-00")) {
        $enddate = "9999-12-31";
    }

    $query = mysqli_query($conn, "UPDATE `filter_conds` SET
    `filter_tasks`='$tasks',
    `filter_start_date`='$startdate',`filter_end_date`='$enddate' WHERE `filter_id`=1 ");
    $query_run = mysqli_query($conn, $query);



    $stats = implode(',', $stats = $_POST['search_stats']);
    $query2 = mysqli_query($conn, "UPDATE `status_list` SET 
    `filter_status`='checked' WHERE `status_id` IN (" . $stats . ")");
    $query3 = mysqli_query($conn, "UPDATE `status_list` SET 
    `filter_status`='' WHERE NOT `status_id` IN (" . $stats . ")");
    $query_run2 = mysqli_query($conn, $query2);
    $query_run3 = mysqli_query($conn, $query3);


    header('location:../index.php');
}