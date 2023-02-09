<?php $this->extend('theme/index') ?>
<?php $this->section('content') ?>

<form method="post" action="<?= site_url('buku/' . $data['id']) ?>">
    <?= csrf_field() ?>
    <h2 class="font-weight-bold">Update Barang</h2>
    <br>
    <table class="table table-striped">
        <tr>
            <td class="font-weight-bold" >Nama Barang</td>
            <td>
            <select name="nama_barang" class="form-control">
                    <?php foreach ($data_barang as $barang) : ?>
                        <?php if ($barang['id'] == $data['nama_barang']) : ?>
                            <option value="<?= $barang['id'] ?>" selected><?= $barang['nama_barang'] ?></option>
                        <?php else : ?>
                            <option value="<?= $barang['id'] ?>"><?= $barang['nama_barang'] ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="font-weight-bold">Jumlah</td>
            <td>
                <input type="text" name="judul" value="<?= $data['jumlah'] ?>" class="form-control" />
            </td>
            
        </tr>
        <tr>
            <td class="font-weight-bold">Warranty</td>
                <td>
                    <input type="text" name="judul" value="<?= $data['warranty'] ?>" class="form-control" />
                </td>
        </tr>
        <tr>
            <td class="font-weight-bold">Serial Number</td>
                <td>
                    <input type="text" name="judul" value="<?= $data['serial_number'] ?>" class="form-control" />
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