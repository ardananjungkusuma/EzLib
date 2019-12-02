<html>

<head>
    <title>Edit Pinjaman Status</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body>
    <?php
    include "connection.php";
    session_start();
    if ($_SESSION['status'] == 'admin_login') {


        $id_peminjaman = $_GET['id_peminjaman'];
        $id_buku = $_GET['id_buku'];
        $id_user = $_GET['id_user'];
        $tanggal_booking = $_GET['tanggal_booking'];
        $tanggal_pinjam = $_GET['tanggal_pinjam'];
        $tanggal_kembali = $_GET['tanggal_kembali'];
        $denda = $_GET['denda'];
        $status = $_GET['status'];

        $query = "update peminjaman set tanggal_booking='$tanggal_booking',tanggal_pinjam='$tanggal_pinjam',tanggal_kembali='$tanggal_kembali',denda='$denda',status='$status' where id_peminjaman='$id_peminjaman'";
        $result = mysqli_query($connect, $query);

        if ($result) {
            ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Peminjaman Edited',
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>
            <?php
                    header("Refresh:2; url=manajemen_peminjaman.php");
                    ?>
    <?php
        } else {
            header("Refresh:0; url=admin_dashboard.php");
        }
    } else {
        header("Refresh:0; url=admin_login.php");
    }
    ?>
</body>

</html>