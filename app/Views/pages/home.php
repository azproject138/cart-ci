<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    .tambah-pesanan {
        position: fixed;
        bottom: 20px;
        right: 20px;
    }
</style>

<div class="container">
    <div class="row">
        <?= $this->include('components/status_pesanan_pengguna') ?>
    </div>

    <button id="tambah-pesanan" class="tambah-pesanan btn btn-bd-primary">
        <a href="/pesanan/create-pesanan-pengguna">
            <i class="bi bi-cart-plus-fill"></i> Tambah
        </a>
    </button>

    <div class="table-responsive">
        <p class="p-2 text-center fw-bold fs-5 text-uppercase">Daftar Pesanan</p>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Alamat</th>
                <th>WhatsApp</th>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Merek</th>
                <th>Kategori</th>
                <th>Ketentuan</th>
                <th>Jumlah</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php if (!empty($orders)):?>
                <?php foreach ($orders as $key => $order): ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $order['alamat'] ?></td>
                    <td><?= $order['whatsapp_number'] ?></td>
                    <td><?= esc($order['tanggal_pesanan']) ?></td>
                    <td><?= $order['jenis_pesanan'] ?></td>
                    <td><?= $order['merek_pesanan'] ?></td>
                    <td><?= $order['kategori_pesanan'] ?></td>
                    <td><?= $order['ketentuan_servis'] ?></td>
                    <td><?= $order['jumlah_pesanan'] ?></td>
                    <td><?= $order['deskripsi_pesanan'] ?></td>
                    <td>
                        <span class="badge bg-<?= $order['status'] === 'menunggu' ? 'warning' : 'success' ?>">
                            <?= ucfirst($order['status']) ?>
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-primary me-2 mb-2">
                            <a href="/pesanan/edit-pesanan-pengguna/<?= $order['id'] ?>">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                        </button>
                        <button class="btn btn-danger me-2 mb-2">
                            <a href="/pesanan/hapus-pesanan-pengguna/<?= $order['id'] ?>">
                                <i class="bi bi-trash-fill"></i> Hapus
                            </a>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">Belum ada data pesanan.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

</div>
<?= $this->endSection() ?>
