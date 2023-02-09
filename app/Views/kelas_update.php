<?php $this->extend('theme/index') ?>
<?php $this->section('content') ?>

<form method="post" action="<?= site_url('kelas/' . $data['kode_kelas']) ?>">
    <?= csrf_field() ?>
    <table class="table table-stripped">
        <tr>
            <td>kode kelas</td>
            <td>
                <input type="text" name="kode_kelas" value="<?= $data['kode_kelas'] ?>" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>nama kelas</td>
            <td>
                <input type="text" name="nama_kelas" value="<?= $data['nama_kelas'] ?>" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>harga per malam</td>
            <td>
                <input type="text" name="harga_per_malam" value="<?= $data['harga_per_malam'] ?>" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>fasilitas</td>
            <td>
                <input type="text" name="fasilitas" value="<?= $data['fasilitas'] ?>" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                <a href="<?= site_url('kelas/delete/' . $data['kode_kelas']) ?>" class="btn btn-outline-secondary"><i class="fas fa-trash"></i> Delete</a>
            </td>
        </tr>
    </table>
</form>

<?php $this->endSection('content') ?>