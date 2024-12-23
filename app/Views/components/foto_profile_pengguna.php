<h3>Foto Profil Pengguna</h3>
<div class="mb-4">
    <img src="<?= esc($profilePicture) ?>" alt="Foto Profil" class="rounded-circle img-thumbnail" width="150">
</div>

<!-- Form Upload Foto -->
<form action="<?= base_url('profile/upload-profile') ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="profile_picture" class="form-label">Pilih Foto Profil</label>
        <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*">
    </div>
    <button type="submit" class="btn btn-primary">Unggah Foto</button>
</form>

<!-- Hapus Foto Profil -->
<form action="<?= base_url('profile/delete-profile') ?>" method="POST" class="mt-3">
    <button type="submit" class="btn btn-danger">Hapus Foto Profil</button>
</form>