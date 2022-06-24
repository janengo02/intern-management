<?php
include '../../includes/db_connect.php';
include '../../includes/variances.php';
//--------------INTERN ASC-----------------
if (isset($_POST['internASC'])) {
    //uncheck
    if ($arrow[0] == "ASC") {
        $query = "UPDATE `sort` SET `name`='NO' WHERE `id`=1";
        $query_run = mysqli_query($conn, $query);
    }
    //check
    else if (($arrow[0] == "DESC") or ($arrow[0] == "NO")) {
        $query = "UPDATE `sort` SET `name`='ASC' WHERE `id`=1";
        $query_run = mysqli_query($conn, $query);
    }
    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('location:../index.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

//--------------INTERN DESC-----------------
if (isset($_POST['internDESC'])) {
    //uncheck
    if ($arrow[0] == "DESC") {
        $query = "UPDATE `sort` SET `name`='NO' WHERE `id`=1";
        $query_run = mysqli_query($conn, $query);
    }
    //check
    else if (($arrow[0] == "ASC") or ($arrow[0] == "NO")) {
        $query = "UPDATE `sort` SET `name`='DESC' WHERE `id`=1";
        $query_run = mysqli_query($conn, $query);
    }
    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('location:../index.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
//--------------PROGRAM ASC-----------------
if (isset($_POST['programASC'])) {
    //uncheck
    if ($arrow[1] == "ASC") {
        $query = "UPDATE `sort` SET `program`='NO' WHERE `id`=1";
        $query_run = mysqli_query($conn, $query);
    }
    //check
    else if (($arrow[1] == "DESC") or ($arrow[1] == "NO")) {
        $query = "UPDATE `sort` SET `program`='ASC' WHERE `id`=1";
        $query_run = mysqli_query($conn, $query);
    }
    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('location:../index.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

//--------------PROGRAM DESC-----------------
if (isset($_POST['programDESC'])) {
    //uncheck
    if ($arrow[1] == "DESC") {
        $query = "UPDATE `sort` SET `program`='NO' WHERE `id`=1";
        $query_run = mysqli_query($conn, $query);
    }
    //check
    else if (($arrow[1] == "ASC") or ($arrow[1] == "NO")) {
        $query = "UPDATE `sort` SET `program`='DESC' WHERE `id`=1";
        $query_run = mysqli_query($conn, $query);
    }
    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('location:../index.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
//--------------START DATE ASC-----------------
if (isset($_POST['startdateASC'])) {
    //uncheck
    if ($arrow[2] == "ASC") {
        $query = "UPDATE `sort` SET `start_date`='NO' WHERE `id`=1";
        $query_run = mysqli_query($conn, $query);
    }
    //check
    else if (($arrow[2] == "DESC") or ($arrow[2] == "NO")) {
        $query = "UPDATE `sort` SET `start_date`='ASC' WHERE `id`=1";
        $query_run = mysqli_query($conn, $query);
    }
    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('location:../index.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

//--------------START DATE DESC-----------------
if (isset($_POST['startdateDESC'])) {
    //uncheck
    if ($arrow[2] == "DESC") {
        $query = "UPDATE `sort` SET `start_date`='NO' WHERE `id`=1";
        $query_run = mysqli_query($conn, $query);
    }
    //check
    else if (($arrow[2] == "ASC") or ($arrow[2] == "NO")) {
        $query = "UPDATE `sort` SET `start_date`='DESC' WHERE `id`=1";
        $query_run = mysqli_query($conn, $query);
    }
    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('location:../index.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
//--------------END DATE ASC-----------------
if (isset($_POST['enddateASC'])) {
    //uncheck
    if ($arrow[3] == "ASC") {
        $query = "UPDATE `sort` SET `end_date`='NO' WHERE `id`=1";
        $query_run = mysqli_query($conn, $query);
    }
    //check
    else if (($arrow[3] == "DESC") or ($arrow[3] == "NO")) {
        $query = "UPDATE `sort` SET `end_date`='ASC' WHERE `id`=1";
        $query_run = mysqli_query($conn, $query);
    }
    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('location:../index.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

//--------------START DATE DESC-----------------
if (isset($_POST['enddateDESC'])) {
    //uncheck
    if ($arrow[3] == "DESC") {
        $query = "UPDATE `sort` SET `end_date`='NO' WHERE `id`=1";
        $query_run = mysqli_query($conn, $query);
    }
    //check
    else if (($arrow[3] == "ASC") or ($arrow[3] == "NO")) {
        $query = "UPDATE `sort` SET `end_date`='DESC' WHERE `id`=1";
        $query_run = mysqli_query($conn, $query);
    }
    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('location:../index.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
//--------------STATUS ASC-----------------
if (isset($_POST['statusASC'])) {
    //uncheck
    if ($arrow[4] == "ASC") {
        $query = "UPDATE `sort` SET `status`='NO' WHERE `id`=1";
        $query_run = mysqli_query($conn, $query);
    }
    //check
    else if (($arrow[4] == "DESC") or ($arrow[4] == "NO")) {
        $query = "UPDATE `sort` SET `status`='ASC' WHERE `id`=1";
        $query_run = mysqli_query($conn, $query);
    }
    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('location:../index.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

//--------------STATUS DESC-----------------
if (isset($_POST['statusDESC'])) {
    //uncheck
    if ($arrow[4] == "DESC") {
        $query = "UPDATE `sort` SET `status`='NO' WHERE `id`=1";
        $query_run = mysqli_query($conn, $query);
    }
    //check
    else if (($arrow[4] == "ASC") or ($arrow[4] == "NO")) {
        $query = "UPDATE `sort` SET `status`='DESC' WHERE `id`=1";
        $query_run = mysqli_query($conn, $query);
    }
    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('location:../index.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}