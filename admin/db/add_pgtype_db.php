<?php
include '../../includes/db_connect.php';

if (isset($_POST['addpgtype'])) {
    $pgtype = $_POST['pgtype'];

    $query = "INSERT INTO `pg_type_list`(`pg_type`) 
    VALUES ('$pgtype')";
    $query_run = mysqli_query($conn, $query);


    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('location:../index.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}