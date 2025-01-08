<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <title>Edit Pesanan</title>
</head>
<body>
    <h4>Edit Pesanan</h4>

    <form action="/pesanan/update-pesanan-pengguna/<?= $order['id'] ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">
        
        <div class="form-group">
            <label for="jenis_pesanan">Jenis Pesanan:</label>
            <select name="jenis_pesanan" id="jenis_pesanan" class="form-control" required>
                <option value="servis laptop" <?= ($order['jenis_pesanan'] == 'servis laptop') ? 'selected' : '' ?>>Servis Laptop</option>
                <option value="servis printer" <?= ($order['jenis_pesanan'] == 'servis printer') ? 'selected' : '' ?>>Servis Printer</option>
                <option value="pasang wifi" <?= ($order['jenis_pesanan'] == 'pasang wifi') ? 'selected' : '' ?>>Pasang WiFi</option>
                <option value="pasang cctv" <?= ($order['jenis_pesanan'] == 'pasang cctv') ? 'selected' : '' ?>>Pasang CCTV</option>
            </select>
        </div>

        <div class="form-group">
            <label for="merek_pesanan">Merek Pesanan:</label>
            <select name="merek_pesanan" id="merek_pesanan" class="form-control" required>
                <option value="hp" <?= ($order['merek_pesanan'] == 'hp') ? 'selected' : '' ?>>HP</option>
                <option value="asus" <?= ($order['merek_pesanan'] == 'asus') ? 'selected' : '' ?>>Asus</option>
                <option value="epson" <?= ($order['merek_pesanan'] == 'epson') ? 'selected' : '' ?>>Epson</option>
                <option value="canon" <?= ($order['merek_pesanan'] == 'canon') ? 'selected' : '' ?>>Canon</option>
                <option value="tp-link" <?= ($order['merek_pesanan'] == 'tp-link') ? 'selected' : '' ?>>TP-Link</option>
                <option value="hikvision" <?= ($order['merek_pesanan'] == 'hikvision') ? 'selected' : '' ?>>Hikvision</option>
            </select>
        </div>

        <div class="form-group">
            <label for="kategori_pesanan">Kategori Pesanan:</label>
            <select name="kategori_pesanan" id="kategori_pesanan" class="form-control" required>
                <option value="install ulang" <?= ($order['kategori_pesanan'] == 'install ulang') ? 'selected' : '' ?>>Install Ulang</option>
                <option value="mati total" <?= ($order['kategori_pesanan'] == 'mati total') ? 'selected' : '' ?>>Mati Total</option>
                <option value="revil toner" <?= ($order['kategori_pesanan'] == 'revil toner') ? 'selected' : '' ?>>Revil Toner</option>
                <option value="ganti tinta" <?= ($order['kategori_pesanan'] == 'ganti tinta') ? 'selected' : '' ?>>Ganti Tinta</option>
                <option value="order wifi" <?= ($order['kategori_pesanan'] == 'order wifi') ? 'selected' : '' ?>>Order WiFi</option>
                <option value="order cctv" <?= ($order['kategori_pesanan'] == 'order cctv') ? 'selected' : '' ?>>Order CCTV</option>
            </select>
        </div>

        <div class="form-group">
            <label for="jumlah_pesanan">Jumlah Pesanan:</label>
            <input type="number" name="jumlah_pesanan" id="jumlah_pesanan" class="form-control" value="<?= $order['jumlah_pesanan'] ?>" required>
        </div>

        <div class="form-group">
            <label for="deskripsi_pesanan">Deskripsi Pesanan:</label>
            <textarea name="deskripsi_pesanan" id="deskripsi_pesanan" class="form-control" required><?= $order['deskripsi_pesanan'] ?></textarea>
        </div>order

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $order['alamat'] ?>" required>
        </div>

        <div class="form-group">
            <label for="whatsapp_number">Nomor WhatsApp:</label>
            <input type="text" name="whatsapp_number" id="whatsapp_number" class="form-control" value="<?= $order['whatsapp_number'] ?>" required>
        </div>

        <div class="form-group">
            <label for="ketentuan_servis">Ketentuan Servis:</label>
            <select name="ketentuan_servis" id="ketentuan_servis" class="form-control" required>
                <option value="ambil" <?= ($order['ketentuan_servis'] == 'ambil') ? 'selected' : '' ?>>Ambil</option>
                <option value="antar" <?= ($order['ketentuan_servis'] == 'antar') ? 'selected' : '' ?>>Antar</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>