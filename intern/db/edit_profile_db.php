<?php
include '../../includes/db_connect.php';
session_start();
if (isset($_POST['editProfile'])) {
    $profile_id = $_POST['profileid'];
    $profile_name = $_POST['profilename'];
    $password = $_POST['password'];
    $avatar = $_FILES['avatar']['name'];
    $avatar_temp = $_FILES['avatar']['tmp_name'];
    $previous = $_POST['previous'];
    $exp = explode(".", $avatar);
    $end = end($exp);
    $name = $profile_name . "-" . time() . "." . $end;
    $path = "upload_avatar/" . $name;
    echo $path;
    echo $previous;
    if ($avatar != "") {
        $query = "UPDATE `interns` SET `name`='$profile_name',`avatar`='$path', `password`='$password'
        WHERE `intern_id`=$profile_id";
    } else {
        $query = "UPDATE `interns` SET `name`='$profile_name', `password`='$password'
        WHERE `intern_id`=$profile_id";
    }
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        move_uploaded_file($avatar_temp, "../../$path");
        if ($avatar != "") {
            unlink("../../" . $previous);
            $_SESSION['avatar'] = $path;
        }
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $profile_name;
        $_SESSION['password'] = $password;
        echo "<script>alert('User account updated!')</script>";
        header('location:../index.php');
    } else {
        echo "<script>alert('Data not saved')</script>";
    }
}