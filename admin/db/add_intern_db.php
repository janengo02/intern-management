<?php
include '../../includes/db_connect.php';

if (isset($_POST['addintern'])) {
    $intern_name = $_POST['intern_name'];
    $avatar = $_FILES['avatar']['name'];
    $avatar_temp = $_FILES['avatar']['tmp_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pgtype = $_POST['pgtype'];
    $pgstartdate = $_POST['pgstartdate'];
    $pgenddate = $_POST['pgenddate'];

    $exp = explode(".", $avatar);
    $end = end($exp);
    $name = $intern_name . "-" . time() . "." . $end;
    $path = "upload_avatar/" . $name;

    echo $path;
    $query = "INSERT INTO interns(`name`, `avatar`,`email`, `password`, `type`) VALUES ('$intern_name','$path','$email','$password','2')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $last_id = $conn->insert_id;
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $query2 = "INSERT INTO program_list(`intern_id`, `pg_type_id`, `pg_start_date`, `pg_end_date`, 
    `pg_status`) VALUES ('$last_id','$pgtype','$pgstartdate','$pgenddate','0')";
    $query_run2 = mysqli_query($conn, $query2);

    if ($query_run2) {
        $last_id = $conn->insert_id;
    } else {
        echo "Error: " . $query2 . "<br>" . $conn->error;
    }

    $query3 = "INSERT INTO task_list(`pg_id`, `task`,`status_id`) VALUES ('$last_id','No task','7')";
    $query_run3 = mysqli_query($conn, $query3);

    if (($query_run) && ($query_run2) && ($query_run3)) {
        move_uploaded_file($avatar_temp, "../../$path");
        echo '<script> alert("Data Saved"); </script>';
        header('location:../index.php');
    } else {
        echo '<script type="text/javascript"> ';
        echo '  if (confirm("Data not saved! User email already exists!")) {';
        echo '    document.location = "../index.php";';
        echo '}';
        echo '</script>';
    }
}