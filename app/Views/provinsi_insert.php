<form method="post" action="<?= site_url('provinsi/insert') ?>">
    <?= csrf_field() ?>
    <table>
        <tr>
            <td>Nama</td>
            <td>
                <input type="text" name="nama" value="" />
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
                <!-- <input type="radio" name="wilayah" <?php if (isset($wilayah) && $wilayah == "WIB")
                                                            echo "checked"; ?> value="wib">WIB
                <input type="radio" name="wilayah" <?php if (isset($wilayah) && $wilayah == "WITA")
                                                        echo "checked"; ?> value="wita">WITA
                <input type="radio" name="wilayah" <?php if (isset($wilayah) && $wilayah == "WIT")
                                                        echo "checked"; ?> value="wit">WIT -->
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <button type="submit">Save</button>
            </td>
        </tr>
    </table>
</form>