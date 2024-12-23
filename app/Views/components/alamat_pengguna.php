<div class="mt-4 mb-4">
    <strong>Alamat Rumah:</strong>
    <p><?= $user['home_address'] ?? 'Belum diatur' ?></p>
    <strong>Alamat Kantor:</strong>
    <p><?= $user['office_address'] ?? 'Belum diatur' ?></p>
</div>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAlamat">
    <i class="bi bi-plus"></i>Tambah Alamat
</button>
<div class="modal fade" id="tambahAlamat" data-bs-backdrop="alamat" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahAlamatLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Alamat</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('profile/store-alamat-pengguna') ?>" method="post">
                    <div class="mb-3">
                        <label for="home_address" class="form-label">Alamat Rumah</label>
                        <textarea class="form-control" id="home_address" name="home_address" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="office_address" class="form-label">Alamat Kantor</label>
                        <textarea class="form-control" id="office_address" name="office_address" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editAlamat">
    <i class="bi bi-pencil"></i> Edit Alamat
</button>

<div class="modal fade" id="editAlamat" data-bs-backdrop="alamat" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editAlamatLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Alamat</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="<?= base_url('profile/edit-alamat-pengguna/' . session()->get('user_id')) ?>" method="post">
                <div class="mb-3">
                    <label for="home_address" class="form-label">Alamat Rumah</label>
                    <textarea class="form-control" id="home_address" name="home_address" rows="3"><?= $user['home_address'] ?? '' ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="office_address" class="form-label">Alamat Kantor</label>
                    <textarea class="form-control" id="office_address" name="office_address" rows="3"><?= $user['office_address'] ?? '' ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Simpan</button>
        </div>
        </div>
    </div>
</div>

<a href="<?= base_url('components/create_alamat_pengguna') ?>" class="btn btn-primary">Tambah Alamat</a>
<a href="<?= base_url('components/edit_alamat_pengguna/' . session()->get('user_id')) ?>" class="btn btn-warning">Edit Alamat</a>