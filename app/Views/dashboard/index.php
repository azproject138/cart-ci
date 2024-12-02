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
    <!--navbar-->
    <header>
        <div class="navbar bg-body-tertiary">
            <div class="container-fluid">
                Welcome, <?= $username ?>
                <a class="navbar-brand" href="#">
                    <img src="/assets/img/logo-profile.png" alt="Logo" width="25" height="25" class="d-inline-block align-text-top">
                </a>
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
                        <img src="/assets/img/history.png" alt="">Riwayat
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="/assets/img/immigration.png" alt="immigration">Report
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="/assets/img/operator.png" alt="operator" width="" height="" class="d-inline-block align-text-top">Contact
                    </a>
                </li>
                <li>
                    <a href="/logout">
                        <img src="/assets/img/log-out.png" alt="">Logout
                    </a>
                </li>
            </ul>
        </div>
        <div id="main-content">
            <button id="open-btn" class="open-btn">☰</button>
        </div>
    </nav>

    <!--Footer-->
    <footer>
        <div> Icons made by <a href="https://www.freepik.com" title="Freepik"> Freepik </a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com'</a></div>
    </footer>
    <script src="/assets/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
