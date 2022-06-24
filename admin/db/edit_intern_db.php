<?php
include '../../includes/db_connect.php';
if (isset($_POST['internid'])) {
    $intern_id = $_POST['internid'];
    $intern_name = $_POST['internname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $avatar = $_FILES['avatar']['name'];
    $avatar_temp = $_FILES['avatar']['tmp_name'];
    $previous = $_POST['previous'];
    $exp = explode(".", $avatar);
    $end = end($exp);
    $name = $intern_name . "-" . time() . "." . $end;
    $path = "upload_avatar/" . $name;
    if ($avatar != "") {
        $query = "UPDATE `interns` SET `name`='$intern_name',`avatar`='$path', `email`='$email', `password`='$password'
        WHERE `intern_id`=$intern_id";
    } else {
        $query = "UPDATE `interns` SET `name`='$intern_name', `email`='$email', `password`='$password'
        WHERE `intern_id`=$intern_id";
    }
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        move_uploaded_file($avatar_temp, "../../$path");
        if ($avatar != "") {
            unlink("../../" . $previous);
        }
        echo "<script>alert('User account updated!')</script>";
        header('location:../index.php');
    } else {
        echo "<script>alert('Data not saved')</script>";
    }
}