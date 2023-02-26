<?php $this->extend('theme/index') ?>
<?php $this->section('content') ?>

<h1 class="h3 mb-4 text-gray-800">Data </h1>
<a href="<?= site_url('merk/insert') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Insert</a>
<br />
<br>

<table class="table table-stripped" id="dataTable" width="100%" cellspacing="0">
    <thead align="center">
        <tr>
            <th>No</th>
            <th>Nama Merk</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody align="">
        <?php $num = 1 ?>
        <?php foreach ($list as $row) : ?>
            <tr>
                <td style="width:100px" align="center"><?= $num++, '.'; ?></td>
                <td><?= $row['nama']; ?></td>
                <td nowrap>
                    <a href="<?= site_url('merk/' . $row['id']) ?>" class="btn btn-info"><i class="fas fa-edit"></i> Update</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<a href="<?= site_url('merk_export_xls') ?>" class="btn btn-success"><i class="fas fa-download"></i> Export Excel</a>
<a href="<?= site_url('merk_export_pdf') ?>" class="btn btn-danger"><i class="fas fa-download"></i> Export PDF</a>

<?php $this->endSection('content') ?>