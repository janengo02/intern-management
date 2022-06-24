<?php
include '../../includes/db_connect.php';
if (isset($_POST['internid'])) {

     $intern_id = $_POST['internid'];

     $pg = "SELECT `pg_id` FROM `program_list` WHERE`intern_id` = $intern_id";
     $result = mysqli_query($conn, $pg);
     $row = $result->fetch_assoc();
     $pg_id = $row['pg_id'];

     $query3 = "DELETE FROM `task_list` WHERE `pg_id` = $pg_id";
     $run3 = mysqli_query($conn, $query3);

     $query = "DELETE FROM `program_list` WHERE `intern_id` = $intern_id";
     $run = mysqli_query($conn, $query);

     $query2 = "DELETE FROM `interns` WHERE `intern_id` = $intern_id";
     $run2 = mysqli_query($conn, $query2);

     if (($run) && ($run2) && ($run3)) {
          header('location:../index.php');
     } else {
          echo "Error: " . mysqli_error($conn);
     }
}