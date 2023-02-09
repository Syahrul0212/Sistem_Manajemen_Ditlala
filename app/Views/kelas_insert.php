<?php $this->extend('theme/index') ?>
<?php $this->section('content') ?>

<h1 class="h3 mb-4 text-gray-800">Input Data kelas</h1>
<form method="post" action="<?= site_url('kelas/insert') ?>">
    <?= csrf_field() ?>
    <table class="table table-stripped">
        <tr>
            <td>kode kelas</td>
            <td>
                <input type="text" name="kode_kelas" value="" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>nama kelas</td>
            <td>
                <input type="text" name="nama_kelas" value="" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>harga per malam</td>
            <td>
                <input type="text" name="harga_per_malam" value="" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>fasilitas</td>
            <td>
                <input type="text" name="fasilitas" value="" class="form-control" />
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