<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    
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
    <h2>Register</h2>
    <form action="/register" method="post">
        <?= csrf_field() ?>
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Register</button>
    </form>
    <a href="/login">Already have an account? Login here</a>
</body>
</html>
