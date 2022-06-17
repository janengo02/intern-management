<?php
include '../../includes/db_connect.php';

if (isset($_POST['addstatus'])) {
    $status = $_POST['status'];

    $query = "INSERT INTO `status_list`(`status`) 
    VALUES ('$status')";
    $query_run = mysqli_query($conn, $query);


    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: ../settings.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}