<div class="container mt-4">
    <h2>Profile</h2>

    <?= view('components/foto_profile', ['user' => $user]) ?>

    <!-- Alamat -->
    <form action="/profile/update-address" method="POST">
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="address" name="address" value="<?= isset($user['address']) ? $user['address'] : '' ?>">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <!-- WhatsApp -->
    <!-- Alamat -->
    <form action="/profile/update-address" method="POST">
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="address" name="address" value="<?= $user['address'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <!-- WhatsApp -->
    <form action="/profile/update-whatsapp" method="POST">
        <div class="mb-3">
            <label for="whatsapp" class="form-label">Nomor WhatsApp</label>
            <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="<?= $user['whatsapp'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Kirim OTP</button>
    </form>
</div>
