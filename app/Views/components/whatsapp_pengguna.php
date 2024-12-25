<div class="mt-4">
    <h4>Daftar Nomor WhatsApp</h4>
    <?php if (!empty($user['whatsapp_number'])): ?>
        <div class="alert alert-info">
            Nomor WhatsApp Anda: <?= esc($user['whatsapp_number']) ?>
            <br>
            <strong>Status:</strong> <?= $user['is_main_whatsapp'] ? 'Nomor Utama' : 'Nomor Cadangan' ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('/whatsapp/tambah-whatsapp-pengguna') ?>" method="post">
        <div class="form-group">
            <label for="whatsapp_number">Nomor WhatsApp</label>
            <input type="text" class="form-control" name="whatsapp_number" id="whatsapp_number" value="<?= esc($user['whatsapp_number']) ?>" required>
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" name="is_main" <?= $user['is_main_whatsapp'] ? 'checked' : '' ?>> Jadikan nomor utama
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Nomor WhatsApp</button>
    </form>

    <?php if (!empty($user['whatsapp_number'])): ?>
        <form action="<?= site_url('/whatsapp/hapus-whatsapp-pengguna') ?>" method="get" class="mt-3">
            <button type="submit" class="btn btn-danger">Hapus Nomor WhatsApp</button>
        </form>
    <?php endif; ?>
</div>