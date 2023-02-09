<?php

use PhpOffice\PhpSpreadsheet\Calculation\LookupRef\Unique;

 $this->extend('theme/index') ?>
<?php $this->section('content') ?>



<form method="post" action="<?= site_url('kamar/insert') ?>">
    <?= csrf_field() ?>
    <table class="table table-stripped">
        <tr>
            <td>kode kamar</td>
            <td>
                <input type="text" name="kode_kamar" value="" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>kode kelas</td>
            <td>
                <select name="kode_kelas" class="custom-select custom-select-md">
                    <?php foreach ($data_kelas as $kelas) : ?>
                        <option value="<?= $kelas['kode_kelas'] ?>"><?= $kelas['kode_kelas'] ?></option>
                    <?php endforeach ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>nama kamar</td>
            <td>
                <input type="text" name="nama_kamar" value="" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>jumlah tempat tidur</td>
            <td>
                <input type="text" name="jumlah_bed" value="" class="form-control" />
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