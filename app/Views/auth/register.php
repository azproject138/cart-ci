<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Tambahkan Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/style.css">
    <style>
        body {
            background-color: #ececec;
        }

        .PassConfirPass {
            width: 100px;
            padding: 15px;
            margin-left: 0;
            margin-right: 0;
            display: flex;
            border-radius: 0;
        }

        .toggle-password {
            height: 54px;
            cursor: pointer;
            color: #333;
            border-radius: 0;
        }
    </style>
</head>
<body>

    <section class="container">
        <main class="form-register">
            <div class="row">
                <form class="form-register" action="/register" method="post">
                    <?= csrf_field() ?>
                    <h2>Register</h2>
                    
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <div class="">
                        <label for="username" class="form-label">Username :</label>
                        <input type="text" name="username" placeholder="Username" value="<?= old('username') ?>" required>
                    </div>
                    <div class="">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" name="email" placeholder="Email" value="<?= old('email') ?>" required>
                    </div>
                    <div class="">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control PassConfirPass" id="password" name="password" placeholder="Enter password" required>
                            <span class="input-group-text toggle-password" data-target="password">
                                <i class="bi bi-eye-slash"></i>
                            </span>
                        </div>
                    </div>
                    <div class="">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control PassConfirPass" id="confirm_password" name="confirm_password" placeholder="Confirm password" required>
                            <span class="input-group-text toggle-password" data-target="confirm_password">
                                <i class="bi bi-eye-slash"></i>
                            </span>
                        </div>
                    </div>
                    <button class="submit-btn-register" type="submit">Register</button>
                    <p class="link-btn-login-register">Sudah punya akun?<a href="/login"> Login</a></p>
                </form>
            </div>
        </main>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
    <script src="/assets/togglePassword.js"></script>
</body>
</html>
