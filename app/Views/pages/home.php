<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Halaman Utama
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <button id="tambah-pesanan" class="tambah-pesanan">
        <i class="bi bi-cart-plus-fill"></i> Tambah Pesanan
    </button>
<?= $this->endSection() ?>
