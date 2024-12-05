<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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
        <main class="form-register">
            <div class="row">
                <form class="form-register" action="/register" method="post">
                    <?= csrf_field() ?>
                    
                    <h2>Register</h2>

                    <!-- pesan error -->
                    <?php if (session()->getFlashdata('error')): ?>
                        <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
                    <?php endif; ?>

                    <!-- pesan sukses -->
                    <?php if (session()->getFlashdata('success')): ?>
                        <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
                    <?php endif; ?>

                    <div class="">
                        <label for="username" class="form-label">Username :</label>
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <!-- Input password -->
                    <div class="" style="position: relative;">
                        <label for="password" class="form-label">Password :</label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <span class="btn-togglePasswordIcon position-absolute end-0 translate-middle-y me-3">
                            <i id="togglePasswordIcon" class="bi bi-eye" onclick="togglePassword('password', 'togglePasswordIcon')" style="cursor: pointer;"></i>
                        </span>
                    </div>
                    <div class="" style="position: relative;">
                        <label for="password_confirmation" class="form-label">Confirm Password :</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                        <span class="btn-togglePasswordIcon position-absolute end-0 translate-middle-y me-3">
                            <i id="togglePasswordIcon" class="bi bi-eye" onclick="togglePassword('password_confirmation', 'togglePasswordIcon')" style="cursor: pointer;"></i>
                        </span>
                    </div>

                    <button class="submit-btn-register" type="submit">Register</button>
                    <p class="link-btn-login-register">Sudah punya akun?<a href="/login"> Login</a></p>
                </form>
            </div>
        </main>
    </section>

    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/togglePassword.js"></script>
</body>
</html>
