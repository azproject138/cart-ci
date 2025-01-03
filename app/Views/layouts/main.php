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
    <?= $this->include('components/navbar') ?>
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
        <?= $this->include('components/alerts') ?>
        <?= $this->renderSection('content') ?>
    </main>

    <script src="/assets/sidebar.js"></script>
    <script src="/assets/toggleDropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
