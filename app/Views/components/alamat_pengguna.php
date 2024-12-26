<div class="mt-5">
    <h4>Daftar Alamat</h4>
    <a href="/alamat-pengguna/create">Tambah Alamat</a>
    <table>
        <thead>
            <tr>
                <th>Alamat</th>
                <th>Jenis</th>
                <th>Utama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($addresses)) : ?>
                <?php foreach ($addresses as $address): ?>
                    <tr>
                        <td><?= esc($address['address']) ?></td>
                        <td><?= esc($address['type']) === 'home' ? 'Rumah' : 'Kantor' ?></td>
                        <td><?= $address['is_primary'] ? 'Ya' : 'Tidak' ?></td>
                        <td>
                            <a href="/addresses/edit/<?= $address['id'] ?>">Edit</a>
                            <a href="/addresses/delete/<?= $address['id'] ?>">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Belum ada data alamat</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>