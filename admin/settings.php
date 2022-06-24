<?php
include '../includes/db_connect.php';

session_start();

if (!isset($_SESSION['email'])) {
    header("location:../login/index.php");
}
include '../includes/variances.php';
$sql_stat = mysqli_query($conn, "SELECT * FROM status_list ORDER BY status_list.status_id");
$sql_pgtype = mysqli_query($conn, "SELECT * FROM pg_type_list ORDER BY pg_type_id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>IMS - Settings</title>
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
    include '../style.css';
    include 'includes/side_menu.php';
    ?>
    <!-- =================================== -->
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-cog bx-md'></i>
            <a href="./settings.php" class="text">Settings</a>
        </div>
        <div class=mainContent>
            <!-- STATUS -->
            <table>
                <tr>
                    <th></th>
                    <th>Edit Task Status List</th>
                </tr>
                <?php
                $i = 0;
                while ($i < $stat_count) {
                    if ($stat[$i] != "No status") {
                ?>
                <tr>
                    <td>
                        <?php
                                if ($stat_id[$i] == 2) {
                                    echo "";
                                } else {
                                ?>
                        <button class="btn btn-outline-light" type="button" data-bs-toggle="modal"
                            data-bs-target="#statusdeleteModal<?php echo $stat_id[$i] ?>">
                            <i class="bi bi-trash"></i></button>
                        <?php
                                }
                                ?>
                    </td>
                    <td>
                        <?php
                                include 'modals/delete_status_modal.php';

                                echo $stat[$i];
                                ?>
                    </td>
                </tr>
                <?php
                    }
                    $i++;
                }
                ?>
                <tr>
                    <td></td>
                    <td> <?php echo "No status" ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                            data-bs-target="#statusaddModal">
                            <i class="bi bi-plus-square-dotted"></i> New status
                        </button>
                        <?php include 'modals/add_status_modal.php' ?>
                    </td>
                </tr>
            </table>
            <!-- -------------------------------------- -->
            <br>
            <!-- PG TYPE -->
            <table>
                <tr>
                    <th></th>
                    <th>Edit Program Type List</th>
                </tr>
                <?php
                $i = 0;
                while ($i < $pgtype_count) {
                    if ($pgtype[$i] != "No Program") {
                ?>
                <tr>
                    <td>
                        <button class="btn btn-outline-light" type="button" data-bs-toggle="modal"
                            data-bs-target="#pgtypedeleteModal<?php echo $pgtype_id[$i] ?>">
                            <i class="bi bi-trash"></i></button>
                    </td>
                    <td>
                        <?php
                                include 'modals/delete_pgtype_modal.php';
                                echo $pgtype[$i]
                                ?>
                    </td>
                </tr>
                <?php
                    }
                    $i++;
                }
                ?>
                <tr>
                    <td></td>
                    <td><?php echo "No Program" ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                            data-bs-target="#pgtypeaddModal">
                            <i class="bi bi-plus-square-dotted"></i> New program type
                        </button>
                        <?php include 'modals/add_pgtype_modal.php' ?>
                    </td>
                </tr>
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
</body>

</html>