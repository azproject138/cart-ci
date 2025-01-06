<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Tambahkan Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/style.css">
    <style>
        body {
            background-color: #ececec;
            font-family: Arial, sans-serif;
            box-sizing: border-box;
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
            height: 100vh;
        }

        .alerts {
            position: fixed;
            top: 10px;
            left: 10px;
            transform: translateX(-50%);
        }

    </style>
</head>
<body>
    <div class="alerts">
        <?= $this->include('components/alerts') ?>
    </div>
    <main>
        <div class="row">
            <form class="form-login" action="/login" method="post">
                <?= csrf_field() ?>
                <h2>Login</h2>

                <div class="">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" class="form-input-log" name="email" placeholder="Email" value="<?= old('email') ?>" required>
                </div>

                <div class="mb-3 position-relative">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" style="padding: 14px; border-radius: 0; border: none; border-radius: 5px; background-color:rgb(255, 255, 255);" placeholder="Password" required>
                    <span class="position-absolute top-50 end-0 translate-middle-y me-2" style="cursor: pointer; margin-top: 10px;" onclick="togglePassword('password')">
                        <i class="bi bi-eye-slash" style=" margin-right: 10px;" id="password-icon"></i>
                    </span>
                </div>
                <button class="submit-btn-login" type="submit">Login</button>
                <p class="link-btn-login-register">Belum punya akun?<a href="/register" class="register">Register</a></p>
            </form>
        </div>
    </main>

    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/togglePassword.js"></script>
</body>
</html>
