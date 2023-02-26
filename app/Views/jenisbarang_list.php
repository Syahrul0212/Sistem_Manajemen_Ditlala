<?php $this->extend('theme/index') ?>
<!-- kalo gabisa nnti tambahin semicolon -->
<?php $this->section('content') ?>

<h1 class="h3 mb-4 text-gray-800">Data Barang</h1>

<a href="<?= site_url('jenisbarang/insert') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Insert</a>
<br /> <br />

<table class="table table-stripped" id="dataTable" width="100%" cellspacing="0">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Jenis Barang</th>
            <th>Merk</th>
            <th>Tipe</th>
            <th>Pengadaan</th>
            <th>Warranty</th>
            <th>Jumlah</th>
            <th>Rak Posisi</th>
            <th>Rak Unit</th>
            <th>Serial Number</th>
            <th>IP</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $num = 1 ?>
        <?php foreach ($list as $row) : ?>
            <tr>
                <td ><?= $num++, '.'; ?></td>
                <td><?= $row['jenisbarang']; ?></td>
                <td><?= $row['tb_merk_nama']; ?></td>
                <td><?= $row['tipe']; ?></td>
                <td><?= $row['pengadaan']; ?></td>
                <td><?= $row['warranty']; ?></td>
                <td><?= $row['jumlah']; ?></td>
                <td><?= $row['rakposisi']; ?></td>
                <td><?= $row['rakunit']; ?></td>
                <td><?= $row['serialnumber']; ?></td>
                <td><?= $row['ip']; ?></td>
                <td nowrap>
                    <a href="<?= site_url('jenisbarang/' . $row['id']) ?>" class="btn btn-info"><i class="fas fa-edit"></i> Update</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<br />
<a href="<?= site_url('jenisbarang_export_xls') ?>" class="btn btn-success"><i class="fas fa-download"></i> Export Excel</a>
<a href="<?= site_url('jenisbarang_export_pdf') ?>" class="btn btn-danger"><i class="fas fa-download"></i> Export PDF</a>

<?php $this->endSection('content') ?>