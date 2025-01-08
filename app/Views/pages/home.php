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
    <a href="/pesanan/create-pesanan-pengguna">
        <i class="bi bi-cart-plus-fill"></i> Tambah Pesanan
    </a>
</button>

<h4>Daftar Pesanan</h4>
<hr>
<table border="1">
    <tr>
        <th>No</th>
        <th>Alamat</th>
        <th>WhatsApp</th>
        <th>Jenis</th>
        <th>Merek</th>
        <th>Kategori</th>
        <th>Ketentuan</th>
        <th>Jumlah</th>
        <th>Aksi</th>
    </tr>
    <?php if (!empty($orders)): // Pastikan data ada ?>
        <?php foreach ($orders as $key => $order): ?>
        <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $order['alamat'] ?></td>
            <td><?= $order['whatsapp_number'] ?></td>
            <td><?= $order['jenis_pesanan'] ?></td>
            <td><?= $order['merek_pesanan'] ?></td>
            <td><?= $order['kategori_pesanan'] ?></td>
            <td><?= $order['ketentuan_servis'] ?></td>
            <td><?= $order['jumlah_pesanan'] ?></td>
            <td>
                <a href="/pesanan/edit-pesanan-pengguna/<?= $order['id'] ?>">Edit</a>
                <a href="/pesanan/hapus-pesanan-pengguna/<?= $order['id'] ?>">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="8">Belum ada data pesanan.</td>
        </tr>
    <?php endif; ?>
</table>

<h4>Daftar Pesanan Selesai</h4>
<hr>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Jenis Pesanan</th>
            <th>Merek Pesanan</th>
            <th>Kategori Pesanan</th>
            <th>Jumlah Pesanan</th>
            <th>Deskripsi</th>
            <th>Alamat</th>
            <th>Nomor WhatsApp</th>
            <th>Ketentuan Servis</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($pesananSelesai)): ?>
            <?php foreach ($pesananSelesai as $pesanan): ?>
                <tr>
                    <td><?= $pesanan['id'] ?></td>
                    <td><?= $pesanan['jenis_pesanan'] ?></td>
                    <td><?= $pesanan['merek_pesanan'] ?></td>
                    <td><?= $pesanan['kategori_pesanan'] ?></td>
                    <td><?= $pesanan['alamat'] ?></td>
                    <td><?= $pesanan['whatsapp_number'] ?></td>
                    <td><?= $pesanan['status'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">Tidak ada pesanan selesai.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
