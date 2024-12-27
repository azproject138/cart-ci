<div class="mt-5">
    <h4>Daftar Alamat</h4>
    <hr>
    <a href="/profile/create">Tambah Alamat</a>
    <ul>
        <?php if (!empty($addresses)): ?>
            <?php foreach ($addresses as $address): ?>
                <li>
                    <?= $address['address'] ?> (<?= $address['type'] ?>) 
                    <?php if ($address['is_primary']): ?> - Alamat Utama<?php endif; ?>
                    <a href="/addresses/edit/<?= $address['address_id'] ?>">Edit</a>
                    <a href="/addresses/delete/<?= $address['address_id'] ?>">Hapus</a>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Tidak ada alamat yang ditemukan.</li>
        <?php endif; ?>
    </ul>
</div>