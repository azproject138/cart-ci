document.querySelectorAll('.toggle-password').forEach(item => {
    item.addEventListener('click', function () {
        const target = document.getElementById(this.getAttribute('data-target'));
        if (target.type === 'password') {
            target.type = 'text';
            this.querySelector('i').classList.replace('bi-eye-slash', 'bi-eye');
        } else {
            target.type = 'password';
            this.querySelector('i').classList.replace('bi-eye', 'bi-eye-slash');
        }
    });
});