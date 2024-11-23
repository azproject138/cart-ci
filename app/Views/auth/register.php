<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="/assets/register.css">
    <style>
        body {
            background-color: #ececec;
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
                    <p>Username :</p>
                    <input type="text" name="username" placeholder="Username" required><br>
                </div>
                <div class="form-email-register">
                    <p>Email :</p>
                    <input type="email" name="email" placeholder="Email" required><br>
                </div>
                <!-- Input password -->
                <div style="position: relative;">
                    <p>Password :</p>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <span class="toggle-password" onclick="togglePassword('password')">&#128065;</span>
                </div>

                <button type="submit">Register</button>
            </form>
            <a href="/login">Sudah punya akun? Login disini.</a>
        </div>
    </section>

    <script src="/assets/togglePassword.js"></script>
</body>
</html>
