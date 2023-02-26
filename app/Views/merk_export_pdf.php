<h1 style="text-align:center;">Tabel Merk</h1>
<table class="table table-stripped" id="dataTable" width="100%" cellspacing="0" border="1">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Nama Merk</th>
        </tr>
    </thead>
    <tbody>
        <?php $num = 1 ?>
        <?php foreach ($list as $row) : ?>
            <tr>
                <td style="text-align: center;"><?= $num++, '.'; ?></td>
                <td><?= $row['nama']; ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>