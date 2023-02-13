<?php $this->extend('theme/index') ?>
<?php $this->section('content') ?>

<form method="post" action="<?= site_url('barang/' . $data['id']) ?>">
    <?= csrf_field() ?>
    <h2 class="font-weight-bold">Update Barang</h2>
    <br>
    <table class="table table-striped">
        <tr>
            <td class="font-weight-bold">Nama Barang</td>
            <td>
                <input type="text" name="nama_barang" value="<?= $data['nama_barang'] ?>" class="form-control" />
            </td>
        </tr>
        <tr>
            <td class="font-weight-bold">Jumlah</td>
            <td>
                <input type="number" name="jumlah" value="<?= $data['jumlah'] ?>" class="form-control" />
            </td>
            
        </tr>
        <tr>
            <td class="font-weight-bold">Warranty</td>
                <td>
                    <input type="date" name="warranty" value="<?= $data['warranty'] ?>" class="form-control" />
                </td>
        </tr>
        <tr>
            <td class="font-weight-bold">Serial Number</td>
                <td>
                    <input type="text" name="serial_number" value="<?= $data['serial_number'] ?>" class="form-control" />
                </td>
        </tr>

            <td>&nbsp;</td>
            <td>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                <a href="<?= site_url('barang/delete/' . $data['id']) ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
            </td>
        </tr>
    </table>
</form>

<?php $this->endSection('content') ?>