<div class="mt-5">
    <h4>Daftar Alamat</h4>
    <hr>
    <?php if (!empty($user['alamat'])): ?>
        <div class="alert alert-info">
            <strong>Alamat:</strong> <?= esc($user['alamat']) ?><br>
            <strong>Jenis:</strong> <?= esc($user['tipe_alamat']) == 'rumah' ? 'Rumah' : 'Kantor' ?><br>
            <strong>Status:</strong> <?= $user['alamat_utama'] ? 'Utama' : 'Cadangan' ?>
        </div>
    <?php endif; ?>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAlamatPengguna">
        <i class="bi bi-plus-lg"></i> Add
    </button>

    <!-- Modal -->
    <div class="modal fade" id="tambahAlamatPengguna" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahAlamatPenggunaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Alamat</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('/alamat/tambah-alamat-pengguna') ?>" method="post">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3" required><?= esc($user['alamat']) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Jenis Alamat</label><br>
                            <label>
                                <input type="radio" name="tipe_alamat" value="rumah" <?= esc($user['tipe_alamat']) == 'rumah' ? 'checked' : '' ?>> Rumah
                            </label>
                            <label class="ml-3">
                                <input type="radio" name="tipe_alamat" value="kantor" <?= esc($user['tipe_alamat']) == 'kantor' ? 'checked' : '' ?>> Kantor
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="utama" <?= $user['alamat_utama'] ? 'checked' : '' ?>> Jadikan Alamat Utama
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Alamat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php if (!empty($user['alamat'])): ?>
        <form action="<?= site_url('/alamat/hapus-alamat-pengguna') ?>" method="get" class="mt-2">
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-trash-fill"></i> Delete
            </button>
        </form>
    <?php endif; ?>
</div>