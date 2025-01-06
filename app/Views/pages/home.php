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
                <?php foreach ($orders as $key => $order): ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $order['jenis_pesanan']; ?></td>
                        <td><?= $order['merek_pesanan']; ?></td>
                        <td><?= $order['kategori_pesanan']; ?></td>
                        <td><?= $order['jumlah_pesanan']; ?></td>
                        <td><?= $order['deskripsi_pesanan']; ?></td>
                        <td>
                            <a href="<?= base_url('orders/edit/' . $order['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('orders/delete/' . $order['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
