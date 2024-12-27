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
    <div class="container">
        <h2>Profile</h2>
        <div class="row mt-4">
            <?= $this->include('components/alerts')?>
            <?= view('components/foto_profile_pengguna')?>
            <!-- alamat pengguna -->
            <?= view('components/whatsapp_pengguna') ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/durasi_waktu_kode_otp_pengguna.js"></script>
</body>
</html>