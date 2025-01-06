document.getElementById('jenisPesanan').addEventListener('change', updateMerekPesanan);
document.getElementById('merekPesanan').addEventListener('change', updateKategoriPesanan);

function updateMerekPesanan() {
    const jenisPesanan = document.getElementById('jenisPesanan').value;
    const merekPesanan = document.getElementById('merekPesanan');
    merekPesanan.innerHTML = '<option value="">Pilih Merek</option>';

    if (jenisPesanan === 'Servis Laptop') {
        merekPesanan.innerHTML += '<option value="HP">HP</option>';
        merekPesanan.innerHTML += '<option value="Asus">Asus</option>';
    } else if (jenisPesanan === 'Servis Printer') {
        merekPesanan.innerHTML += '<option value="Epson">Epson</option>';
        merekPesanan.innerHTML += '<option value="Canon">Canon</option>';
    } else if (jenisPesanan === 'Pasang WiFi') {
        merekPesanan.innerHTML += '<option value="TP-Link">TP-Link</option>';
    } else if (jenisPesanan === 'Pasang CCTV') {
        merekPesanan.innerHTML += '<option value="Hikvision">Hikvision</option>';
    }
}

function updateKategoriPesanan() {
    const jenisPesanan = document.getElementById('jenisPesanan').value;
    const merekPesanan = document.getElementById('merekPesanan').value;
    const kategoriPesanan = document.getElementById('kategoriPesanan');
    kategoriPesanan.innerHTML = '<option value="">Pilih Kategori</option>';

    if ((jenisPesanan === 'Servis Laptop' && (merekPesanan === 'HP' || merekPesanan === 'Asus'))) {
        kategoriPesanan.innerHTML += '<option value="install ulang">Install Ulang</option>';
        kategoriPesanan.innerHTML += '<option value="mati total">Mati Total</option>';
    } else if ((jenisPesanan === 'Servis Printer' && (merekPesanan === 'Epson' || merekPesanan === 'Canon'))) {
        kategoriPesanan.innerHTML += '<option value="revil toner">Revil Toner</option>';
        kategoriPesanan.innerHTML += '<option value="ganti tinta">Ganti Tinta</option>';
    } else if (jenisPesanan === 'Pasang WiFi' && merekPesanan === 'TP-Link') {
        kategoriPesanan.innerHTML += '<option value="order wifi">Order WiFi</option>';
    } else if (jenisPesanan === 'Pasang CCTV' && merekPesanan === 'Hikvision') {
        kategoriPesanan.innerHTML += '<option value="order cctv">Order CCTV</option>';
    }
}