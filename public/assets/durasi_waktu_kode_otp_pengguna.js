let timeLeft = 300; // 5 menit

const timerElement = document.getElementById('timer');
function updateTimer() {
    const minutes = Math.floor(timeLeft / 60);
    const seconds = timeLeft % 60;
    timerElement.textContent = `Kode OTP akan kadaluarsa dalam ${minutes}:${seconds.toString().padStart(2, '0')} menit`;
    if (timeLeft > 0) {
        timeLeft--;
        setTimeout(updateTimer, 1000);
    } else {
        timerElement.textContent = 'Kode OTP telah kadaluarsa. Kirim ulang untuk mendapatkan kode baru.';
    }
}

function resendOtp() {
    alert('Kode OTP baru telah dikirim!');
    timeLeft = 300; // Reset timer
    updateTimer();
}

updateTimer();