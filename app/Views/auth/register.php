<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
                <form action="/register" method="post">
                    <?= csrf_field() ?>
                    
                    <h2>Register</h2>
                    <div class="form-username-register">
                        <p>Username :</p>
                        <input type="text" name="username" placeholder="Username" required><br>
                    </div>
                    <div class="form-email-register">
                        <p>Email :</p>
                        <input type="email" name="email" placeholder="Email" required><br>
                    </div>
                    <!-- Input password -->
                    <div class="form-password-register" style="position: relative;">
                        <p>Password :</p>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <span class="toggle-password" onclick="togglePassword('password')">&#128065;</span>
                    </div>

                    <button class="submit-btn-register" type="submit">Register</button><br><br>
                    <a href="/login">Sudah punya akun? Login disini.</a>
                </form>
            </div>
        </main>
    </section>

    <script src="/assets/togglePassword.js"></script>
</body>
</html>
