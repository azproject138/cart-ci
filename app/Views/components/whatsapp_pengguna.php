<h1>Daftar Nomor WhatsApp</h1>
<a href="/user-whatsapp/create" class="btn btn-primary">Tambah Nomor</a>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nomor WhatsApp</th>
            <th>Utama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($whatsapp_numbers as $key => $whatsapp): ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $whatsapp['whatsapp_number'] ?></td>
                <td><?= $whatsapp['is_primary'] ? 'Ya' : 'Tidak' ?></td>
                <td>
                    <a href="/user-whatsapp/edit/<?= $whatsapp['id'] ?>" class="btn btn-warning">Edit</a>
                    <a href="/user-whatsapp/delete/<?= $whatsapp['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>