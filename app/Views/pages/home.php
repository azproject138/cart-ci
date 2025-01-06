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

<h4>Daftar Pesanan Pengguna</h4>
<table border="1">
    <tr>
        <th>No</th>
        <th>Jenis Pesanan</th>
        <th>Merek Pesanan</th>
        <th>Kategori Pesanan</th>
        <th>Ketentuan Servis</th>
        <th>Jumlah Pesanan</th>
        <th>Alamat</th>
        <th>WhatsApp</th>
        <th>Aksi</th>
    </tr>
    <?php if (!empty($orders)): // Pastikan data ada ?>
        <?php foreach ($orders as $key => $order): ?>
        <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $order['jenis_pesanan'] ?></td>
            <td><?= $order['merek_pesanan'] ?></td>
            <td><?= $order['kategori_pesanan'] ?></td>
            <td><?= $order['ketentuan_servis'] ?></td>
            <td><?= $order['jumlah_pesanan'] ?></td>
            <td><?= $order['alamat'] ?></td>
            <td><?= $order['whatsapp_number'] ?></td>
            <td>
                <a href="/pesanan/edit/<?= $order['id'] ?>">Edit</a>
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

<?= $this->endSection() ?>
