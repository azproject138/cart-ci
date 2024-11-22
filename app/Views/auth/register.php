<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
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
    <h2>Register</h2>
    <form action="/register" method="post">
        <?= csrf_field() ?>
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="email" name="email" placeholder="Email" required><br>

        <!-- Input password -->
        <div style="position: relative;">
            <input type="password" id="password" name="password" placeholder="Password" required>
            <span class="toggle-password" onclick="togglePassword('password')">&#128065;</span>
        </div><br>

        <!-- Input confirm password -->
        <div style="position: relative;">
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
            <span class="toggle-password" onclick="togglePassword('confirm_password')">&#128065;</span>
        </div><br>

        <button type="submit">Register</button>
    </form>
    <a href="/login">Sudah punya akun? Login disini.</a>

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
