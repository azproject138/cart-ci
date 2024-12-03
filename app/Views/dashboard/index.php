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

    <style>
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px 20px;
            color: white;
        }

        .navbar .logo {
            font-size: 1.5em;
            font-weight: bold;
        }

        .navbar .profile {
            position: relative;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .navbar .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .navbar .dropdown {
            display: none;
            position: absolute;
            top: 60px;
            right: 0;
            background-color: white;
            color: black;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            border-radius: 5px;
        }

        .navbar .dropdown a {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: black;
        }

        .navbar .dropdown a:hover {
            background-color: #f0f0f0;
        }

        .navbar .profile .icon-down {
            margin-left: 5px;
            font-size: 0.8em;
        }

        .profile.active .dropdown {
            display: block;
        }

    </style>
</head>
<body>
    <!--navbar-->
    <header>
        <div class="navbar bg-body-tertiary">
            <div class="container-fluid">
                Welcome, <?= $username ?>
                <div class="profile">
                    <div class="profile" onclick="toggleDropdown()">
                        <img src="/assets/img/profile.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
                        <span>John Doe</span>
                        <span class="icon-down">▼</span>
                        <div class="dropdown">
                            <a href="#">Profile</a>
                            <a href="#">Settings</a>
                            <a href="/logout">
                                <img src="/assets/img/log-out.png" alt="log-out" class="btn-log-out">Logout
                            </a>
                        </div>
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
            <footer class="footer-sidebar">
                <hr>
                <div> Icons made by <a href="https://www.freepik.com" title="Freepik"> Freepik </a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com'</a></div>
            </footer>
        </div>
    </nav>
    <div id="main-content">
        <button id="open-btn" class="open-btn"><i class="bi bi-list"></i></button>
    </div>

    <script src="/assets/sidebar.js"></script>
    <script>
        function toggleDropdown() {
            const profile = document.querySelector('.profile');
            profile.classList.toggle('active');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const profile = document.querySelector('.profile');
            if (!profile.contains(event.target)) {
            profile.classList.remove('active');
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
