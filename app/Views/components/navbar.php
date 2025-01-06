<?php $user = $user ?? null; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <span class="navbar-brand" href="#"><?= session('user')['username'] ?></span>
        
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
                <img src="<?= base_url('uploads/profiles/' . (session()->get('profile_picture') ?: 'default-profile.jpg')) ?>" alt="Foto Profil" class="rounded-circle" width="30" height="30">
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                <li><a class="dropdown-item" href="/settings">Settings</a></li>
                <li><a class="dropdown-item text-danger" href="/logout">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
