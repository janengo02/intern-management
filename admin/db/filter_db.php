<?php
include '../../includes/db_connect.php';

if (isset($_POST['filter'])) {
    $interns = $_POST['search_intern'];
    $tasks = $_POST['search_task'];
    $startdate = $_POST['search_startdate'];
    $enddate = $_POST['search_enddate'];
    if (($enddate == "") || ($enddate == "0000-00-00")) {
        $enddate = "9999-12-31";
    }

    $query = mysqli_query($conn, "UPDATE `filter_conds` SET
    `filter_interns`='$interns',`filter_tasks`='$tasks',
    `filter_start_date`='$startdate',`filter_end_date`='$enddate' WHERE `filter_id`=1 ");
    $query_run = mysqli_query($conn, $query);



    $stats = implode(',', $stats = $_POST['search_stats']);
    $query2 = mysqli_query($conn, "UPDATE `status_list` SET 
    `filter_status`='checked' WHERE `status_id` IN (" . $stats . ")");
    $query3 = mysqli_query($conn, "UPDATE `status_list` SET 
    `filter_status`='' WHERE NOT `status_id` IN (" . $stats . ")");
    $query_run2 = mysqli_query($conn, $query2);
    $query_run3 = mysqli_query($conn, $query3);


    $programs = implode(', ', $_POST['search_programs']);
    $query4 = mysqli_query($conn, "UPDATE `pg_type_list` SET 
`filter_pg`='checked' WHERE `pg_type_id` IN (" . $programs . ")");
    $query5 = mysqli_query($conn, "UPDATE `pg_type_list` SET 
`filter_pg`='' WHERE NOT `pg_type_id` IN (" . $programs . ")");
    $query_run4 = mysqli_query($conn, $query4);
    $query_run5 = mysqli_query($conn, $query5);

    header('location:../index.php');
}