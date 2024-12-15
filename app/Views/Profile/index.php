<div class="container mt-4">
    <h2>Profile</h2>

    <!-- Upload Foto -->
    <form action="/profile/upload-picture" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="profile_picture" class="form-label">Upload Foto Profil</label>
            <input type="file" class="form-control" id="profile_picture" name="profile_picture">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <!-- Alamat -->
    <form action="/profile/update-address" method="POST">
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="address" name="address" value="<?= isset($user['address']) ? $user['address'] : '' ?>">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <!-- WhatsApp -->
    <form action="/profile/update-whatsapp" method="POST">
        <div class="mb-3">
            <label for="whatsapp" class="form-label">Nomor WhatsApp</label>
            <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="<?= isset($user['whatsapp']) ? $user['whatsapp'] : '' ?>">
        </div>
        <button type="submit" class="btn btn-primary">Kirim OTP</button>
    </form>
</div>
