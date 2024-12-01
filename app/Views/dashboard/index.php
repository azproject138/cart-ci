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
            <button id="close-btn" class="close-btn">×</button>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </nav>
    <a href="/logout">Logout</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
