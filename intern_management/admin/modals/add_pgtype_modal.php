<!--======== PGTYPE ADD Modal========= -->
<div class="modal fade" id="pgtypeaddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD NEW PROGRAM TYPE</h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><i
                        class="bi bi-x-lg"></i></button>
            </div>
            <form action="db/add_pgtype_db.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Program Title</label>
                        <input type="text" name="pgtype" class="form-control" placeholder="Ex: ABC Program" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="addpgtype" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>