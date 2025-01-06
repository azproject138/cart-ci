<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    .tambah-pesanan {
        position: fixed;
        bottom: 20px;
        right: 20px;
    }
</style>

<button id="tambah-pesanan" class="tambah-pesanan btn btn-bd-primary">
    <i class="bi bi-cart-plus-fill"></i> <a href="/pesanan/create-pesanan-pengguna">Tambah Pesanan</a>
</button>

<div class="container mt-3">
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Pesanan</th>
                    <th>Merek</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pesananpenggunas)): ?>
                    <?php foreach ($pesananpenggunas as $key => $pesananpengguna): ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= $pesananpengguna['jenis_pesanan']; ?></td>
                            <td><?= $pesananpengguna['merek_pesanan']; ?></td>
                            <td><?= $pesananpengguna['kategori_pesanan']; ?></td>
                            <td><?= $pesananpengguna['jumlah_pesanan']; ?></td>
                            <td><?= $pesananpengguna['deskripsi_pesanan']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada pesanan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
