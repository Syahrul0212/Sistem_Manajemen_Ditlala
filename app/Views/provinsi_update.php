<form method="post" action="<?= site_url('provinsi/' . $data['id']) ?>">
    <?= csrf_field() ?>
    <table>
        <tr>
            <td>Nama</td>
            <td>
                <input type="text" name="nama" value="<?= $data['nama'] ?>" />
            </td>
        </tr>
        <tr>
            <td>Wilayah</td>
            <td>
                <select name="wilayah" id="wilayah">
                    <option value="WIB">WIB</option>
                    <option value="WITA">WITA</option>
                    <option value="WIT">WIT</option>
                </select>
                <!-- <input type="radio" name="wilayah" <?php if ($data['wilayah'] == 'wib') echo 'checked' ?> value="wib">WIB
                <input type="radio" name="wilayah" <?php if ($data['wilayah'] == 'wita') echo 'checked' ?> value="wita">WITA
                <input type="radio" name="wilayah" <?php if ($data['wilayah'] == 'wit') echo 'checked' ?> value="wit">WIT -->
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <button type="submit">Save</button>
                <a href="<?= site_url('provinsi/delete/' . $data['id']) ?>" onclick="return confirm('Yakin bro?')">Delete</a>
            </td>
        </tr>
    </table>
</form>