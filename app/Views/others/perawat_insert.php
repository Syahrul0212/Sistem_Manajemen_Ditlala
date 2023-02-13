<?php $this->extend('theme/index') ?>
<?php $this->section('content') ?>

<h1 class="h3 mb-4 text-gray-800">Input Data Perawat</h1>
<form method="post" action="<?= site_url('perawat/insert') ?>">
    <?= csrf_field() ?>
    <table class="table table-stripped">
        <tr>
            <td>NIP</td>
            <td>
                <input type="text" name="nip" value="" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>nama perawat</td>
            <td>
                <input type="text" name="nama_perawat" value="" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>phone number</td>
            <td>
                <input type="text" name="no_hp" value="" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>
                <select name="gender" class="custom-select custom-select-md">
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
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