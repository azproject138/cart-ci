<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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

                <form action="/login" method="post">
                    <?= csrf_field() ?>
                    <h2>Login</h2><br>

                    <?php if (session()->getFlashdata('error')): ?>
                    <p style="color: red; font-size: 15px"><?= session()->getFlashdata('error') ?></p>
                    <?php endif; ?>

                    <div class="form-input-login">
                        <p>Email :</p>
                        <input type="email" name="email" placeholder="Email" value="<?= old('email') ?>" required><br>
                    </div>

                    <!-- Input password -->
                    <div class="form-login" style="position: relative;">
                        <p>Password :</p>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <span class="toggle-password" onclick="togglePassword('password')">&#128065;</span>
                    </div>

                    <button class="submit-btn-login" type="submit">Login</button>
                    <p class="link-btn-login-register">Belum punya akun?<a href="/register" class="register">Daftar</a></p>
                </form>
            </div>
        </main>
    </section>

    <script src="/assets/togglePassword.js"></script>
</body>
</html>
