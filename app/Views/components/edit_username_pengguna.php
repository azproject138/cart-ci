<?= $this->include('components/alerts')?>
<form action="/settings/updateUsername" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <div class="input-group">
            <input 
                type="text" 
                class="form-control" 
                id="username" 
                name="username" 
                value="<?= esc($session->get('username')) ?>" 
                readonly
            >
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

<div class="modal fade" id="editUsernameModal" tabindex="-1" aria-labelledby="editUsernameModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/settings/updateUsername" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUsernameModalLabel">Edit Username</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="newUsername">New Username</label>
                        <input type="text" class="form-control" id="newUsername" name="new_username" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>