const addressModal = document.getElementById('addressModal');
const addressTypeInput = document.getElementById('addressType');
const mapsLink = document.getElementById('mapsLink');

addressModal.addEventListener('show.bs.modal', (event) => {
    const button = event.relatedTarget;
    const addressType = button.getAttribute('data-address-type');
    addressTypeInput.value = addressType;
    const mapsQuery = addressType === 'home' ? 'Rumah' : 'Kantor';
    mapsLink.href = `https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(mapsQuery)}`;
});