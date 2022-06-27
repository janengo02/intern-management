<?php
include '../includes/variances.php';

?>

<div class="sidebar">
    <div class="logo-details">
        <i>JG</i>
        <span class="logo_name">CORPORATION</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="./index.php">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Dashboard</span>
            </a>
        </li>
        <!-- ================================FILTERS================================== -->
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-filter'></i>
                    <span class="link_name">Filter</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Filter</a></li>
                <form action="db/filter_db.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="subformText">Tasks</label>
                            <input type="text" name="search_task" value="<?php echo $search_task ?>"
                                class="form-control" placeholder="Search for task">
                        </div>
                        <br>
                        <div class="mb-3">
                            <label class="subformText">From</label>
                            <input type="date" name="search_startdate" value="<?php echo $search_startdate ?>"
                                class="form-control">
                        </div>
                        <br>
                        <div class="mb-3">
                            <label class="subformText">To</label>
                            <input type="date" name="search_enddate" value="<?php echo $search_enddate ?>"
                                class="form-control">
                        </div>
                        <!-- Status type chechbox -->
                        <div class="mb-3">
                            <label class="subformText">Status</label>
                            <?php
                            $i = 0;
                            while ($i < $stat_count) {
                            ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="search_stats[]"
                                    value="<?php echo $stat_id[$i]; ?>" id="flexCheckDefault"
                                    <?php echo $stat_check[$i]; ?>>
                                <label class="form-check-label" for="flexCheckDefault">
                                    <?php echo $stat[$i]; ?>
                                </label>
                            </div>
                            <?php
                                $i++;
                            }
                            ?>
                        </div>
                        <!-- ----------------------- -->

                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="filter" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </ul>
        </li>
        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <img src="../<?php echo $login_avatar ?>" alt="profileImg">
                </div>
                <div class="name-job">
                    <div class="profile_name">
                        <button class="databtn profilebtn" type="button" data-bs-toggle="modal"
                            data-bs-target="#profileeditModal<?php echo $login_id ?>">
                            <?php echo $login_name ?></button>
                        <?php
                        include 'modals/edit_profile_modal.php';
                        ?>
                    </div>
                    <div class="job">Intern</div>
                </div>
                <a href="./../login/logout.php">
                    <i class='bx bx-log-out'></i>
                </a>
            </div>
        </li>
    </ul>
</div>