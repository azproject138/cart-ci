<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Profile</title>
</head>
<body>
    <div class="container mt-4">
        <h2>Profile</h2>
        <?= $this->include('components/alerts')?>
        <?= view('components/foto_profile', ['user' => $user]) ?>

        <div class="mb-4">
            <strong>Alamat Rumah:</strong>
            <p><?= $user['home_address'] ?? 'Belum diatur' ?></p>
            <strong>Alamat Kantor:</strong>
            <p><?= $user['office_address'] ?? 'Belum diatur' ?></p>
        </div>

        <a href="<?= base_url('components/create_alamat_pengguna') ?>" class="btn btn-primary">Tambah Alamat</a>
        <a href="<?= base_url('components/edit_alamat_pengguna/' . session()->get('user_id')) ?>" class="btn btn-warning">Edit Alamat</a>

        <?= view('components/upload_nomor_whatsapp_pengguna', ['user' => $user]) ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/durasi_waktu_kode_otp_pengguna.js"></script>
</body>
</html>