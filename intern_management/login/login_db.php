<?php
include '../includes/db_connect.php';
session_start();
if (!$conn) {
    die("Unable to connect");
}
if ($_POST) {
    $email = $_POST["email"];
    $pass = $_POST["password"];
    //Making sure that SQL Injection doesn't work
    $email = mysqli_real_escape_string($conn, $email); //test or 1=1
    $pass = mysqli_real_escape_string($conn, $pass);
    $sql = "SELECT * FROM `interns` WHERE `email` = '$email' AND `password` = '$pass'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if ($row['type'] == "2") {
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name'];
        $_SESSION['avatar'] = $row['avatar'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['profile_id'] = $row['intern_id'];
        header("location:../intern/index.php");
    } elseif ($row['type'] == "1") {
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name'];
        $_SESSION['avatar'] = $row['avatar'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['profile_id'] = $row['intern_id'];
        header("location:../admin/index.php");
    } else {
        header("location:../login/index.php");
        echo "Incorrect email or password";
    }
}