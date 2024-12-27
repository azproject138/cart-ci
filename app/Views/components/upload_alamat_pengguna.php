<h1>Tambah Alamat</h1>
<form action="/profile/create-alamat-pengguna" method="post">
    <label>Alamat:</label>
    <textarea name="address" required></textarea><br>

    <label>Jenis Alamat:</label>
    <select name="type">
        <option value="rumah">Rumah</option>
        <option value="kantor">Kantor</option>
    </select><br>

    <label>
        <input type="checkbox" name="is_primary"> Alamat Utama
    </label><br>

    <button type="submit">Simpan</button>
</form>