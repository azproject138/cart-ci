<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="<?= base_url('uploads/' . session('user')['profile_picture'] ?? 'default.png') ?>" alt="Profile" class="rounded-circle" width="30" height="30">
        <?= session('user')['username'] ?>
        <?php if (!session('user')['profile_picture'] || !session('user')['address'] || !session('user')['whatsapp_number']): ?>
            <span class="text-danger">•</span>
        <?php endif; ?>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
        <li><a class="dropdown-item" href="/profile">Profile</a></li>
        <li><a class="dropdown-item" href="/settings">Settings</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item text-danger" href="/logout">Logout</a></li>
    </ul>
</li>