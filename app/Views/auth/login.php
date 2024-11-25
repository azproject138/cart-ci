<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Tambahkan Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/style.css">
    <style>
        body {
            background-color: #ececec;
        }
    </style>
</head>
<body>
    <section class="container">
        <main class="form-login">
            <div class="row">

                <form class="form-login" action="/login" method="post">
                    <?= csrf_field() ?>
                    <h2>Login</h2>

                    

                    <div class="">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" name="email" placeholder="Email" value="<?= old('email') ?>" required>
                    </div>

                    <!-- Input password -->
                    <div class="" style="position: relative;">
                        <label for="password" class="form-label">Password :</label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <span class="btn-togglePasswordIcon position-absolute end-0 translate-middle-y me-3">
                            <i id="togglePasswordIcon" class="bi bi-eye" onclick="togglePassword('password', 'togglePasswordIcon')" style="cursor: pointer;"></i>
                        </span>
                        <?php if (session()->getFlashdata('error')): ?>
                        <p class="text-error" style="color: red; font-size: 15px"><?= session()->getFlashdata('error') ?></p>
                        <?php endif; ?>
                    </div>

                    <button class="submit-btn-login" type="submit">Login</button>
                    <p class="link-btn-login-register">Belum punya akun?<a href="/register" class="register">Daftar</a></p>
                </form>
            </div>
        </main>
    </section>

    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/togglePassword.js"></script>
</body>
</html>
