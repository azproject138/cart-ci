<div class="container mt-4">
    <h4>Masukkan Nomor WhatsApp</h4>
    <form action="<?= base_url('whatsapp/sendOtp') ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="whatsapp_number" class="form-label">Nomor WhatsApp</label>
            <input 
                type="text" 
                class="form-control" 
                id="whatsapp_number" 
                name="whatsapp_number" 
                placeholder="Masukkan nomor WhatsApp"
                required
            >
        </div>
        <button type="submit" class="btn btn-primary">Kirim OTP</button>
    </form>
</div>

<?= $this->include('components/alerts')?>

<div class="container mt-4">
    <h4>Verifikasi OTP</h4>
    <form action="<?= base_url('whatsapp/verifyOtp') ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="otp_code" class="form-label">Kode OTP</label>
            <input 
                type="text" 
                class="form-control" 
                id="otp_code" 
                name="otp_code" 
                placeholder="Masukkan kode OTP"
                required
            >
        </div>
        <button type="submit" class="btn btn-success">Verifikasi OTP</button>
        <button type="button" class="btn btn-link" id="resendOtp">Kirim Ulang</button>
        <span id="timer" class="text-muted ms-3"></span>
    </form>
</div>
<script src="assets/durasi_waktu_kode_otp_pengguna.js"></script>