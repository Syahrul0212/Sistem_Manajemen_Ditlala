<?php $this->extend('theme/index') ?>
<?php $this->section('content') ?>

<form method="post" action="<?= site_url('buku/' . $data['id']) ?>">
    <?= csrf_field() ?>
    <table class="table table-stripped">
        <tr>
            <td>Kategori</td>
            <td>
                <select name="kategori_id" class="form-control">
                    <?php foreach ($data_kategori as $kategori) : ?>
                        <?php if ($kategori['id'] == $data['kategori_id']) : ?>
                            <option value="<?= $kategori['id'] ?>" selected><?= $kategori['nama'] ?></option>
                        <?php else : ?>
                            <option value="<?= $kategori['id'] ?>"><?= $kategori['nama'] ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Judul</td>
            <td>
                <input type="text" name="judul" value="<?= $data['judul'] ?>" class="form-control" />
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                <a href="<?= site_url('buku/delete/' . $data['id']) ?>" class="btn btn-outline-secondary"><i class="fas fa-trash"></i> Delete</a>
            </td>
        </tr>
    </table>
</form>

<?php $this->endSection('content') ?>