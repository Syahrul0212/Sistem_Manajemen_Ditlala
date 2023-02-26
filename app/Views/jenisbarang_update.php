<?php $this->extend('theme/index') ?>
<?php $this->section('content') ?>

<form method="post" action="<?= site_url('jenisbarang/' . $data['id']) ?>">
    <?= csrf_field() ?>
    <table class="table table-stripped">
        <tr>
            <td>Merk</td>
            <td>
                <select name="merk_id" class="form-control">
                    <?php foreach ($data_merk as $merk) : ?>
                        <?php if ($merk['id'] == $data['merk_id']) : ?>
                            <option value="<?= $merk['id'] ?>" selected><?= $merk['nama'] ?></option>
                        <?php else : ?>
                            <option value="<?= $merk['id'] ?>"><?= $merk['nama'] ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Jenis Barang</td>
            <td>
                <input type="text" name="jenisbarang" value="<?= $data['jenisbarang'] ?>" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>Tipe</td>
            <td>
                <input type="text" name="tipe" value="<?= $data['tipe'] ?>" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>Pengadaan</td>
            <td>
                <input type="number" name="pengadaan" value="<?= $data['pengadaan'] ?>" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>Warranty</td>
            <td>
                <input type="date" name="warranty" value="<?= $data['warranty'] ?>" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td>
                <input type="number" name="jumlah" value="<?= $data['jumlah'] ?>" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>Rak Posisi</td>
            <td>
                <input type="text" name="rakposisi" value="<?= $data['rakposisi'] ?>" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>Rak Unit</td>
            <td>
                <input type="number" name="rakunit" value="<?= $data['rakunit'] ?>" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>Serial Number</td>
            <td>
                <input type="text" name="serialnumber" value="<?= $data['serialnumber'] ?>" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>IP</td>
            <td>
                <input type="text" name="ip" value="<?= $data['ip'] ?>" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                <a href="<?= site_url('jenisbarang/delete/' . $data['id']) ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
            </td>
        </tr>
    </table>
</form>

<?php $this->endSection('content') ?>