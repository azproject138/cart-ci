<h3>Daftar Nomor WhatsApp</h3>
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
        <?php if (!empty($whatsapp_numbers)): ?>
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
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">Tidak ada nomor WhatsApp</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <i class="bi bi-plus-lg"></i> Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Nomor Whatsapp</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/whatsapp/tambah-whatsapp-pengguna" method="post">
                    <div class="mb-3">
                        <label for="whatsapp_number" class="form-label">Nomor WhatsApp</label>
                        <input type="text" name="whatsapp_number" class="form-control" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_primary" class="form-check-input">
                        <label class="form-check-label">Jadikan Utama</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>