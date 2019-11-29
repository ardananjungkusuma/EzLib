<html>

<head>
    <title>Edit Buku Status</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body>
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
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Books Edited',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
        <?php
            header("Refresh:2; url=admin_dashboard.php");
            ?>
    <?php
    } else {
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error Edit Book',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    <?php
        header("Refresh:1; url=admin_dashboard.php");
    }
    ?>
</body>

</html>