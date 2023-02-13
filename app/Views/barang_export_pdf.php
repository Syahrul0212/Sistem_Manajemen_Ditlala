
<table border="1">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Warranty</th>
            <th>Serial Number</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $num = 1 ?>
        <?php foreach ($list as $row) : ?>
            <tr>
                <td><?= $num++, '.'; ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= $row['jumlah']; ?></td>
                <td><?= $row['warranty']; ?></td>
                <td><?= $row['serial_number']; ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>