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
        <?= view('components/foto_profile', ['user' => $user]) ?>
        <form action="/profile/update-address" method="POST">
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="address" name="address" value="<?= isset($user['address']) ? $user['address'] : '' ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <form action="/profile/update-whatsapp" method="POST">
            <div class="mb-3">
                <label for="whatsapp" class="form-label">Nomor WhatsApp</label>
                <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="<?= isset($user['whatsapp']) ? $user['whatsapp'] : '' ?>">
            </div>
            <button type="submit" class="btn btn-primary">Kirim OTP</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>