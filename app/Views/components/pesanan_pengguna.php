<div class="container mt-5">
    <h1 class="text-center">Tambah Pesanan</h1>
    <form action="#" method="#">

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