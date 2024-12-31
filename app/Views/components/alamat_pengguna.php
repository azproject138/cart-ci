<div class="mt-5">
    <h4>Daftar Alamat</h4>
    <hr>
    <table border="1">
        <thead>
            <tr>
                <th>Alamat</th>
                <th>Tipe</th>
                <th>Utama</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= esc($user['alamat']) ?></td>
                        <td><?= esc($user['tipe_alamat']) ?></td>
                        <td><?= $user['alamat_utama'] ? 'Yes' : 'No' ?></td>
                        <td>
                            <a href="/alamat/edit/<?= $user['id'] ?>">Edit</a>
                            <a href="/alamat/hapus-alamat-pengguna/<?= $user['id'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Alamat belum ditambahkan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#tambahAlamatPengguna">
        <i class="bi bi-plus-lg"></i> Tambah
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
                    <h5><?= isset($user) ? 'Edit Alamat' : 'Tambah Alamat' ?></h5>
                    <form method="post" action="<?= isset($user) ? '/alamat/update-alamat-pengguna/' . $user['id'] : '/alamat' ?>">
                        <label>Alamat:</label>
                        <textarea name="alamat"><?= isset($user) ? esc($user['alamat']) : '' ?></textarea>

                        <label>Tipe Alamat:</label>
                        <select name="tipe_alamat">
                            <option value="home" <?= isset($user) && $user['tipe_alamat'] == 'home' ? 'selected' : '' ?>>Home</option>
                            <option value="office" <?= isset($user) && $user['tipe_alamat'] == 'office' ? 'selected' : '' ?>>Office</option>
                        </select>

                        <label>Alamat Utama:</label>
                        <input type="checkbox" name="alamat_utama" value="1" <?= isset($user) && $user['alamat_utama'] ? 'checked' : '' ?>>

                        <button type="submit" class="btn btn-danger">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>