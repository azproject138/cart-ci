<h1>Tambah Alamat</h1>
<form action="/alamat-pengguna/store" method="post">
    <label>Alamat</label>
    <textarea name="address" required></textarea>
    <label>Jenis Alamat</label>
    <select name="type">
        <option value="home">Rumah</option>
        <option value="office">Kantor</option>
    </select>
    <div class="text-center">
        <a 
            href="https://www.google.com/maps" 
            target="_blank" 
            class="btn btn-outline-secondary">
            <i class="bi bi-map"></i> Cari di Google Map
        </a>
    </div>
    <label>Alamat Utama</label>
        <input type="checkbox" name="is_primary" value="1">
    <button type="submit">Simpan</button>
</form>