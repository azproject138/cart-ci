<?= $this->include('components/alerts')?>
<h3>Edit Username</h3>
<form method="post" action="<?= site_url('settings/update-username-pengguna') ?>">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="username" class="form-label">Username saat ini</label>
        <div class="input-group">
            <input type="text" class="form-control" id="username" name="username" value="<?= esc($user['username']) ?>" disabled>
            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editUsernameModal">
                <i class="bi bi-pencil-square"></i> Edit
            </button>
        </div>
    </div>
</form>
<div class="modal fade" id="editUsernameModal" tabindex="-1" aria-labelledby="editUsernameModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUsernameModalLabel">Edit Username</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="<?= site_url('settings/update-username-pengguna') ?>">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="newUsername" class="form-label">New Username</label>
                        <input type="text" class="form-control" id="newUsername" name="username" placeholder="Enter new username" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>