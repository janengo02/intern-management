<?php
include '../includes/db_connect.php';
include '../style.css';
include '../includes/variances.php';
include '../includes/update_pg_stat.php';
session_start();


if (!isset($_SESSION["email"])) {
    header("location:../login/index.php");
} else {
    $email = $_SESSION["email"];
}
$aname = $_SESSION['name'];

$sql = mysqli_query($conn, "SELECT interns.intern_id,interns.name, interns.email, 
interns.password, interns.avatar,
program_list.pg_id,program_list.pg_type,
program_list.pg_start_date,program_list.pg_end_date,
program_list.pg_status,program_list.progress,
task_list.task_id, task_list.task, task_list.description, task_list.task_start_date, task_list.task_end_date,
task_list.task_status
FROM interns LEFT JOIN program_list 
ON interns.intern_id=program_list.intern_id 
LEFT JOIN task_list
ON program_list.pg_id = task_list.pg_id
WHERE interns.email = '$email'
ORDER BY interns.intern_id DESC,task_list.task_id ASC");


//---------------------UPDATE TASK STATUS----------------------------
if (isset($_GET['task_status']) && isset($_GET['task_id']) && isset($_GET['pg_id'])) {
    $task_id = $_GET['task_id'];
    $task_status = $_GET['task_status'];
    $pg_id = $_GET['pg_id'];
    // echo $task_id;
    // echo $task_status;
    mysqli_query($conn, "UPDATE task_list SET task_status=$task_status
WHERE task_id=$task_id");
    updatePG($pg_id);
    header("location:index.php");
    die();
}
//----------------------
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Intern Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="fixed-header">
        <div class="container">
            <nav>
                <a href="#"><img src="../img/JG_logo_white.png" class="logo"></a>
                <div class="webTitle"><b>INTERNSHIP MANAGEMENT PROGRAM</b></div>
                <div id="login" class="loginDisplay">
                    <i class="bi bi-person-circle"></i> <?php echo $aname ?> |
                    <a href="../login/index.php">Log out</a>
                </div>
            </nav>
        </div>
    </div>
    <section>
        <!--============================================================================================================== -->
        <div class=mainContent>
            <!-- TABLE CONSTRUCTION-->
            <table>
                <tr>
                    <th></th>
                    <th>Intern</th>
                    <th>Program</th>
                    <th>Start date</th>
                    <th>End date</th>
                    <th>Status</th>
                    <th>Progress</th>
                </tr>
                <!-- PHP CODE TO FETCH DATA FROM ROWS-->
                <?php // LOOP TILL END OF DATA
                $prev_intern = 0;
                $prev_pg = 0;
                $db_row_n = mysqli_num_rows($sql);
                $row_count = 0;
                while ($rows = $sql->fetch_assoc()) {
                    $row_count++;
                ?>
                <tr>
                    <!-- AVATAR -->
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
                        <button class="databtn" type="button" data-bs-toggle="modal"
                            data-bs-target="#interneditModal<?php echo $rows['intern_id'] ?>">
                            <?php echo "<b>" . $rows['name'] . "</b>" ?></button>
                        <?php
                                include 'modals/edit_intern_modal.php';
                                $prev_intern = $rows['intern_id'];
                                $prev_pg = 0;
                            } else {
                                echo "";
                            }
                            ?>
                    </td>
                    <!-----PROGRAM/TASK----->
                    <td>
                        <?php
                            if ($rows['pg_id'] != $prev_pg) {
                                echo "<b>" . $pgtyp[$rows['pg_type'] - 1] . "</b>";
                            } else {
                            ?>
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
                                echo "<b>" . $rows['pg_start_date'] . "</b>";
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
                                echo "<b>" . $rows['pg_end_date'] . "</b>";
                            } else {
                            ?>
                        <button class="databtn" type="button" data-bs-toggle="modal"
                            data-bs-target="#taskeditModal<?php echo $rows['task_id'] ?>">
                            <?php echo $rows['task_end_date'] ?></button>
                        <?php
                                include 'modals/edit_task_modal.php';
                            }
                            ?>
                    </td>
                    <!-----STATUS----->
                    <td>
                        <?php
                            if ($rows['pg_id'] != $prev_pg) {
                                echo "<b>" . $stat[$rows['pg_status'] - 1] . "</b>";
                            } else {
                            ?>
                        <div class="selectWrapper">
                            <select class="selectBox"
                                onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $rows['task_id'] ?>','<?php echo $rows['pg_id'] ?>')">
                                <option value=""><?php echo $stat[$rows['task_status'] - 1]; ?></option>
                                <option value="1">To-do</option>
                                <option value="2">On-Progress</option>
                                <option value="3">Blocked</option>
                                <option value="4">Done</option>
                            </select>
                        </div>
                        <?php
                            }
                            ?>
                    </td>
                    <!-----PROGRESS----->
                    <td>
                        <?php
                            if ($rows['pg_id'] != $prev_pg) {
                                echo "<b>" . $rows['progress'] . "%" . "</b>";
                                $prev_pg = $rows['pg_id'];
                            ?>
                        <?php
                                if ($rows['task'] != NULL) {
                                ?>
                        <!-- 1st task row -->
                <tr>
                    <td></td>
                    <td></td>
                    <td><button class="databtn" type="button" data-bs-toggle="modal"
                            data-bs-target="#taskeditModal<?php echo $rows['task_id'] ?>">
                            <?php echo $rows['task'] ?></button>
                        <?php
                                    include 'modals/edit_task_modal.php';
                            ?>
                    </td>
                    <td>
                        <button class="databtn" type="button" data-bs-toggle="modal"
                            data-bs-target="#taskeditModal<?php echo $rows['task_id'] ?>">
                            <?php echo $rows['task_start_date'] ?></button>
                        <?php
                                    include 'modals/edit_task_modal.php';
                            ?>
                    </td>
                    <td>
                        <button class="databtn" type="button" data-bs-toggle="modal"
                            data-bs-target="#taskeditModal<?php echo $rows['task_id'] ?>">
                            <?php echo $rows['task_end_date'] ?></button>
                        <?php
                                    include 'modals/edit_task_modal.php';
                            ?>
                    </td>
                    <td>
                        <div class="selectWrapper">
                            <select class="selectBox"
                                onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $rows['task_id'] ?>','<?php echo $rows['pg_id'] ?>')">
                                <option value=""><?php echo $stat[$rows['task_status'] - 1]; ?></option>
                                <option value="1">To-do</option>
                                <option value="2">On-Progress</option>
                                <option value="3">Blocked</option>
                                <option value="4">Done</option>
                            </select>
                        </div>
                    </td>
                    <td><?php echo ""; ?></td>
                </tr>
                <?php
                                }
                ?>
                <?php
                            } else {
                                echo "";
                            }
            ?>
                </td>
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
        let url = "http://localhost/intern_management/intern/index.php";
        window.location.href = url + "?task_id=" + task_id + "&task_status=" + value + "&pg_id=" + pg_id;
    }
    </script>

    <!-- ------- 3 dots menu --------- -->
    <script>
    document.querySelector('table').onclick = ({
        target
    }) => {
        if (!target.classList.contains('more')) return
        document.querySelectorAll('.dropout.active').forEach(
            (d) => d !== target.parentElement && d.classList.remove('active')
        )
        target.parentElement.classList.toggle('active')
    }
    </script>
</body>

</html>