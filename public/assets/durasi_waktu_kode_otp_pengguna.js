// Durasi waktu OTP (misalnya 2 menit)
let otpTimer = 120;
const timerElement = document.getElementById('timer');
const resendButton = document.getElementById('resendOtp');

// Fungsi untuk menghitung waktu mundur
function updateTimer() {
    let minutes = Math.floor(otpTimer / 60);
    let seconds = otpTimer % 60;
    timerElement.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    otpTimer--;
    if (otpTimer < 0) {
        clearInterval(otpInterval);
        resendButton.disabled = false;
        resendButton.textContent = 'Kirim Ulang';
    }
}

// Mulai timer ketika halaman dimuat
let otpInterval = setInterval(updateTimer, 1000);

// Event listener untuk tombol kirim ulang
resendButton.addEventListener('click', function() {
    resendButton.disabled = true;
    resendButton.textContent = 'Mengirim...';
    otpTimer = 120; // Reset timer
    updateTimer();
    // Kirim ulang OTP ke WhatsApp
    // Misalnya, panggil API untuk mengirim OTP kembali
    // window.location.href = '<?= base_url('whatsapp/sendOtp') ?>';
});