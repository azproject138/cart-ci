<div class="container mt-4">
    <!-- Tampilkan Nomor WhatsApp -->
    <div class="mb-3">
        <label class="form-label">Nomor WhatsApp</label>
        <div class="d-flex align-items-center">
            <input 
                type="text" 
                class="form-control me-2" 
                value="<?= $user['whatsapp_number'] ?? 'Belum diatur' ?>" 
                disabled 
            />
            <button 
                class="btn btn-primary" 
                data-bs-toggle="modal" 
                data-bs-target="#whatsappModal">
                <i class="bi bi-pencil"></i> Edit
            </button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="whatsappModal" tabindex="-1" aria-labelledby="whatsappModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="whatsappModalLabel">Edit Nomor WhatsApp</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('whatsapp/sendOTP') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="current_whatsapp_number" class="form-label">Nomor WhatsApp Lama</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="current_whatsapp_number" 
                            value="<?= $user['whatsapp_number'] ?? 'Belum diatur' ?>" 
                            disabled
                        />
                    </div>
                    <div class="mb-3">
                        <label for="new_whatsapp_number" class="form-label">Nomor WhatsApp Baru</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="new_whatsapp_number" 
                            name="new_whatsapp_number" 
                            placeholder="Masukkan nomor WhatsApp baru" 
                            required
                        />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Kirim OTP</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal OTP -->
<div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="otpModalLabel">Verifikasi Nomor WhatsApp</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('whatsapp/verifyOTP') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="otp_code" class="form-label">Kode OTP</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="otp_code" 
                            name="otp_code" 
                            placeholder="Masukkan kode OTP" 
                            required
                        />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Verifikasi</button>
                    <button type="button" id="resendOtp" class="btn btn-secondary">Kirim Ulang OTP</button>
                </div>
            </form>
        </div>
    </div>
</div>
