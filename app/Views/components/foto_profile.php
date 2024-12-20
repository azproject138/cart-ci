<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<div class="text-center">
    <!-- Lingkaran foto profil -->
    <div class="position-relative" style="width: 120px; height: 120px;">
        <img 
            src="<?= base_url('uploads/profile_pictures/' . ($user['profile_picture'] ?? 'default.png')) ?>" 
            alt="Profile Picture" 
            class="rounded-circle img-fluid border" 
            style="width: 100%; height: 100%; object-fit: cover;"
        />
        <!-- Icon edit -->
        <button 
            class="btn btn-primary position-absolute bottom-0 end-0 rounded-circle" 
            data-bs-toggle="modal" 
            data-bs-target="#uploadModal">
            <i class="bi bi-pencil"></i>
        </button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload Foto Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('profile/upload-picture') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body text-center">
                    <img 
                        src="<?= base_url('uploads/profile_pictures/' . ($user['profile_picture'] ?? 'default.png')) ?>" 
                        alt="Current Profile Picture" 
                        class="rounded-circle img-fluid border mb-3" 
                        style="width: 150px; height: 150px; object-fit: cover;"
                    />
                    <div class="mb-3">
                        <label for="profile_picture" class="form-label">Pilih Foto Baru</label>
                        <input class="form-control" type="file" id="profile_picture" name="profile_picture" accept="image/*" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
