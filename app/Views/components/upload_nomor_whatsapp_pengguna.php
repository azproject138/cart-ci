<div class="mt-4">
    <h3>Nomor WhatsApp</h3>

    <?php if (!empty($whatsapp)): ?>
        <ul>
            <?php foreach ($whatsapp as $item): ?>
                <li>
                    Nomor: <?= esc($item['whatsapp_number']) ?>
                    <a href="/whatsapp/edit/<?= $item['id'] ?>">Edit</a>
                    <a href="/whatsapp/delete/<?= $item['id'] ?>">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Tidak ditemukan nomor WhatsApp.</p>
    <?php endif; ?>

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
                    <form action="/whatsapp/save-whatsapp-pengguna" method="post">
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