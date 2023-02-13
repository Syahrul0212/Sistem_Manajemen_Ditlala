<?php $this->extend('theme/index') ?>
<!-- kalo gabisa nnti tambahin semicolon -->
<?php $this->section('content') ?>

<h1 class="h3 mb-4 text-gray-800">Data Rak</h1>

<a href="<?= site_url('rak/insert') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Insert</a>
<br /> <br />
<table class="table table-stripped" id="dataTable" width="100%" cellspacing="0">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Rak Unit</th>
            <th>Rak Posisi</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $num = 1 ?>
        <?php foreach ($list as $row) : ?>
            <tr>
                <td><?= $num++, '.'; ?></td>
                <td><?= $row['rak_unit']; ?></td>
                <td><?= $row['rak_posisi']; ?></td>
                <td nowrap>
                    <a href="<?= site_url('rak/' . $row['id']) ?>" class="btn btn-info"><i class="fas fa-edit"></i> Update</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<br />
<a href="<?= site_url('buku_export_xls') ?>" class="btn btn-success"><i class="fas fa-download"></i> Export Excel</a>
<a href="<?= site_url('buku_export_pdf') ?>" class="btn btn-danger"><i class="fas fa-download"></i> Export PDF</a>

<?php $this->endSection('content') ?>