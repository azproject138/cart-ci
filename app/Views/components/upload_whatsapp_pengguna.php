<h1>Tambah Nomor WhatsApp</h1>

<form action="/user-whatsapp/store" method="post">
    <div class="mb-3">
        <label for="whatsapp_number" class="form-label">Nomor WhatsApp</label>
        <input type="text" name="whatsapp_number" class="form-control" required>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" name="is_primary" class="form-check-input">
        <label class="form-check-label">Jadikan Utama</label>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>