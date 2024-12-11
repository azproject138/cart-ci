<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tambahkan Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="stylesheet" href="/assets/style.css">

</head>
<body>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Login berhasil! Selamat datang di dashboard.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <!--navbar-->
    <header>
        <div class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <?php if (session()->getFlashdata('success')): ?>
                    <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
                <?php endif; ?>
                <span class="navbar-brand"><?= $username ?></span>
                <div class="profile logo">
                    <img src="/assets/img/profile.png" alt="Logo" width="40" height="40" class="profile-dropdown">
                    <!--icon-open-dropdown-menu-->
                    <button class="toggle-btn" id="toggleBtn">
                        <i class="bi bi-chevron-down icon"></i>
                    </button>
                    <!--dropdown-menu-->
                    <div class="dropdown-menu" id="dropdownMenu">
                        <a href="#" class="dropdown-btn">
                            <i class="bi bi-person-fill" style="margin-right: 10px;"></i>
                            <span class="dropdown-text">Profile</span>
                        </a>
                        <a href="#" class="dropdown-btn">
                            <i class="bi bi-gear-wide" style="margin-right: 10px;"></i>
                            <span class="dropdown-text">Settings</span>
                        </a>
                        <a href="/logout" class="logout-btn">
                            <i class="bi bi-box-arrow-left" style="margin-right: 10px;"></i>
                            <span class="dropdown-text">Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <nav>
        <!--sidebar-->
        <div id="sidebar" class="sidebar">
            <button id="close-btn" class="close-btn"><i class="bi bi-x"></i></button>
            <ul>
                <li>
                    <a href="#">
                        <img src="/assets/img/dashboard.png" alt="dashboard">Dashboard
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="/assets/img/history.png" alt="history">Riwayat
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="/assets/img/operator.png" alt="operator">Contact
                    </a>
                </li>
            </ul>

            

            <!--Footer-->
            <div class="footer" style="width: 100%; text-align: center; padding: 10px; color: white; font-size: 12px; margin-top: 150px;">
                <span>Copyright &copy; 2024</span>
            </div>

            <div class="footer-sidebar">
                <hr>
                <div> Icons made by <a href="https://www.freepik.com" title="Freepik"> Freepik </a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com'</a></div>
            </div>
        </div>
    </nav>
    <div id="main-content">
        <button id="open-btn" class="open-btn"><i class="bi bi-list"></i></button>
    </div>

    <!--main content-->
    <main>
        <?= $this->include('partials/alerts') ?>
        <?= $this->renderSection('content') ?>
    </main>

    <script src="/assets/sidebar.js"></script>
    <script src="/assets/toggleDropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
