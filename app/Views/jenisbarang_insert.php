<?php $this->extend('theme/index') ?>
<?php $this->section('content') ?>

<form method="post" action="<?= site_url('jenisbarang/insert') ?>">
    <?= csrf_field() ?>
    <table class="table table-stripped">
        <tr>
            <td>Merk</td>
            <td>
                <select name="merk_id" class="custom-select custom-select-md">
                    <?php foreach ($data_merk as $merk) : ?>
                        <option value="<?= $merk['id'] ?>"><?= $merk['nama'] ?></option>
                    <?php endforeach ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Jenis Barang</td>
            <td>
                <input type="text" name="jenisbarang" value="" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>Tipe</td>
            <td>
                <input type="text" name="tipe" value="" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>Pengadaan</td>
            <td>
                <input type="number" name="pengadaan" value="" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>Warranty</td>
            <td>
                <input type="date" name="warranty" value="" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td>
                <input type="number" name="jumlah" value="" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>Rak Posisi</td>
            <td>
                <input type="text" name="rakposisi" value="" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>Rak Unit</td>
            <td>
                <input type="number" name="rakunit" value="" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>Serial Number</td>
            <td>
                <input type="text" name="serialnumber" value="" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>IP</td>
            <td>
                <input type="text" name="ip" value="" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Save</button>
            </td>
        </tr>
    </table>
</form>

<?php $this->endSection('content') ?>