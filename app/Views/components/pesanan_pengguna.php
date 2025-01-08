<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tambahkan Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <title>Order Pesanan Pengguna</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Tambah Pesanan</h1>

        <form action="<?= base_url('pesanan/tambah-pesanan-pengguna'); ?>" method="post">
            <?= csrf_field(); ?>

            <div>
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" id="alamat" value="<?= esc($user['alamat'] ?? '') ?>" readonly>
            </div>
            <div>
                <label for="whatsapp_number">WhatsApp:</label>
                <input type="text" name="whatsapp_number" id="whatsapp_number" value="<?= esc($user['whatsapp_number'] ?? '') ?>" readonly>
            </div>

            <!-- Jenis Pesanan -->
            <div class="mb-3 mt-2">
                <label for="jenisPesanan" class="form-label">Jenis Pesanan</label>
                <select id="jenisPesanan" name="jenis_pesanan" class="form-control" required>
                    <option value="">Pilih Jenis Pesanan</option>
                    <option value="Servis Laptop">Servis Laptop</option>
                    <option value="Servis Printer">Servis Printer</option>
                    <option value="Pasang WiFi">Pasang WiFi</option>
                    <option value="Pasang CCTV">Pasang CCTV</option>
                </select>
            </div>

            <!-- Merek Pesanan -->
            <div class="mb-3">
                <label for="merekPesanan" class="form-label">Merek Pesanan</label>
                <select id="merekPesanan" name="merek_pesanan" class="form-control" required>
                    <option value="">Pilih Merek</option>
                </select>
            </div>

            <!-- Kategori Pesanan -->
            <div class="mb-3">
                <label for="kategoriPesanan" class="form-label">Kategori Pesanan</label>
                <select id="kategoriPesanan" name="kategori_pesanan" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                </select>
            </div>

            <label for="ketentuan_servis">Ketentuan Servis:</label>
            <select name="ketentuan_servis" id="ketentuan_servis">
                <option value="Pilih Ketentuan">Pilih Ketentuan</option>
                <option value="Antar">Antar</option>
                <option value="Ambil">Ambil</option>
            </select>

            <!-- Jumlah Pesanan -->
            <div class="mb-3">
                <label for="jumlahPesanan" class="form-label">Jumlah Pesanan</label>
                <input type="number" id="jumlahPesanan" name="jumlah_pesanan" class="form-control" min="1" required>
            </div>

            <!-- Deskripsi Pesanan -->
            <div class="mb-3">
                <label for="deskripsiPesanan" class="form-label">Deskripsi Pesanan</label>
                <textarea id="deskripsiPesanan" name="deskripsi_pesanan" class="form-control" rows="3" required></textarea>
            </div>

            <!-- Tombol Submit -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Tambah Pesanan</button>
            </div>
        </form>

    </div>
    <script src="/assets/pesananPengguna.js"></script>
    <script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>