<div class="container mt-4">
    <!-- Form Nomor WhatsApp -->
    <div class="mb-3">
        <label class="form-label">Nomor WhatsApp</label>
        <div class="d-flex align-items-center">
            <input 
                type="text" 
                class="form-control me-2" 
                value="<?= $user['whatsapp_number'] ?? 'Belum diatur' ?>" 
                disabled 
            />
            <a href="<?= base_url('whatsapp/upload-nomor-whatsapp') ?>" class="btn btn-primary">
                <i class="bi bi-pencil"></i> Edit
            </a>
        </div>
    </div>
</div>
