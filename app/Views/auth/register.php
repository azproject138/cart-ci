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

        .frm-inpt {
            width: 100%;
            justify-content: center;
            align-items: center;
            align-content: center;
            display: flex;
            flex-direction: column;
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

                    <div class="position-relative form-reg">
                        <label for="username" class="form-label">Username :</label>
                        <input type="text" name="username" class="frm-inpt" placeholder="Username" value="<?= old('username') ?>" required>
                    </div>
                    <div class="position-relative form-reg">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" name="email" class="frm-inpt" placeholder="Email" value="<?= old('email') ?>" required>
                    </div>
                    <div class="position-relative form-reg">
                        <label for="password" class="form-label">Password :</label>
                        <input type="password" name="password" placeholder="Password" id="password" class="form-control frm-inpt" style="padding: 14px; border-radius: 5px; border: none; background-color: #f2f2f2;" required>
                        <span class="position-absolute top-50 end-0 translate-middle-y me-2" style="cursor: pointer; margin-top: 10px;" onclick="togglePassword('password')">
                            <i class="bi bi-eye-slash" style=" margin-right: 70px;" id="password-icon"></i>
                        </span>
                    </div>
                    <div class="position-relative form-reg">
                        <label for="confirm_password" class="form-label">Confirm Password :</label>
                        <input type="password" name="confirm_password" placeholder="Confirmasi Password" id="confirm_password" class="form-control frm-inpt" style="padding: 14px; border-radius: 5px; border: none; background-color: #f2f2f2;" required>
                        <span class="position-absolute top-50 end-0 translate-middle-y me-2" style="cursor: pointer; margin-top: 10px;" onclick="togglePassword('confirm_password')">
                            <i class="bi bi-eye-slash" style=" margin-right: 70px;" id="confirm_password-icon"></i>
                        </span>
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
