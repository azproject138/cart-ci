<div class="mt-5">
    <h4>Daftar Alamat</h4>
    <hr>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Alamat</th>
                <th>Jenis</th>
                <th>Utama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['alamat'] ?></td>
                    <td><?= $user['tipe_alamat'] ?></td>
                    <td><?= $user['alamat_utama'] ? 'Ya' : 'Tidak' ?></td>
                    <td>
                        <a href="/alamat/edit/<?= $user['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="/alamat/hapus-alamat-pengguna/<?= $user['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus alamat?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#tambahAlamatPengguna">
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
                    <h5><?= isset($user) ? 'Edit Alamat' : 'Tambah Alamat' ?></h5>
                    <form action="/alamat/tambah-alamat-pengguna" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tipe_alamat">Jenis Alamat</label>
                            <select name="tipe_alamat" id="tipe_alamat" class="form-control" required>
                                <option value="rumah">Rumah</option>
                                <option value="kantor">Kantor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="alamat_utama" id="alamat_utama" value="1">
                            <label for="alamat_utama">Jadikan alamat utama</label>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>