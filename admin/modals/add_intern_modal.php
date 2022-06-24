<!--======== INTERN ADD Modal========= -->
<div class="modal fade" id="internaddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD NEW INTERN</h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><i
                        class="bi bi-x-lg"></i></button>
            </div>
            <form action="db/add_intern_db.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="intern_name" class="form-control" placeholder="Enter Full Name"
                            required>
                    </div>
                    <div class="mb-3">
                        <label>Profile Picture</label>
                        <input type="file" accept="image/*" name="avatar" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="xyz@jg-corporation.com"
                            required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="******" required>
                    </div>
                    <div class="form-select form-select-lg mb-3">
                        <label>Type of Internship Program</label><br>
                        <div class="pgselectWrapper">
                            <select class="pgselectBox" name="pgtype" reqired>
                                <option value="6" selected hidden></option>
                                <?php
                                $i = 0;
                                while ($i < $pgtype_count) {
                                    if ($pgtype_id[$i] != 6) {
                                ?>
                                <option value="<?php echo $pgtype_id[$i]; ?>"><?php echo $pgtype[$i]; ?> </option>
                                <?php
                                    }
                                    $i++;
                                }
                                ?>
                                <option value="6"><?php echo "No Program"; ?> </option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Start date</label>
                        <input type="date" name="pgstartdate" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>End date</label>
                        <input type="date" name="pgenddate" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="addintern" name="addintern" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>