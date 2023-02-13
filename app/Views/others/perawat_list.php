<?php $this->extend('theme/index') ?>
<!-- kalo gabisa nnti tambahin semicolon -->
<?php $this->section('content') ?>

<h1 class="h3 mb-4 text-gray-800">Data perawat</h1>

<a href="<?= site_url('perawat/insert') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Insert</a>
<br /> <br />

<table class="table table-stripped" id="dataTable" width="100%" cellspacing="0">
    <thead class="thead-dark">
        <tr>
            <th>NIP</th>
            <th>Nama perawat</th>
            <th>Phone number</th>
            <th>Gender</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        <?php $num = 1 ?>
        <?php foreach ($list as $row) : ?>
            <tr>
                <td><?= $row['nip']; ?></td>
                <td><?= $row['nama_perawat']; ?></td>
                <td><?= $row['no_hp']; ?></td>
                <td><?= $row['gender']; ?></td>
                <td nowrap>
                    <a href="<?= site_url('perawat/' . $row['nip']) ?>" class="btn btn-info"><i class="fas fa-edit"></i> Update</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<br />
<a href="<?= site_url('buku_export_xls') ?>" class="btn btn-success"><i class="fas fa-download"></i> Export Excel</a>
<a href="<?= site_url('buku_export_pdf') ?>" class="btn btn-danger"><i class="fas fa-download"></i> Export PDF</a>

<?php $this->endSection('content') ?>