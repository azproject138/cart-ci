<div class="container mt-5">
    <h3>Foto Profile</h1>

    <div class="row">
        <div class="col-md-4">
            <!-- Foto Profil -->
            <img src="<?= base_url('/uploads/profiles/' . $user['profile_picture']) ?>" alt="Foto Profil" class="img-thumbnail" width="200">
        </div>
        <div class="col-md-8">
            <h3><?= $user['username'] ?></h3>
            <form action="<?= site_url('profile/upload-profile-pengguna') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="profile_picture" class="form-label">Upload Foto Profil</label>
                    <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
            <form action="<?= site_url('profile/delete-profile-pengguna') ?>" method="get" class="mt-3">
                <button type="submit" class="btn btn-danger">Hapus Foto Profil</button>
            </form>
        </div>
    </div>
</div>