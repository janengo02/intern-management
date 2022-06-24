<?php
include '../../includes/db_connect.php';

if (isset($_POST['pgid'])) {
    $pg_id = $_POST['pgid'];
    $pgtype = $_POST['pgtype'];
    $pgstartdate = $_POST['pgstartdate'];
    $pgenddate = $_POST['pgenddate'];
    $query2 = "UPDATE `program_list` SET `pg_type_id`='$pgtype',`pg_start_date`='$pgstartdate',
    `pg_end_date`='$pgenddate' WHERE `pg_id`=$pg_id";
    $query_run2 = mysqli_query($conn, $query2);

    if ($query_run2) {
        echo '<script> alert("Data Saved"); </script>';
        header('location:../index.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
} else {
    echo '<script> alert("Cannot reach"); </script>';
}