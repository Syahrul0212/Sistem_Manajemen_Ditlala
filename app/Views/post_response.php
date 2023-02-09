<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
</head>

<body>

    <p>Nama : <?= $nama ?></p>
    <?php
    if ($umur <= 5) {
        $umur1 = "anda adalah balita";
    } elseif ($umur <= 12) {
        $umur1 = "anda adalah anak";
    } elseif ($umur <= 25) {
        $umur1 = "anda adalah remaja";
    } elseif ($umur <= 50) {
        $umur1 = "anda adalah dewasa";
    } else {
        $umur1 = "anda lansia";
    }
    ?>
    <p>Umur : <?= $umur1 ?></p>

</body>

</html>