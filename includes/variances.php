<?php
include 'db_connect.php';

$login_email = $_SESSION['email'];
$login_name = $_SESSION['name'];
$login_avatar = $_SESSION['avatar'];
$login_password = $_SESSION['password'];
$login_id = $_SESSION['profile_id'];

$role = array("Admin", "Intern");
// STATUS LIST
$sql_stat = mysqli_query($conn, "SELECT * FROM status_list ORDER BY status_list.status_id");
$stat_id = [];
$stat = [];
$stat_check = [];
$stat_count = 0;
$search_stats = "";
while ($row_stat = mysqli_fetch_array($sql_stat)) {
    $stat[$stat_count] = $row_stat['status'];
    $stat_id[$stat_count] = $row_stat['status_id'];
    $stat_check[$stat_count] = $row_stat['filter_status'];
    if ($row_stat['filter_status'] == "checked") {
        $search_stats .= $row_stat['status_id'] . ",";
    }
    $stat_count++;
}
$search_stats = substr_replace($search_stats, "", -1);
// PG TYPE LIST
$sql_pgtype = mysqli_query($conn, "SELECT * FROM pg_type_list ORDER BY pg_type_id");
$pgtype_id = [];
$pgtype = [];
$pgtype_check = [];
$pgtype_count = 0;
$search_programs = "";
while ($row_pgtype = mysqli_fetch_array($sql_pgtype)) {
    $pgtype[$pgtype_count] = $row_pgtype['pg_type'];
    $pgtype_id[$pgtype_count] = $row_pgtype['pg_type_id'];
    $pgtype_check[$pgtype_count] = $row_pgtype['filter_pg'];
    if ($row_pgtype['filter_pg'] == "checked") {
        $search_programs .= $row_pgtype['pg_type_id'] . ",";
    }
    $pgtype_count++;
}
$search_programs = substr_replace($search_programs, "", -1);

//FILTER CONDITIONS
$sql_filter = mysqli_query($conn, "SELECT * FROM filter_conds");
while ($row_filter = mysqli_fetch_array($sql_filter)) {
    $search_intern = $row_filter['filter_interns'];
    $search_task = $row_filter['filter_tasks'];
    $search_startdate = $row_filter['filter_start_date'];
    $search_enddate = $row_filter['filter_end_date'];
}


//SORTING CONDITIONS
$sql_sorting = mysqli_query($conn, "SELECT * FROM sort");
$sorting = [];
$arrow = [];
$sorting[0] = "";
$sorting[1] = "";
$sorting[2] = "";
$sorting[3] = "";
$sorting[4] = "";
$sorting[5] = "";
$sorting[6] = "";

while ($row_sorting = mysqli_fetch_array($sql_sorting)) {
    if ($row_sorting['name'] != "NO") {
        $sorting[0] = "interns.name " . $row_sorting['name'];
    }
    if ($row_sorting['program'] != "NO") {
        $sorting[1] = "pg_type_list.pg_type " . $row_sorting['program'];
    }
    if ($row_sorting['start_date'] != "NO") {
        $sorting[2] = "program_list.pg_start_date " . $row_sorting['start_date'];
        $sorting[4] = "task_list.task_start_date " . $row_sorting['start_date'];
    }
    if ($row_sorting['end_date'] != "NO") {
        $sorting[3] = "program_list.pg_end_date " . $row_sorting['end_date'];
        $sorting[5] = "task_list.task_end_date " . $row_sorting['end_date'];
    }
    if ($row_sorting['status'] != "NO") {
        $sorting[6] = "status_list.status " . $row_sorting['status'];
    }

    $arrow[0] = $row_sorting['name'];
    $arrow[1] = $row_sorting['program'];
    $arrow[2] = $row_sorting['start_date'];
    $arrow[3] = $row_sorting['end_date'];
    $arrow[4] = $row_sorting['status'];
}
$i = 0;
$sorting_conditions = "";
while ($i <= 3) {
    if ($sorting[$i] != "") {
        $sorting_conditions .= $sorting[$i] . ",";
    }
    $i++;
}
$sorting_conditions .= "interns.intern_id DESC,";
while ($i <= 6) {
    if ($sorting[$i] != "") {
        $sorting_conditions .= $sorting[$i] . ",";
    }
    $i++;
}
$sorting_conditions .= "interns.intern_id DESC, task_list.task_end_date ASC";
// $sorting_conditions = substr($sorting_conditions, 0, -1);
//echo "---------------------------------------------------" . $sorting_conditions;