<h3>Foto Profil Pengguna</h3>
<div class="row">
    <div class="col-md-4">
        <h3>Foto Profil</h3>
        <img src="<?= base_url('uploads/' . $user['profile_picture']) ?>" alt="Foto Profil" class="img-fluid rounded-circle">
    </div>
    <div class="col-md-8">
        <h3>Ubah Foto Profil</h3>
        <form action="/profile/upload" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="form-group">
                <input type="file" name="profile_picture" class="form-control" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>

        <form action="/profile/delete" method="get" class="mt-3">
            <button type="submit" class="btn btn-danger">Hapus Foto Profil</button>
        </form>
    </div>
</div>