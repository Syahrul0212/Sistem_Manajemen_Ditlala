<?php $this->extend('theme/index') ?>
<?php $this->section('content') ?>

<form method="post" action="<?= site_url('pengadaan/' . $data['id']) ?>">
    <?= csrf_field() ?>
    <h2 class="font-weight-bold">Update Barang</h2>
    <br>
    <table class="table table-striped">
        <tr>
            <td class="font-weight-bold">Pengadaan</td>
            <td>
                <input type="text" name="pengadaan" value="<?= $data['nama_barang'] ?>" class="form-control" />
            </td>
        </tr>
        <tr>
            <td class="font-weight-bold">Tahun</td>
            <td>
                <input type="number" name="tahun" value="<?= $data['jumlah'] ?>" class="form-control" />
            </td>
            
        </tr>
        <tr>
            <td class="font-weight-bold">Laporan</td>
                <td>
                    <input type="date" name="laporan" value="<?= $data['warranty'] ?>" class="form-control" />
                </td>
        </tr>
            <td>&nbsp;</td>
            <td>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                <a href="<?= site_url('pengadaan/delete/' . $data['id']) ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
            </td>
        </tr>
    </table>
</form>

<?php $this->endSection('content') ?>