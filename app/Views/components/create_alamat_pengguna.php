<div class="container mt-5">
    <h3>Alamat Pengguna</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tipe Alamat</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php if (isset($addresses) && !empty($addresses)): ?>
                    <?php foreach ($addresses as $address): ?>
                        <p><?= $address ?></p>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Tidak ada alamat yang tersedia.</p>
                <?php endif; ?>
            </tr>
        </tbody>
    </table>
</div>
<br>
<h3>Alamat Pengguna</h3>
<?php if (!empty($addresses)): ?>
    <ul>
        <?php foreach ($addresses as $address): ?>
            <li>
                <strong><?= ucfirst($address['address_type']) ?>:</strong> <?= $address['address_text'] ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Tidak ada alamat yang tersedia.</p>
<?php endif; ?>


<div class="text-center">
    <!-- Tombol Edit Alamat -->
    <div>
        <button 
            class="btn btn-primary" 
            data-bs-toggle="modal" 
            data-bs-target="#addressModal">
            <i class="bi bi-geo-alt-fill"></i> Edit Alamat
        </button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addressModalLabel">Edit Alamat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('profile/simpan-alamat-pengguna') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="address_type" class="form-label">Tipe Alamat</label>
                        <select class="form-select" id="address_type" name="address_type" required>
                            <option value="Rumah">Rumah</option>
                            <option value="Kantor">Kantor</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                    </div>
                    <div class="text-center">
                        <a 
                            href="https://www.google.com/maps" 
                            target="_blank" 
                            class="btn btn-outline-secondary">
                            <i class="bi bi-map"></i> Cari di Google Map
                        </a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Alamat</button>
                </div>
            </form>
        </div>
    </div>
</div>