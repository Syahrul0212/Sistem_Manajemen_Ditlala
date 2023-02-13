<?php $this->extend('theme/index') ?>
<?php $this->section('content') ?>

<form method="post" action="<?= site_url('rak/' . $data['id']) ?>">
    <?= csrf_field() ?>
    <h2 class="font-weight-bold">Update Barang</h2>
    <br>
    <table class="table table-striped">
        <tr>
            <td class="font-weight-bold">Rak Unit</td>
            <td>
                <input type="number" name="rak_unit" value="<?= $data['rak_unit'] ?>" class="form-control" />
            </td>
        </tr>
        <tr>
            <td class="font-weight-bold">Rak Posisi</td>
            <td>
                <input type="text" name="rak_posisi" value="<?= $data['rak_posisi'] ?>" class="form-control" />
            </td>
        </tr>

            <td>&nbsp;</td>
            <td>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                <a href="<?= site_url('rak/delete/' . $data['id']) ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
            </td>
        </tr>
    </table>
</form>

<?php $this->endSection('content') ?>