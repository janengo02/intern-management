<?php
include '../../includes/db_connect.php';

if (isset($_POST['internid'])) {
    $intern_id = $_POST['internid'];
    $intern_name = $_POST['internname'];
    $avatar = $_FILES['avatar']['name'];
    $avatar_temp = $_FILES['avatar']['tmp_name'];
    $previous = $_POST['previous'];
    $password = $_POST['password'];
    $exp = explode(".", $avatar);
    $end = end($exp);
    $name = $intern_name . "-" . time() . "." . $end;
    $path = "upload_avatar/" . $name;

    $query = "UPDATE `interns` SET `password`='$password', `avatar`='$path'
    WHERE `intern_id`=$intern_id";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        move_uploaded_file($avatar_temp, "../../$path");
        unlink("../../" . $previous);
        header('location:../index.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
} else {
    echo '<script> alert("Cannot reach"); </script>';
}