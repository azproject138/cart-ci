<h1>Edit Nomor WhatsApp</h1>

<form action="/user-whatsapp/update-whatsapp-pengguna/<?= $whatsapp['id'] ?>" method="post">
    <div class="mb-3">
        <label for="whatsapp_number" class="form-label">Nomor WhatsApp</label>
        <input type="text" name="whatsapp_number" class="form-control" value="<?= $whatsapp['whatsapp_number'] ?>" required>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" name="is_primary" class="form-check-input" <?= $whatsapp['is_primary'] ? 'checked' : '' ?>>
        <label class="form-check-label">Jadikan Utama</label>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>