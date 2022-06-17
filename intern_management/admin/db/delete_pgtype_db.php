<?php
include '../../includes/db_connect.php';
if (isset($_POST['pgtypeid'])) {

    $pgtype_id = $_POST['pgtypeid'];
    $query2 = "UPDATE `program_list`SET `pg_type_id`='6'WHERE `pg_type_id`=$pgtype_id";
    $query = "DELETE FROM `pg_type_list` WHERE `pg_type_id` = $pgtype_id";

    $run2 = mysqli_query($conn, $query2);
    $run = mysqli_query($conn, $query);

    if (($run2) && ($run)) {
        header('location:../settings.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    updatePG($pg_id);
}