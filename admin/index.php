<?php
include '../includes/db_connect.php';
include '../includes/update_pg_stat.php';

session_start();

if (!isset($_SESSION['email'])) {
    header("location:../login/index.php");
}

include '../includes/variances.php';

// ------------------------
$sql = mysqli_query($conn, "SELECT interns.intern_id,interns.name, interns.email, 
    interns.password,interns.avatar,
    program_list.pg_id,
    program_list.pg_start_date,program_list.pg_end_date,
    program_list.pg_status, program_list.pg_type_id,
    pg_type_list.pg_type,
    task_list.task_id, task_list.task, task_list.description, 
    task_list.task_start_date, task_list.task_end_date,
    task_list.status_id,  status_list.status
    FROM interns LEFT JOIN program_list 
    ON interns.intern_id=program_list.intern_id 
    LEFT JOIN task_list
    ON  task_list.pg_id = program_list.pg_id
    LEFT JOIN status_list
    ON status_list.status_id = task_list.status_id
    LEFT JOIN pg_type_list
    ON program_list.pg_type_id = pg_type_list.pg_type_id
    WHERE NOT interns.type = 1 
        AND (interns.name LIKE '%$search_intern%')
        AND (task_list.task LIKE '%$search_task%')
        AND (((DATE(task_list.task_start_date) >= '$search_startdate') OR (DATE(program_list.pg_start_date) >= '$search_startdate'))
        AND ((DATE(task_list.task_end_date)<='$search_enddate') OR (DATE(program_list.pg_end_date)<='$search_enddate')))
        
        AND (program_list.pg_type_id IN (" . $search_programs . "))
        AND (task_list.status_id IN (" . $search_stats . "))

    ORDER BY $sorting_conditions");
//---------------------UPDATE TASK STATUS----------------------------
if (isset($_GET['status_id']) && isset($_GET['task_id']) && isset($_GET['pg_id'])) {
    $task_id = $_GET['task_id'];
    $status_id = $_GET['status_id'];
    $pg_id = $_GET['pg_id'];
    mysqli_query($conn, "UPDATE task_list SET status_id=$status_id 
        WHERE task_id=$task_id");
    updatePG($pg_id);
    header('location:index.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Intern Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <?php
    include 'includes/side_menu.php';
    include '../style.css'; ?>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-grid-alt'></i>
            <a href="./index.php" class="text">DashBoard</a>
        </div>
        <div class=mainContent>
            <table>
                <tr>
                    <th></th>
                    <th>
                        <!---ADD NEW INTERN-->
                        <div name="addbtn">
                            <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                data-bs-target="#internaddModal">
                                <i class="bi bi-person-plus"></i>
                            </button>
                            <?php
                            include 'modals/add_intern_modal.php';
                            ?>
                        </div>

                        <!------------------->
                    </th>

                    <th>Intern
                        <form action="db/sort_db.php" method="POST" class="sortform">
                            <?php
                            if ($arrow[0] == "ASC") {
                            ?>
                            <button type="submit" name="internASC" class="mybtn"> <i
                                    class='bx bxs-up-arrow'></i></button>
                            <button type="submit" name="internDESC" class="mybtn"> <i
                                    class='bx bx-down-arrow'></i></button>
                            <?php
                            } else if ($arrow[0] == "DESC") {
                            ?>
                            <button type="submit" name="internASC" class="mybtn"> <i
                                    class='bx bx-up-arrow'></i></button>
                            <button type="submit" name="internDESC" class="mybtn"> <i
                                    class='bx bxs-down-arrow'></i></button>
                            <?php
                            } else if ($arrow[0] == "NO") {
                            ?>
                            <button type="submit" name="internASC" class="mybtn"> <i
                                    class='bx bx-up-arrow'></i></button>
                            <button type="submit" name="internDESC" class="mybtn"> <i
                                    class='bx bx-down-arrow'></i></button>
                            <?php
                            }
                            ?>
                        </form>
                    </th>
                    <th>Program
                        <form action="db/sort_db.php" method="POST" class="sortform">
                            <?php
                            if ($arrow[1] == "ASC") {
                            ?>
                            <button type="submit" name="programASC" class="mybtn"> <i
                                    class='bx bxs-up-arrow'></i></button>
                            <button type="submit" name="programDESC" class="mybtn"> <i
                                    class='bx bx-down-arrow'></i></button>
                            <?php
                            } else if ($arrow[1] == "DESC") {
                            ?>
                            <button type="submit" name="programASC" class="mybtn"> <i
                                    class='bx bx-up-arrow'></i></button>
                            <button type="submit" name="programDESC" class="mybtn"> <i
                                    class='bx bxs-down-arrow'></i></button>
                            <?php
                            } else if ($arrow[1] == "NO") {
                            ?>
                            <button type="submit" name="programASC" class="mybtn"> <i
                                    class='bx bx-up-arrow'></i></button>
                            <button type="submit" name="programDESC" class="mybtn"> <i
                                    class='bx bx-down-arrow'></i></button>
                            <?php
                            }
                            ?>
                        </form>
                    </th>
                    <th>Start date
                        <form action="db/sort_db.php" method="POST" class="sortform">
                            <?php
                            if ($arrow[2] == "ASC") {
                            ?>
                            <button type="submit" name="startdateASC" class="mybtn"> <i
                                    class='bx bxs-up-arrow'></i></button>
                            <button type="submit" name="startdateDESC" class="mybtn"> <i
                                    class='bx bx-down-arrow'></i></button>
                            <?php
                            } else if ($arrow[2] == "DESC") {
                            ?>
                            <button type="submit" name="startdateASC" class="mybtn"> <i
                                    class='bx bx-up-arrow'></i></button>
                            <button type="submit" name="startdateDESC" class="mybtn"> <i
                                    class='bx bxs-down-arrow'></i></button>
                            <?php
                            } else if ($arrow[2] == "NO") {
                            ?>
                            <button type="submit" name="startdateASC" class="mybtn"> <i
                                    class='bx bx-up-arrow'></i></button>
                            <button type="submit" name="startdateDESC" class="mybtn"> <i
                                    class='bx bx-down-arrow'></i></button>
                            <?php
                            }
                            ?>
                        </form>
                    </th>
                    <th>End date
                        <form action="db/sort_db.php" method="POST" class="sortform">
                            <?php
                            if ($arrow[3] == "ASC") {
                            ?>
                            <button type="submit" name="enddateASC" class="mybtn"> <i
                                    class='bx bxs-up-arrow'></i></button>
                            <button type="submit" name="enddateDESC" class="mybtn"> <i
                                    class='bx bx-down-arrow'></i></button>
                            <?php
                            } else if ($arrow[3] == "DESC") {
                            ?>
                            <button type="submit" name="enddateASC" class="mybtn"> <i
                                    class='bx bx-up-arrow'></i></button>
                            <button type="submit" name="enddateDESC" class="mybtn"> <i
                                    class='bx bxs-down-arrow'></i></button>
                            <?php
                            } else if ($arrow[3] == "NO") {
                            ?>
                            <button type="submit" name="enddateASC" class="mybtn"> <i
                                    class='bx bx-up-arrow'></i></button>
                            <button type="submit" name="enddateDESC" class="mybtn"> <i
                                    class='bx bx-down-arrow'></i></button>
                            <?php
                            }
                            ?>
                        </form>
                    </th>
                    <th>Status
                        <form action="db/sort_db.php" method="POST" class="sortform">
                            <?php
                            if ($arrow[4] == "ASC") {
                            ?>
                            <button type="submit" name="statusASC" class="mybtn"> <i
                                    class='bx bxs-up-arrow'></i></button>
                            <button type="submit" name="statusDESC" class="mybtn"> <i
                                    class='bx bx-down-arrow'></i></button>
                            <?php
                            } else if ($arrow[4] == "DESC") {
                            ?>
                            <button type="submit" name="statusASC" class="mybtn"> <i
                                    class='bx bx-up-arrow'></i></button>
                            <button type="submit" name="statusDESC" class="mybtn"> <i
                                    class='bx bxs-down-arrow'></i></button>
                            <?php
                            } else if ($arrow[4] == "NO") {
                            ?>
                            <button type="submit" name="statusASC" class="mybtn"> <i
                                    class='bx bx-up-arrow'></i></button>
                            <button type="submit" name="statusDESC" class="mybtn"> <i
                                    class='bx bx-down-arrow'></i></button>
                            <?php
                            }
                            ?>
                        </form>
                    </th>
                </tr>
                <!-- PHP CODE TO FETCH DATA FROM ROWS-->
                <?php // LOOP TILL END OF DATA
                $prev_intern = 0;
                $prev_pg = 0;
                $db_row_n = mysqli_num_rows($sql);
                $row_count = 0;
                while ($rows = $sql->fetch_assoc()) {
                ?>
                <!-- + Add new task to prev pg -->
                <?php
                    $row_count++;
                    if (($rows['intern_id'] != $prev_intern) && ($prev_intern != 0)) {
                    ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                            data-bs-target="#tasknaddModal2<?php echo $prev_pg ?>">
                            <i class="bi bi-plus-square-dotted"></i> New task</button>
                        <?php include 'modals/add_task_modal2.php' ?>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                    }
                    ?>
                <tr>
                    <!------... intern------>
                    <td>
                        <?php
                            if ($rows['intern_id'] != $prev_intern) {
                            ?>
                        <button class="btn btn-outline-light" type="button" data-bs-toggle="modal"
                            data-bs-target="#interndeleteModal<?php echo $rows['intern_id'] ?>">
                            <i class="bi bi-trash"></i></button>
                        <?php
                                include 'modals/delete_intern_modal.php';
                            } else {
                                echo "";
                            }
                            ?>
                    </td>
                    <!-----AVATAR----->
                    <td>
                        <?php
                            if ($rows['intern_id'] != $prev_intern) {
                            ?>
                        <img src="<?php echo "../" . $rows['avatar'] ?>" class="avatar" />
                        <?php
                            } else {
                                echo "";
                            }
                            ?>
                    </td>
                    <!-----INTERN NAME----->
                    <td>
                        <?php
                            if ($rows['intern_id'] != $prev_intern) {
                            ?>
                        <button class="databtn databtnhead" type="button" data-bs-toggle="modal"
                            data-bs-target="#interneditModal<?php echo $rows['intern_id'] ?>">
                            <?php echo $rows['name'] ?></button>
                        <?php
                                include 'modals/edit_intern_modal.php';
                                $prev_intern = $rows['intern_id'];
                                $prev_pg = 0;
                            }
                            ?>
                    </td>
                    <!-----PROGRAM/TASK----->
                    <td>
                        <?php
                            if ($rows['pg_id'] != $prev_pg) {
                            ?>
                        <button class="databtn databtnhead" type="button" data-bs-toggle="modal"
                            data-bs-target="#programeditModal<?php echo $rows['pg_id'] ?>">
                            <?php echo $rows['pg_type'] ?></button>
                        <?php
                                include 'modals/edit_program_modal.php';
                            } else {
                            ?>
                        <!-- ...task -->
                        <button class="btn btn-outline-light" type="button" data-bs-toggle="modal"
                            data-bs-target="#taskdeleteModal<?php echo $rows['task_id'] ?>">
                            <i class="bi bi-trash"></i></button>
                        <?php
                                include 'modals/delete_task_modal.php';
                                ?>
                        <!-- task -->
                        <button class="databtn" type="button" data-bs-toggle="modal"
                            data-bs-target="#taskeditModal<?php echo $rows['task_id'] ?>">
                            <?php echo $rows['task'] ?></button>
                        <?php
                                include 'modals/edit_task_modal.php';
                            }
                            ?>
                    </td>
                    <!-----START DATE----->
                    <td>
                        <?php
                            if ($rows['pg_id'] != $prev_pg) {
                            ?>
                        <button class="databtn databtnhead" type="button" data-bs-toggle="modal"
                            data-bs-target="#programeditModal<?php echo $rows['pg_id'] ?>">
                            <?php echo $rows['pg_start_date'] ?></button>
                        <?php
                                include 'modals/edit_program_modal.php';
                            } else {
                            ?>
                        <button class="databtn" type="button" data-bs-toggle="modal"
                            data-bs-target="#taskeditModal<?php echo $rows['task_id'] ?>">
                            <?php echo $rows['task_start_date'] ?></button>
                        <?php
                                include 'modals/edit_task_modal.php';
                            }
                            ?>
                    </td>
                    <!-----END DATE----->
                    <td>
                        <?php
                            if ($rows['pg_id'] != $prev_pg) {
                            ?>
                        <button class="databtn databtnhead" type="button" data-bs-toggle="modal"
                            data-bs-target="#programeditModal<?php echo $rows['pg_id'] ?>">
                            <?php echo $rows['pg_end_date'] ?></button>
                        <?php
                                include 'modals/edit_program_modal.php';
                                if ($rows['pg_end_date'] < $rows['pg_start_date']) {
                                ?>
                        <button type="button" class="warningbtn" data-bs-toggle="tooltip" data-bs-placement="right"
                            title="End Date must be after Start Date!">
                            <i class='bx bxs-error-circle bx-xs'></i>
                        </button>
                        <?php
                                }
                            } else {
                                ?>
                        <button class="databtn" type="button" data-bs-toggle="modal"
                            data-bs-target="#taskeditModal<?php echo $rows['task_id'] ?>">
                            <?php echo $rows['task_end_date'] ?></button>
                        <?php
                                include 'modals/edit_task_modal.php';
                                if (($rows['task_end_date'] < $rows['task_start_date']) || ($rows['task_start_date'] < $rows['pg_start_date']) || ($rows['task_end_date'] > $rows['pg_end_date'])) {
                                ?>
                        <button type="button" class="warningbtn" data-bs-toggle="tooltip" data-bs-placement="right"
                            title="
                                    <?php
                                    if ($rows['task_end_date'] < $rows['task_start_date']) {
                                        echo "End Date must be after Start Date!";
                                    }
                                    if (($rows['task_start_date'] < $rows['pg_start_date']) || ($rows['task_end_date'] > $rows['pg_end_date'])) {
                                        echo "Task's dates must be within the program's period!";
                                    }
                                    ?>
                                ">
                            <i class='bx bxs-error-circle bx-xs'></i>
                        </button>
                        <?php
                                }
                            }
                            ?>
                    </td>
                    <!-----STATUS----->
                    <td>
                        <?php
                            if ($rows['pg_id'] != $prev_pg) {
                            ?>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar"
                                style="width:<?php echo $rows['pg_status'] . '%' ?>">
                                <?php echo (round($rows['pg_status'], 1)) . '%' ?></div>
                        </div>
                        <?php
                                $prev_pg = $rows['pg_id'];
                                if ($rows['task'] != NULL) {
                                ?>
                        <!-- 1st task row -->
                <tr>
                    <td><?php echo ""; ?></td>
                    <td><?php echo ""; ?></td>
                    <td>
                        <?php
                                    if ($rows['task'] == 'No task') {
                                        echo "";
                                    }
                            ?>
                    </td>
                    <td><?php
                                    if ($rows['task'] == 'No task') {
                                        echo "<i>No task</i>";
                                    } else {
                            ?>
                        <button class="btn btn-outline-light" type="button" data-bs-toggle="modal"
                            data-bs-target="#taskdeleteModal<?php echo $rows['task_id'] ?>">
                            <i class="bi bi-trash"></i></button>

                        <?php

                                        include 'modals/delete_task_modal.php';
                                ?>
                        <button class="databtn" type="button" data-bs-toggle="modal"
                            data-bs-target="#taskeditModal<?php echo $rows['task_id'] ?>">
                            <?php echo $rows['task'] ?></button>
                        <?php
                                        include 'modals/edit_task_modal.php';
                                    }
                            ?>
                    </td>
                    <td>
                        <?php
                                    if ($rows['task'] == 'No task') {
                                        echo "";
                                    } else {
                            ?>
                        <button class="databtn" type="button" data-bs-toggle="modal"
                            data-bs-target="#taskeditModal<?php echo $rows['task_id'] ?>">
                            <?php echo $rows['task_start_date'] ?></button>
                        <?php
                                        include 'modals/edit_task_modal.php';
                                    }
                            ?>
                    </td>
                    <td>
                        <?php
                                    if ($rows['task'] == 'No task') {
                                        echo "";
                                    } else {
                            ?>
                        <button class="databtn" type="button" data-bs-toggle="modal"
                            data-bs-target="#taskeditModal<?php echo $rows['task_id'] ?>">
                            <?php echo $rows['task_end_date'] ?></button>
                        <?php
                                        include 'modals/edit_task_modal.php';

                                        if (($rows['task_end_date'] < $rows['task_start_date']) || ($rows['task_start_date'] < $rows['pg_start_date']) || ($rows['task_end_date'] > $rows['pg_end_date'])) {
                                ?>
                        <button type="button" class="warningbtn" data-bs-toggle="tooltip" data-bs-placement="right"
                            title="
                                <?php
                                            if ($rows['task_end_date'] < $rows['task_start_date']) {
                                                echo "End Date must be after Start Date!";
                                            }
                                            if (($rows['task_start_date'] < $rows['pg_start_date']) || ($rows['task_end_date'] > $rows['pg_end_date'])) {
                                                echo "Task's dates must be within the program's period!";
                                            }
                                ?>
                            ">
                            <i class='bx bxs-error-circle bx-xs'></i>
                        </button>
                        <?php
                                        }
                                    }
                            ?>
                    </td>
                    <td>
                        <?php
                                    if ($rows['task'] == 'No task') {
                                        echo "";
                                    } else {
                            ?>
                        <div class="selectWrapper">
                            <select class="selectBox"
                                onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $rows['task_id'] ?>','<?php echo $rows['pg_id'] ?>')">
                                <option value="<?php echo $rows['status_id']; ?>" selected hidden>
                                    <?php echo $rows['status']; ?></option>
                                <?php
                                        $i = 0;
                                        while ($i < $stat_count) {
                                            if ($stat_id[$i] != 7) {
                                        ?>
                                <option value="<?php echo $stat_id[$i]; ?>"><?php echo $stat[$i]; ?> </option>
                                <?php
                                            }
                                            $i++;
                                        }
                                        ?>
                                <option value="7"><?php echo "No status"; ?> </option>
                            </select>
                        </div>
                        <?php } ?>
                    </td>
                </tr>
                <?php
                                }
                ?>
                <?php
                            } else {
            ?>
                <div class="selectWrapper">
                    <select class="selectBox"
                        onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $rows['task_id'] ?>','<?php echo $rows['pg_id'] ?>')">
                        <option value="<?php echo $rows['status_id']; ?>" selected hidden>
                            <?php echo $rows['status']; ?></option>
                        <?php
                                $i = 0;
                                while ($i < $stat_count) {
                                    if ($stat_id[$i] != 7) {
                        ?>
                        <option value="<?php echo $stat_id[$i]; ?>"><?php echo $stat[$i]; ?> </option>
                        <?php
                                    }
                                    $i++;
                                }
                        ?>
                        <option value="7"><?php echo "No status"; ?> </option>
                    </select>
                </div>
                <?php
                            }
            ?>
                </td>
                <!-- + Add new task to the current pg -->
                <?php
                    if ($db_row_n == $row_count) {
            ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                            data-bs-target="#tasknaddModal<?php echo $rows['pg_id'] ?>">
                            <i class="bi bi-plus-square-dotted"></i> New task
                        </button>
                        <?php include 'modals/add_task_modal.php' ?>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                    }
            ?>
                </tr>
                <?php
                }
        ?>
            </table>
        </div>

    </section>
    <!-- =========================================================================== -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- -------Edit task status------- -->
    <script type="text/javascript">
    function status_update(value, task_id, pg_id) {
        //alert(task_id);
        let url = "http://localhost/intern-management/admin/index.php";
        window.location.href = url + "?task_id=" + task_id + "&status_id=" + value + "&pg_id=" + pg_id;
    }
    </script>
    <!-- ========== SIDE MENU========= -->
    <script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }
    </script>
    <!-- ==========progress bar========== -->
    <!-- <script>
    $(".animated-progress span").each(function() {
        $(this).animate({
                width: $(this).attr("data-progress") + "%",
            },
            1000
        );
        $(this).text($(this).attr("data-progress") + "%");
    });
    // document.getElementById("animated-progress span").style.width = $(this).attr("data-progress") + "%";
    </script> -->
</body>

</html>