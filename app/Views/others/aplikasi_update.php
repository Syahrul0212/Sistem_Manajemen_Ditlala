<?php $this->extend('theme/index') ?>
<?php $this->section('content') ?>

<form method="post" action="<?= site_url('aplikasi/' . $data['id']) ?>">
    <?= csrf_field() ?>
    <h2 class="font-weight-bold">Update Data</h2>
    <br>
    <table class="table table-striped">
        <tr>
            <td class="font-weight-bold">Nama Aplikasi</td>
            <td>
                <input type="text" name="nama_aplikasi" value="<?= $data['nama_aplikasi'] ?>" class="form-control" />
            </td>
        </tr>
        <tr>
            <td class="font-weight-bold">Username</td>
            <td>
                <input type="text" name="username" value="<?= $data['username'] ?>" class="form-control" />
            </td>
            
        </tr>
        <tr>
            <td class="font-weight-bold">Password</td>
                <td>
                    <input type="password" name="password" value="<?= $data['password'] ?>" class="form-control" />
                </td>
        </tr>
            <td>&nbsp;</td>
            <td>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                <a href="<?= site_url('aplikasi/delete/' . $data['id']) ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
            </td>
        </tr>
    </table>
</form>

<?php $this->endSection('content') ?>