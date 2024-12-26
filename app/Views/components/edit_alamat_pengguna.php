<h1>Edit Alamat</h1>
<form action="/addresses/update/<?= $address['id'] ?>" method="post">
    <label>Alamat</label>
    <textarea name="address" required><?= esc($address['address']) ?></textarea>
    <label>Jenis Alamat</label>
    <select name="type">
        <option value="home" <?= $address['type'] === 'home' ? 'selected' : '' ?>>Rumah</option>
        <option value="office" <?= $address['type'] === 'office' ? 'selected' : '' ?>>Kantor</option>
    </select>
    <label>Alamat Utama</label>
    <input type="checkbox" name="is_primary" value="1" <?= $address['is_primary'] ? 'checked' : '' ?>>
    <button type="submit">Simpan</button>
</form>