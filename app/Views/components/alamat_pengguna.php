<div class="mb-4">
    <strong>Alamat Rumah:</strong>
    <p><?= $user['home_address'] ?? 'Belum diatur' ?></p>
    <strong>Alamat Kantor:</strong>
    <p><?= $user['office_address'] ?? 'Belum diatur' ?></p>
</div>

<a href="<?= base_url('components/create_alamat_pengguna') ?>" class="btn btn-primary">Tambah Alamat</a>
<a href="<?= base_url('components/edit_alamat_pengguna/' . session()->get('user_id')) ?>" class="btn btn-warning">Edit Alamat</a>