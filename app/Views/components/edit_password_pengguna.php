<?= $this->include('components/alerts')?>
<?php $session = session(); ?>
<form action="/settings/updatePasswordPengguna" method="post">
    <div class="form-group">
        <label for="password">Password</label>
        <div class="input-group">
            <input type="password" class="form-control" name="password" value=" <?= isset($user['password']) ?>" disabled>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editPasswordModal">
                <i class="bi bi-pencil"></i> Edit
            </button>
        </div>
    </div>
</form>
<div class="modal fade" id="editPasswordModal" data-bs-backdrop="password" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="editPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/settings/update-password-pengguna" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPasswordModalLabel">Edit Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
