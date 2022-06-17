<!--======== STATUS ADD Modal========= -->
<div class="modal fade" id="statusaddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD NEW STATUS</h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><i
                        class="bi bi-x-lg"></i></button>
            </div>
            <form action="db/add_status_db.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Status label</label>
                        <input type="text" name="status" class="form-control" placeholder="Ex: To-do" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="addstatus" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>