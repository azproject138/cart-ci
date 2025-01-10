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
    <link rel="stylesheet" href="/assets/tambah_pesanan_pengguna.css">
    <title>Pesanan Pengguna</title>
</head>
<body>
    <div class="container">
        <h2>Tambah Pesanan</h2>
        <hr>

        <div class="form-group">
            <form action="<?= base_url('/pesanan/tambah-pesanan-pengguna'); ?>" method="post">
                <?= csrf_field(); ?>

                <div class="form-identitas">
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <input type="text" class="form-control mt-1" name="alamat" id="alamat" value="<?= esc($user['alamat'] ?? '') ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="whatsapp_number" class="form-label">WhatsApp:</label>
                        <input type="text" class="form-control mt-1" name="whatsapp_number" id="whatsapp_number" value="<?= esc($user['whatsapp_number'] ?? '') ?>" readonly>
                    </div>
                </div>

                <div class="form-pesanan">
                    <div class="mb-3">
                        <label for="jenisPesanan" class="form-label">Jenis Pesanan</label>
                        <select id="jenisPesanan" name="jenis_pesanan" class="input form-control" required>
                            <option value="">Pilih Jenis Pesanan</option>
                            <option value="Servis Laptop">Servis Laptop</option>
                            <option value="Servis Printer">Servis Printer</option>
                            <option value="Pasang WiFi">Pasang WiFi</option>
                            <option value="Pasang CCTV">Pasang CCTV</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="merekPesanan" class="form-label">Merek Pesanan</label>
                        <select id="merekPesanan" name="merek_pesanan" class="input form-control" required>
                            <option value="">Pilih Merek</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="kategoriPesanan" class="form-label">Kategori Pesanan</label>
                        <select id="kategoriPesanan" name="kategori_pesanan" class="input form-control" required>
                            <option value="">Pilih Kategori</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="ketentuan_servis" class="form-label">Ketentuan Servis:</label>
                        <select name="ketentuan_servis" class="input form-control" id="ketentuan_servis">
                            <option value="Pilih Ketentuan">Pilih Ketentuan</option>
                            <option value="Antar">Antar</option>
                            <option value="Ambil">Ambil</option>
                        </select>
                    </div>

                </div>

                <div class="form-ketentuan">
                    <div class="mb-3">
                        <label for="tanggal_pesanan" class="form-label">Tanggal Pesanan</label>
                        <input type="date" class="form-control" name="tanggal_pesanan" id="tanggal_pesanan" value="<?= set_value('tanggal_pesanan') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="jumlahPesanan" class="form-label">Jumlah Pesanan</label>
                        <input type="number" id="jumlahPesanan" name="jumlah_pesanan" class="input form-control mt-1" min="1" required>
                    </div>
                </div>

                <div class="form-deskripsi">
                    <div class="mb-3">
                        <label for="deskripsiPesanan" class="form-label">Deskripsi Pesanan</label>
                        <textarea id="deskripsiPesanan" name="deskripsi_pesanan" class="input form-control mt-1" rows="3" required></textarea>
                    </div>
                </div>

                <div class="mb-3 mt-3 d-flex justify-content-center align-items-center flex-column gap-2 text-center">
                    <button type="submit" class="btn btn-primary submit-btn">
                        <i class="bi bi-cloud-download"></i> Simpan
                    </button>
                    <button type="button" class="close-btn">
                        <a href="/">
                            <i class="bi bi-x"></i>
                        </a>
                    </button>
                </div>
            </form>
        </div>

    </div>
    <script src="/assets/pesananPengguna.js"></script>
    <script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>