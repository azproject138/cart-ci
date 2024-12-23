<?= $this->include('components/alerts')?>
<form action="" method="get">
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editPasswordModal">
            <i class="bi bi-pencil"></i> Edit
        </button>
    </div>
</form>
<div class="modal fade" id="editPasswordModal" tabindex="-1" role="dialog" aria-labelledby="editPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/settings/update-password-pengguna" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPasswordModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
