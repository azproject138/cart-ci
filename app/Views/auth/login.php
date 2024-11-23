<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="/assets/style.css">
    <style>
        
    </style>
</head>
<body>
    <section class="container form-login">
        <div class="row">
            <h2>Login</h2>

            <?php if (session()->getFlashdata('error')): ?>
                <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
            <?php endif; ?>

            <form action="/login" method="post">
                <?= csrf_field() ?>
                <input type="email" name="email" placeholder="Email" required><br>

                <!-- Input password -->
                <div style="position: relative;">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <span class="toggle-password" onclick="togglePassword('password')">&#128065;</span>
                </div><br>

                <button type="submit">Login</button>
            </form>
            <a href="/register">Belum punya akun? Daftar disini.</a>
        </div>
    </section>
    <script src="/assets/togglePassword.js"></script>
</body>
</html>
