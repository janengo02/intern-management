<!--======== PROGRAM EDIT Modal========= -->

<div class="modal fade" id="programeditModal<?php echo $rows['pg_id'] ?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Edit Program Data </h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <form action="db/edit_program_db.php" method="POST">

                <div class="modal-body">

                    <input type="hidden" name="pgid" value="<?php echo $rows['pg_id'] ?>">

                    <div class="mb-3">
                        <label>Name</label>
                        <?php echo $rows['name'] ?>
                    </div>

                    <div class="form-select form-select-lg mb-3">
                        <label>Type of Internship Program</label><br>
                        <div class="pgselectWrapper">
                            <select class="pgselectBox" name="pgtype">
                                <option value="<?php echo $rows['pg_type_id']; ?>" selected hidden>
                                    <?php echo $rows['pg_type']; ?></option>
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
                        <input type="date" name="pgstartdate" value="<?php echo $rows['pg_start_date'] ?>"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>End date</label>
                        <input type="date" name="pgenddate" value="<?php echo $rows['pg_end_date'] ?>"
                            class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="editintern" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>