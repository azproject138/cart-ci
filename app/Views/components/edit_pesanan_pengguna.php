<h2>Edit Pesanan</h2>

<form action="/pesanan/update-pesanan-pengguna/<?= $pesanan['id'] ?>" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="_method" value="PUT">
    
    <div class="form-group">
        <label for="jenis_pesanan">Jenis Pesanan:</label>
        <select name="jenis_pesanan" id="jenis_pesanan" class="form-control" required>
            <option value="servis laptop" <?= ($pesanan['jenis_pesanan'] == 'servis laptop') ? 'selected' : '' ?>>Servis Laptop</option>
            <option value="servis printer" <?= ($pesanan['jenis_pesanan'] == 'servis printer') ? 'selected' : '' ?>>Servis Printer</option>
            <option value="pasang wifi" <?= ($pesanan['jenis_pesanan'] == 'pasang wifi') ? 'selected' : '' ?>>Pasang WiFi</option>
            <option value="pasang cctv" <?= ($pesanan['jenis_pesanan'] == 'pasang cctv') ? 'selected' : '' ?>>Pasang CCTV</option>
        </select>
    </div>

    <div class="form-group">
        <label for="merek_pesanan">Merek Pesanan:</label>
        <select name="merek_pesanan" id="merek_pesanan" class="form-control" required>
            <option value="hp" <?= ($pesanan['merek_pesanan'] == 'hp') ? 'selected' : '' ?>>HP</option>
            <option value="asus" <?= ($pesanan['merek_pesanan'] == 'asus') ? 'selected' : '' ?>>Asus</option>
            <option value="epson" <?= ($pesanan['merek_pesanan'] == 'epson') ? 'selected' : '' ?>>Epson</option>
            <option value="canon" <?= ($pesanan['merek_pesanan'] == 'canon') ? 'selected' : '' ?>>Canon</option>
            <option value="tp-link" <?= ($pesanan['merek_pesanan'] == 'tp-link') ? 'selected' : '' ?>>TP-Link</option>
            <option value="hikvision" <?= ($pesanan['merek_pesanan'] == 'hikvision') ? 'selected' : '' ?>>Hikvision</option>
        </select>
    </div>

    <div class="form-group">
        <label for="kategori_pesanan">Kategori Pesanan:</label>
        <select name="kategori_pesanan" id="kategori_pesanan" class="form-control" required>
            <option value="install ulang" <?= ($pesanan['kategori_pesanan'] == 'install ulang') ? 'selected' : '' ?>>Install Ulang</option>
            <option value="mati total" <?= ($pesanan['kategori_pesanan'] == 'mati total') ? 'selected' : '' ?>>Mati Total</option>
            <option value="revil toner" <?= ($pesanan['kategori_pesanan'] == 'revil toner') ? 'selected' : '' ?>>Revil Toner</option>
            <option value="ganti tinta" <?= ($pesanan['kategori_pesanan'] == 'ganti tinta') ? 'selected' : '' ?>>Ganti Tinta</option>
            <option value="order wifi" <?= ($pesanan['kategori_pesanan'] == 'order wifi') ? 'selected' : '' ?>>Order WiFi</option>
            <option value="order cctv" <?= ($pesanan['kategori_pesanan'] == 'order cctv') ? 'selected' : '' ?>>Order CCTV</option>
        </select>
    </div>

    <div class="form-group">
        <label for="jumlah_pesanan">Jumlah Pesanan:</label>
        <input type="number" name="jumlah_pesanan" id="jumlah_pesanan" class="form-control" value="<?= $pesanan['jumlah_pesanan'] ?>" required>
    </div>

    <div class="form-group">
        <label for="deskripsi_pesanan">Deskripsi Pesanan:</label>
        <textarea name="deskripsi_pesanan" id="deskripsi_pesanan" class="form-control" required><?= $pesanan['deskripsi_pesanan'] ?></textarea>
    </div>

    <div class="form-group">
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $pesanan['alamat'] ?>" required>
    </div>

    <div class="form-group">
        <label for="whatsapp_number">Nomor WhatsApp:</label>
        <input type="text" name="whatsapp_number" id="whatsapp_number" class="form-control" value="<?= $pesanan['whatsapp_number'] ?>" required>
    </div>

    <div class="form-group">
        <label for="ketentuan_servis">Ketentuan Servis:</label>
        <select name="ketentuan_servis" id="ketentuan_servis" class="form-control" required>
            <option value="ambil" <?= ($pesanan['ketentuan_servis'] == 'ambil') ? 'selected' : '' ?>>Ambil</option>
            <option value="antar" <?= ($pesanan['ketentuan_servis'] == 'antar') ? 'selected' : '' ?>>Antar</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>