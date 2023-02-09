<?php $this->extend('theme/index') ?>
<!-- kalo gabisa nnti tambahin semicolon -->
<?php $this->section('content') ?>

<h1 class="h3 mb-4 text-gray-800">Data kamar</h1>

<a href="<?= site_url('kamar/insert') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Insert</a>
<br /> <br />

<table class="table table-stripped" id="dataTable" width="100%" cellspacing="0">
    <thead class="thead-dark">
        <tr>
            <th>kode kamar</th>
            <th>kode kelas</th>
            <th>nama kamar</th>
            <th>jumlah tempat tidur</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        <?php $num = 1 ?>
        <?php foreach ($list as $row) : ?>
            <tr>
                <td><?= $row['kode_kamar']; ?></td>
                <td><?= $row['kode_kelas']; ?></td>
                <td><?= $row['nama_kamar']; ?></td>
                <td><?= $row['jumlah_bed']; ?></td>
                <td nowrap>
                    <a href="<?= site_url('kamar/' . $row['kode_kamar']) ?>" class="btn btn-info"><i class="fas fa-edit"></i> Update</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<br />
<a href="<?= site_url('buku_export_xls') ?>" class="btn btn-success"><i class="fas fa-download"></i> Export Excel</a>
<a href="<?= site_url('buku_export_pdf') ?>" class="btn btn-danger"><i class="fas fa-download"></i> Export PDF</a>

<?php $this->endSection('content') ?>