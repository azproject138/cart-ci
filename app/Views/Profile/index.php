<form action="/profile/update-picture" method="post" enctype="multipart/form-data">
    <label>Foto Profil:</label>
    <input type="file" name="profile_picture">
    <button type="submit">Simpan</button>
</form>

<form action="/profile/update-address" method="post">
    <label>Alamat:</label>
    <input type="text" name="address" value="<?= $user['address'] ?>">
    <button type="submit">Simpan</button>
</form>

<form action="/profile/update-whatsapp" method="post">
    <label>Nomor WhatsApp:</label>
    <input type="text" name="whatsapp_number" value="<?= $user['whatsapp_number'] ?>">
    <button type="submit">Kirim OTP</button>
</form>

<form action="/profile/verify-otp" method="post">
    <label>Verifikasi OTP:</label>
    <input type="text" name="otp_code">
    <button type="submit">Verifikasi</button>
</form>
