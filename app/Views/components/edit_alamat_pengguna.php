<h1>Edit Alamat</h1>
<form method="post">
    <label>Alamat:</label>
    <textarea name="address" required><?= $address['address'] ?></textarea><br>

    <label>Jenis Alamat:</label>
    <select name="type">
        <option value="rumah" <?= $address['type'] == 'rumah' ? 'selected' : '' ?>>Rumah</option>
        <option value="kantor" <?= $address['type'] == 'kantor' ? 'selected' : '' ?>>Kantor</option>
    </select><br>

    <label>
        <input type="checkbox" name="is_primary" <?= $address['is_primary'] ? 'checked' : '' ?>> Alamat Utama
    </label><br>

    <button type="submit">Simpan</button>
</form>