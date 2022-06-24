<?php
include '../../includes/db_connect.php';

if (isset($_POST['filter'])) {
    $interns = $_POST['search_intern'];
    $programs = implode(', ', $_POST['search_programs']);
    $tasks = $_POST['search_task'];
    $startdate = $_POST['search_startdate'];
    $enddate = $_POST['search_endate'];
    $stats = implode(',', $stats = $_POST['search_stats']);
    $query = mysqli_query($conn, "UPDATE `filter_conds` SET ]
    `filter_interns`='$interns',`filter_tasks`='$tasks',
    `filter_start_date`='$startdate',`filter_end_date`='$enddate' WHERE `filter=id`=1 ");
}