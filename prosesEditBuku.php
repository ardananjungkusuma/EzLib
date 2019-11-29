<?php
include "connection.php";

$id_buku = $_GET['id_buku'];
$nama_buku = $_GET['nama_buku'];
$penerbit = $_GET['penerbit'];
$keterangan_buku = $_GET['keterangan_buku'];
$status_buku = $_GET['status_buku'];

$query = "update buku set nama_buku='$nama_buku',penerbit='$penerbit',keterangan_buku='$keterangan_buku',status_buku='$status_buku' where id_buku='$id_buku'";
$result = mysqli_query($connect, $query);

if ($result) {
    echo "Berhasil update data ke database";
    ?>
    <a href="viewListBukuAdmin.php">Lihat data buku</a>
<?php
} else {
    echo "Gagal update data" . mysqli_error($connect);
}
?>