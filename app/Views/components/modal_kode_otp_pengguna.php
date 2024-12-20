<div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="otpModalLabel">Verifikasi OTP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('whatsapp/verify-kode-otp') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="otp_code" class="form-label">Kode OTP</label>
                        <input 
                            type="text" 
                            name="otp_code" 
                            id="otp_code" 
                            class="form-control" 
                            placeholder="Masukkan kode OTP" 
                            required
                        />
                    </div>
                    <div id="timer" class="text-danger"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                    <button type="button" class="btn btn-secondary" onclick="resendOtp()">Kirim Ulang</button>
                </div>
            </form>
        </div>
    </div>
</div>
