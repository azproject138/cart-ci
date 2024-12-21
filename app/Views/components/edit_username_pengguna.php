<?= $this->include('components/alerts')?>
<div class="d-flex align-items-center mt-3">
    <label for="username" class="form-label me-3">Username:</label>
    <input 
        type="text" 
        id="username" 
        class="form-control w-50" 
        value="<?= esc($user['username']) ?>" 
        disabled>
    <button 
        class="btn btn-primary ms-3" 
        data-bs-toggle="modal" 
        data-bs-target="#editUsernameModal">
        <i class="bi bi-pencil"></i> Edit
    </button>
</div>

<!-- Modal Edit Username -->
<div class="modal fade" id="editUsernameModal" tabindex="-1" aria-labelledby="editUsernameModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUsernameModalLabel">Edit Username</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('settings/upload-username-pengguna') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="new_username" class="form-label">Username Baru</label>
                        <input 
                            type="text" 
                            id="new_username" 
                            name="new_username" 
                            class="form-control" 
                            placeholder="Masukkan username baru" 
                            value="<?= esc($user['username']) ?>" 
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
