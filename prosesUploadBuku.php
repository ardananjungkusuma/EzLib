<?php
$namafolder = "img/booksCatalogue/"; //tempat menyimpan file
$con = mysqli_connect("localhost", "root", "", "ezlib") or die("Gagal");
if (!empty($_FILES["nama_file"]["tmp_name"])) {
    $nama_file = $_FILES['nama_file']['type'];
    $nama_buku = $_POST['nama_buku'];
    $keterangan_buku = $_POST['keterangan_buku'];
    $status_buku = $_POST['status_buku'];
    if ($nama_file == "image/jpeg" || $nama_file == "image/jpg" || $nama_file == "image/gif" || $nama_file == "image/x-png") {
        $gambar = $namafolder . basename($_FILES['nama_file']['name']);
        if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
            $sql = "insert into buku(nama_buku,keterangan_buku,status_buku,nama_file) values ('$nama_buku','$keterangan_buku','$status_buku','$gambar')";
            $res = mysqli_query($con, $sql) or die(mysqli_close($con));
            echo "Gambar berhasil dikirim " . $gambar;
            echo "<p>Nama Buku : $nama_buku</p>";
            echo "<p>Keterangan Buku : $keterangan_buku</p>";
            echo "<p>Status Buku : $status_buku</p>";
            echo "<p><img src=\"$gambar\" width=\"200\"/></p>";
        } else {
            echo "<p>Gambar gagal dikirim</p>";
        }
    } else {
        echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
    }
} else {
    echo "Anda belum memilih gambar";
}
