<h1 style="text-align:center;">Tabel Aplikasi</h1>
<table class="table table-stripped" id="dataTable" width="100%" cellspacing="0" border="1">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Nama Aplikasi</th>
            <th>Username</th>
            <th>Password</th>
        </tr>
    </thead>
    <tbody>
        <?php $num = 1 ?>
        <?php foreach ($list as $row) : ?>
            <tr>
                <td><?= $num++, '.'; ?></td>
                <td><?= $row['nama_aplikasi']; ?></td>
                <td><?= $row['username']; ?></td>
                <td><?= $row['password']; ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>