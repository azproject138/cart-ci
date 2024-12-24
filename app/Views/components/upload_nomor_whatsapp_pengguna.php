<div class="mt-4">
    <h3>Nomor WhatsApp</h3>

    <?php if (isset($whatsapp)): ?>
        <p>Nomor WhatsApp: <?= $whatsapp['whatsapp_number'] ?></p>
        <a href="/whatsapp/edit-whatsapp-pengguna/<?= $whatsapp['id'] ?>">Edit</a>
        <a href="/whatsapp/delete-whatsapp-pengguna/<?= $whatsapp['id'] ?>">Delete</a>
    <?php else: ?>
        <p>Tidak ditemukan nomor WhatsApp.</p>
    <?php endif; ?>

    <a href="/whatsapp/add-whatsapp-pengguna">Tambah Nomor WhatsApp</a>
</div>