<!--======== INTERN EDIT Modal========= -->

<div class="modal fade" id="interneditModal<?php echo $rows['intern_id'] ?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Edit Intern Data </h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <form action="db/edit_intern_db.php" method="POST" enctype="multipart/form-data">

                <div class="modal-body">

                    <input type="hidden" name="internid" value="<?php echo $rows['intern_id'] ?>">
                    <input type="hidden" name="previous" value="<?php echo $rows['avatar'] ?>">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="internname" value="<?php echo $rows['name'] ?>" class="form-control"
                            placeholder="Enter First Name">
                    </div>
                    <div class="mb-3">
                        <label>Profile Picture</label><br>
                        <img src="<?php echo "../" . $rows['avatar'] ?>" class="avatar" />
                        <br>
                        <input type="file" accept="image/*" name="avatar" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Email address</label>
                        <input type="email" name="email" value="<?php echo $rows['email'] ?>" class="form-control"
                            placeholder="xyz@jg-corporation.com">
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" value="<?php echo $rows['password'] ?>"
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