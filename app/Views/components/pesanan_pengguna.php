<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Pesanan Pengguna</title>
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center">Tambah Pesanan</h1>

        <form action="<?= base_url('pesanan/tambah-pesanan-pengguna'); ?>" method="post">
            <?= csrf_field(); ?>

            <label for="user_id">User ID:</label>
            <input type="number" name="user_id" id="user_id" required><br>

            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" readonly><br>

            <label for="whatsapp_number">WhatsApp Number:</label>
            <input type="text" name="whatsapp_number" id="whatsapp_number" readonly><br>

            <!-- Jenis Pesanan -->
            <div class="mb-3">
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
    <script src="/assets/data_pengguna.js"></script>
    <script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>

    <script>
        document.getElementById('user_id').addEventListener('input', function () {
            const userId = this.value;

            if (userId) {
                fetch('/pesanan/data-pengguna', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
                    },
                    body: JSON.stringify({ user_id: userId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        document.getElementById('alamat').value = data.data.alamat || '';
                        document.getElementById('whatsapp_number').value = data.data.whatsapp_number || '';
                    } else {
                        document.getElementById('alamat').value = '';
                        document.getElementById('whatsapp_number').value = '';
                    }
                })
                .catch(error => console.error('Error:', error));
            } else {
                document.getElementById('alamat').value = '';
                document.getElementById('whatsapp_number').value = '';
            }
        });
    </script>
</body>
</html>