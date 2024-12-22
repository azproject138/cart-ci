<?= $this->include('components/alerts')?>
<?php $session = session(); ?>
<form action="/settings/updateUsernamePengguna" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <div class="input-group">
            <input type="text" class="form-control" name="username" value="<?= esc($user['username']) ?>" disabled>
            <button 
                type="button" 
                class="btn btn-secondary" 
                data-bs-toggle="modal" 
                data-bs-target="#editUsernameModal"
            >
                <i class="bi bi-pencil"></i> Edit
            </button>
        </div>
    </div>
</form>

<div class="modal fade" id="editUsernameModal" tabindex="-1" role="dialog" aria-labelledby="editUsernameModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/settings/update-username-pengguna" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUsernameModalLabel">Edit Username</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>