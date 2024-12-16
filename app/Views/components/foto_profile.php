<div class="profile-container text-center">
    <img src="<?= base_url('uploads/profile_pictures/' . ($user['profile_picture'] ?? 'default.png')) ?>" 
        alt="Foto Profil" 
        class="rounded-circle profile-picture mb-3" 
        style="width: 150px; height: 150px; object-fit: cover;">
    <p><?= esc($user['username']) ?></p>
    <a href="/profile" class="btn btn-sm btn-primary">Ubah Foto Profil</a>
</div>