<div class="container mt-5">
    <h2>Profile</h2>

    <div class="dropdown">
        <a href="#" class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?= base_url('uploads/profile_pictures/' . ($user['profile_picture'] ?? 'profile.png')) ?>" 
                alt="Profile" 
                class="rounded-circle" 
                style="width: 80px; height: 80px; object-fit: cover; border: 2px solid #ccc;">
            <?php if (!$user['profile_picture']): ?>
                <span class="badge bg-danger">•</span>
            <?php endif; ?>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
            <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#uploadPictureModal">
                Edit Foto Profil
            </button></li>
        </ul>
    </div>

    <?php if (session('success')): ?>
        <div class="alert alert-success mt-3"><?= session('success') ?></div>
    <?php elseif (session('error')): ?>
        <div class="alert alert-danger mt-3"><?= session('error') ?></div>
    <?php endif; ?>
</div>

<!-- Modal Upload Foto -->
<div class="modal fade" id="uploadPictureModal" tabindex="-1" aria-labelledby="uploadPictureModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/profile/upload-picture" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadPictureModalLabel">Upload Foto Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="<?= base_url('uploads/profile_pictures/' . ($user['profile_picture'] ?? 'default.png')) ?>" 
                            alt="Profile" 
                            class="rounded-circle mb-3" 
                            style="width: 100px; height: 100px; object-fit: cover; border: 2px solid #ccc;">
                    </div>
                    <div class="mb-3">
                        <label for="profile_picture" class="form-label">Pilih Foto Baru</label>
                        <input class="form-control" type="file" id="profile_picture" name="profile_picture" accept="image/*" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>