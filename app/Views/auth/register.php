<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="/assets/style.css">
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
    <section class="container form-register">
        <div class="row">
            <h2>Register</h2>
            <form action="/register" method="post">
                <?= csrf_field() ?>
                <div class="form-username-register">
                    <input type="text" name="username" placeholder="Username" required><br>
                </div>
                <div class="form-email-register">
                    <input type="email" name="email" placeholder="Email" required><br>
                </div>
                <!-- Input password -->
                <div style="position: relative;">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <span class="toggle-password" onclick="togglePassword('password')">&#128065;</span>
                </div>

                <!-- Input confirm password -->
                <div style="position: relative;">
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                    <span class="toggle-password" onclick="togglePassword('confirm_password')">&#128065;</span>
                </div>

                <button type="submit">Register</button>
            </form>
            <a href="/login">Sudah punya akun? Login disini.</a>
        </div>
    </section>

    <script src="/assets/togglePassword.js"></script>
</body>
</html>
