<!-- Email -->
<div class="d-flex align-items-center mb-3">
    <strong class="me-3">Email:</strong>
    <span><?= $user['email'] ?? 'Belum diatur' ?></span>
    <span class="ms-3 <?= $user['is_email_verified'] ? 'text-success' : 'text-danger' ?>">
        <?= $user['is_email_verified'] ? 'Terverifikasi' : 'Belum Diverifikasi' ?>
    </span>
    <button class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#editEmailModal">
        <i class="bi bi-pencil"></i> Edit
    </button>
    <?php if (!$user['is_email_verified']): ?>
        <a href="<?= base_url('user/verify-email-pengguna?email=' . urlencode($user['email'])) ?>" class="btn btn-warning ms-3">
            Verifikasi Email
        </a>
    <?php endif; ?>
</div>

<!-- Modal Edit Email -->
<div class="modal fade" id="editEmailModal" tabindex="-1" aria-labelledby="editEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEmailModalLabel">Edit Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('user/update-email-pengguna') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Baru</label>
                        <input 
                            type="email" 
                            class="form-control" 
                            id="email" 
                            name="email" 
                            placeholder="Masukkan email baru" 
                            value="<?= $user['email'] ?? '' ?>" 
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