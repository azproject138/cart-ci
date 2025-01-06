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
    <i class="bi bi-cart-plus-fill"></i> <a href="#">Tambah Pesanan</a>
</button>

<div class="container mt-3">
    <div class="row">
        <h5>Daftar Pesanan</h5>
        <hr>
        <h5>Daftar Pesanan Selesai</h5>
        <hr>
    </div>
</div>

<?= $this->endSection() ?>
