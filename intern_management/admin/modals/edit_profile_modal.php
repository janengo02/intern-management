<!--======== PROFILE EDIT Modal========= -->
<?php
include '../includes/variances.php';
?>

<div class="modal fade" id="profileeditModal<?php echo $login_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.3);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Edit My Profile </h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <form action="db/edit_profile_db.php" method="POST" enctype="multipart/form-data">

                <div class="modal-body">
                    <input type="hidden" name="profileid" value="<?php echo $login_id ?>">
                    <input type="hidden" name="previous" value="<?php echo $login_avatar ?>">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="profilename" value="<?php echo $login_name ?>" class="form-control"
                            placeholder="Enter Name">
                    </div>
                    <div class="mb-3">
                        <label>Profile Picture</label><br>
                        <img src="<?php echo "../" . $login_avatar ?>" class="avatar" />
                        <br>
                        <input type="file" accept="image/*" name="avatar" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Email address</label>
                        <input type="email" name="email" value="<?php echo $login_email ?>" class="form-control"
                            placeholder="xyz@jg-corporation.com">
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" value="<?php echo $login_password ?>"
                            class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="editProfile" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>