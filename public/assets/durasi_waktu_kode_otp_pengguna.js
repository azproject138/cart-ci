let countdown = 60; // Durasi waktu 60 detik
const resendButton = document.getElementById('resendOtp');

function updateCountdown() {
    if (countdown > 0) {
        resendButton.disabled = true;
        resendButton.innerText = `Kirim Ulang (${countdown}s)`;
        countdown--;
        setTimeout(updateCountdown, 1000);
    } else {
        resendButton.disabled = false;
        resendButton.innerText = 'Kirim Ulang';
    }
}

resendButton.addEventListener('click', () => {
    countdown = 60;
    updateCountdown();
    // Kirim ulang OTP melalui AJAX atau redirect ke action pengiriman ulang OTP
    alert('Kode OTP telah dikirim ulang!');
});

// Mulai countdown saat modal OTP dibuka
const otpModal = document.getElementById('otpModal');
otpModal.addEventListener('show.bs.modal', updateCountdown);