<div class="mt-4">
    <h3>Nomor WhatsApp</h3>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nomor WhatsApp</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($numbers)): ?>
                <?php foreach ($numbers as $number): ?>
                <tr>
                    <td><?= $number['id'] ?></td>
                    <td><?= $number['whatsapp_number'] ?></td>
                    <td>
                        <a href="/whatsapp/edit/<?= $number['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/whatsapp/delete/<?= $number['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center">Belum ada nomor WhatsApp.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahNomorWhattsapp">
        <i class="bi bi-plus-lg"></i> Tambah Nomor WhatsApp
    </button>
    <!-- Modal -->
    <div class="modal fade" id="TambahNomorWhattsapp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="TambahNomorWhattsappLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Nomor WhatsApp</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/whatsapp/store-whatsapp-pengguna" method="post">
                        <label for="whatsapp_number">Nomor WhatsApp:</label>
                        <input type="text" name="whatsapp_number" id="whatsapp_number" required>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>