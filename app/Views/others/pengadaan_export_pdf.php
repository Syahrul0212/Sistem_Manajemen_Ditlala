<h1 style="text-align:center;">Tabel Pengadaan</h1>
<table class="table table-stripped" id="dataTable" width="100%" cellspacing="0" border="1">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Pengadaan</th>
            <th>Tahun</th>
            <th>Laporan</th>
        </tr>
    </thead>
    <tbody>
        <?php $num = 1 ?>
        <?php foreach ($list as $row) : ?>
            <tr>
                <td><?= $num++, '.'; ?></td>
                <td><?= $row['pengadaan']; ?></td>
                <td><?= $row['tahun']; ?></td>
                <td><?= $row['laporan']; ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>