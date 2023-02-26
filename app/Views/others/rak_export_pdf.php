<h1 style="text-align:center;">Tabel Rak</h1>
<table class="table table-stripped" id="dataTable" width="100%" cellspacing="0" border="1">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Rak Unit</th>
            <th>Rak Posisi</th>
        </tr>
    </thead>
    <tbody>
        <?php $num = 1 ?>
        <?php foreach ($list as $row) : ?>
            <tr>
                <td><?= $num++, '.'; ?></td>
                <td><?= $row['rak_unit']; ?></td>
                <td><?= $row['rak_posisi']; ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>