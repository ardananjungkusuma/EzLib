<html>

<head>
    <title>Order Status</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body>
    <?php
    include "connection.php";

    session_start();

    if ($_SESSION['status'] == 'user_login') {
        $id_buku = $_POST['id_buku'];
        $id_user = $_POST['id_user'];
        $tanggalBooking = date("d/m/Y");
        $sqlInsert = "insert into peminjaman(id_user,id_buku,tanggal_booking,tanggal_pinjam,tanggal_kembali,denda,status) values ('$id_user','$id_buku','$tanggalBooking','Not Set','Not Set','','Booked')";
        $res = mysqli_query($connect, $sqlInsert) or die(mysqli_close($connect));
        ?><script>
            Swal.fire({
                icon: 'success',
                title: 'Booked\n"Hanya Berlaku 3 Hari"',
                showConfirmButton: false,
                timer: 4000
            })
        </script>
    <?php
        header("Refresh:3; url=user_profile.php");
    } else {
        header("Refresh:0; url=user_login.php");
    }
    ?>
</body>

</html>