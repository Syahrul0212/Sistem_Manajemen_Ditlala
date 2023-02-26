<h1 style="text-align:center;">Tabel Jenis Barang</h1>
<table class="table table-stripped" id="dataTable" width="100%" cellspacing="0" border="1">
    <thead style="text-align: center;" class="thead-dark">
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
        </tr>
    </thead>
    <tbody>
        <?php $num = 1 ?>
        <?php foreach ($list as $row) : ?>
            <tr>
                <td style="text-align: center;"><?= $num++, '.'; ?></td>
                <td><?= $row['jenisbarang']; ?></td>
                <td><?= $row['tb_merk_nama']; ?></td>
                <td><?= $row['tipe']; ?></td>
                <td style="text-align: center;"><?= $row['pengadaan']; ?></td>
                <td><?= $row['warranty']; ?></td>
                <td style="text-align: center;"><?= $row['jumlah']; ?></td>
                <td style="text-align: center;"><?= $row['rakposisi']; ?></td>
                <td style="text-align: center;"><?= $row['rakunit']; ?></td>
                <td style="text-align: center;"><?= $row['serialnumber']; ?></td>
                <td style="text-align: center;"><?= $row['ip']; ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>