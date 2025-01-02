<div class="mt-5">
    <h4>Daftar Nomor WhatsApp</h4>
    <hr>

    <?php if (empty($user['whatsapp_number'])): ?>
        <div class="alert alert-warning">
            <strong>Nomor WhatsApp belum ditambahkan.</strong>
            <a href="<?= site_url('/user/whatsapp') ?>" class="alert-link">Tambahkan sekarang</a>.
        </div>
    <?php else: ?>
        <div class="alert alert-info">
            <strong>No WhatsApp:</strong> <?= esc($user['whatsapp_number']) ?>
            <br>
            <strong>Status:</strong> <?= $user['is_main_whatsapp'] ? 'Utama' : 'Cadangan' ?>
        </div>
    <?php endif; ?>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahWhatsappPengguna">
        <i class="bi bi-plus-lg"></i> Add
    </button>

    <!-- Modal -->
    <div class="modal fade" id="tambahWhatsappPengguna" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahWhatsappPenggunaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Nomor Whatsapp</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('/whatsapp/tambah-whatsapp-pengguna') ?>" method="post">
                        <div class="form-group">
                            <label for="whatsapp_number">Nomor WhatsApp</label>
                            <input type="text" class="form-control" name="whatsapp_number" id="whatsapp_number" value="<?= (!empty($user['whatsapp_number'])) ?>" required>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="is_main" <?= (!empty($user['is_main_whatsapp'])) ? 'checked' : '' ?>> Jadikan nomor utama
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if (!empty($user['whatsapp_number'])): ?>
        <form action="<?= site_url('/whatsapp/hapus-whatsapp-pengguna') ?>" method="get" class="mt-2">
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-trash-fill"></i> Delete
            </button>
        </form>
    <?php endif; ?>
</div>