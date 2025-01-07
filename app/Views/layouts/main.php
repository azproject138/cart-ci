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
    <link rel="stylesheet" href="/assets/tabelPengguna.css">

</head>
<body>

    <div id="sidebar" class="sidebar">
        <?= $this->include('components/sidebar') ?>
    </div>

    <header>
        <?= $this->include('components/navbar') ?>
    </header>

    <?= $this->include('components/alerts') ?>

    <div id="main-content">
        <button id="open-btn" class="open-btn"><i class="bi bi-list"></i></button>
        <?= $this->renderSection('content') ?>
    </div>

    <script src="/assets/sidebar.js"></script>
    <script src="/assets/toggleDropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
