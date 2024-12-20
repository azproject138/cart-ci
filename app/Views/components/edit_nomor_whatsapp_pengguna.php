<div class="container mt-4">
    <form action="<?= base_url('whatsapp/send-kode-otp') ?>" method="post">
        <div class="mb-3">
            <label class="form-label">Nomor WhatsApp Lama</label>
            <input 
                type="text" 
                class="form-control" 
                value="<?= $user['whatsapp_number'] ?? '' ?>" 
                disabled
            />
        </div>
        <div class="mb-3">
            <label class="form-label">Nomor WhatsApp Baru</label>
            <input 
                type="text" 
                name="new_whatsapp_number" 
                class="form-control" 
                placeholder="Masukkan nomor WhatsApp baru" 
                required
            />
        </div>
        <button type="submit" class="btn btn-primary">Kirim OTP</button>
    </form>
</div>