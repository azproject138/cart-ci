<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php elseif (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>
<div class="container mt-4">
    <div class="d-flex justify-content-center">
        <div class="position-relative">
            <img src="<?= base_url('uploads/profile_pictures/' . ($user['profile_picture'] ?? 'default.png')) ?>" alt="Profile Picture" class="rounded-circle" style="width: 100px; height: 100px;">
            <img 
                src="<?= base_url('uploads/profile_pictures/' . ($user['profile_picture'] ?? 'default.png') . '?t=' . time()) ?>" 
                alt="Foto Profil" 
                class="rounded-circle" 
                style="width: 150px; height: 150px; object-fit: cover;"
            >
            <i class="bi bi-pencil-fill position-absolute top-0 end-0 translate-middle p-2 bg-primary rounded-circle" data-bs-toggle="modal" data-bs-target="#uploadModal" style="cursor: pointer; margin-top: 83px; margin-right: 20px; color: white;"></i>
        </div>
    </div>

    <!-- Notifikasi jika foto profil belum diubah -->
    <?php if (empty($user['profile_picture'])): ?>
        <div class="alert alert-warning mt-3" role="alert">
            <i class="bi bi-exclamation-circle"></i> Anda belum mengubah foto profil. Klik foto untuk memperbarui.
        </div>
    <?php endif; ?>

    <!-- Modal Upload Foto Profil -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/profile/upload-picture" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadModalLabel">Unggah Foto Profil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="file" name="profile_picture" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
