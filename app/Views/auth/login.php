<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const passwordToggle = document.getElementById('password-toggle');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                passwordToggle.textContent = 'Hide Password';
            } else {
                passwordField.type = 'password';
                passwordToggle.textContent = 'Show Password';
            }
        }
    </script>
</head>
<body>
    <h2>Login</h2>
    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
    <form action="/login" method="post">
        <?= csrf_field() ?>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" id="password" name="password" placeholder="Password" required><br>
        <button type="button" id="password-toggle" onclick="togglePasswordVisibility()">Show Password</button><br><br>
        <button type="submit">Login</button>
    </form>
    <a href="/register">Don't have an account? Register here</a>
</body>
</html>
