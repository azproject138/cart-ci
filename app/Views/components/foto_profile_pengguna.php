<h3>Foto Profil Pengguna</h3>
<div class="mb-4">
    <p>URL Gambar: <?= base_url('profile/show-profile/' . $user['profile_picture']) ?></p>
    <img 
        src="<?= base_url('writable/uploads/profiles/' . $user['profile_picture'] ? $user['profile_picture'] : 'default.png') ?>" 
        alt="Foto Profil" 
        class="img-thumbnail" 
        width="150">
</div>

<!-- Form Upload Foto -->
<form action="<?= base_url('profile/upload-profile-pengguna') ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="profile_picture" class="form-label">Pilih Foto Profil</label>
        <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*">
    </div>
    <button type="submit" class="btn btn-primary">
        <i class="bi bi-cloud-upload-fill"></i> Unggah Foto
    </button>
</form>
<!-- Hapus Foto Profil -->
<form action="<?= base_url('profile/delete-profile-pengguna/' . $user['id']) ?>" method="get" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto profil?');">
    <button type="submit" class="btn btn-danger mt-2">
        <i class="bi bi-trash-fill"></i> Hapus Foto
    </button>
</form>