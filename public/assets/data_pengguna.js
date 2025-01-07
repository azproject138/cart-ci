document.getElementById('user_id').addEventListener('input', function () {
    const userId = this.value;

    if (userId) {
        fetch('/pesanan/data-pengguna', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
            },
            body: JSON.stringify({ user_id: userId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                document.getElementById('alamat').value = data.data.alamat || '';
                document.getElementById('whatsapp_number').value = data.data.whatsapp_number || '';
            } else {
                document.getElementById('alamat').value = '';
                document.getElementById('whatsapp_number').value = '';
            }
        })
        .catch(error => console.error('Error:', error));
    } else {
        document.getElementById('alamat').value = '';
        document.getElementById('whatsapp_number').value = '';
    }
});