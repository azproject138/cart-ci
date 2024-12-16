<div class="profile-container text-center">
    <img src="<?= base_url('uploads/profile_pictures/' . ($user['profile_picture'] ?? 'default.png')) ?>" 
        alt="Foto Profil" 
        class="rounded-circle profile-picture mb-3" 
        style="width: 150px; height: 150px; object-fit: cover;">
    <p><?= esc($user['username']) ?></p>

    <?php if (!$user['profile_picture']): ?>
        <p class="text-danger"><i class="bi bi-exclamation-circle"></i> Foto profil belum diatur!</p>
    <?php endif; ?>

    <a href="/profile" class="btn btn-sm btn-primary">Ubah Foto Profil</a>
</div>