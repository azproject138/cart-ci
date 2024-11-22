<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        .toggle-password {
            cursor: pointer;
            position: absolute;
            margin-left: -30px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
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

    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }
    </script>
</body>
</html>
