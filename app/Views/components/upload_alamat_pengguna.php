<?= $this->include('components/alerts') ?>

<div class="container mt-4">
    <div class="mb-3">
        <label class="form-label">Alamat Rumah</label>
        <div class="d-flex align-items-center">
            <input 
                type="text" 
                class="form-control me-2" 
                value="<?= $user['home_address'] ?? 'Belum diatur' ?>" 
                disabled 
            />
            <button 
                class="btn btn-primary" 
                data-bs-toggle="modal" 
                data-bs-target="#addressModal" 
                data-address-type="home">
                <i class="bi bi-pencil"></i> Edit
            </button>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Alamat Kantor</label>
        <div class="d-flex align-items-center">
            <input 
                type="text" 
                class="form-control me-2" 
                value="<?= $user['office_address'] ?? 'Belum diatur' ?>" 
                disabled 
            />
            <button 
                class="btn btn-primary" 
                data-bs-toggle="modal" 
                data-bs-target="#addressModal" 
                data-address-type="office">
                <i class="bi bi-pencil"></i> Edit
            </button>
        </div>
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
            <form action="<?= base_url('address/update') ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="address_type" id="addressType" value="">
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="address" 
                            name="address" 
                            placeholder="Masukkan alamat baru" 
                            required
                        >
                    </div>
                </div>
                <div class="modal-footer">
                    <a 
                        id="mapsLink" 
                        href="https://www.google.com/maps" 
                        target="_blank" 
                        class="btn btn-secondary">
                        <i class="bi bi-map"></i> Buka Google Maps
                    </a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>