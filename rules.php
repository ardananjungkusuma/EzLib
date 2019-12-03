<!DOCTYPE html>
<html>


<head>
    <title>User Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style1.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <style>
        .zoom {
            transition: transform .2s;
            margin: 0 auto;
            transform: scale(1.5);
        }

        .zoom:hover {
            transform: scale(2.0);
        }

        .liPeraturan {
            text-align: left;
            font-size: 20px;
            font-family: 'Times New Roman', Times, serif;
        }

        h3 {
            font-family: 'Times New Roman', Times, serif;
            font-size: 30px;
        }
    </style>

</head>

<body>
    <?php
    include "connection.php";

    session_start();
    if ($_SESSION['status'] == 'user_login') {
        $usernameNow = $_SESSION['username'];
        $queryGetId = "select * from user where username = '$usernameNow'";
        $resultID = mysqli_query($connect, $queryGetId);
        if (mysqli_num_rows($resultID) > 0) {
            while ($row2 = mysqli_fetch_array($resultID)) {
                ?>
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="user_dashboard.php">User Dashboard EzLib</a>
                        </div>
                        <ul class="nav navbar-nav" style="margin-left:60px;">
                            <li><a href="user_profile.php">List Buku</a></li>
                            <li><a href="pemesanan_user.php?id_user=<?php echo $row2['id_user'] ?>">Pemesanan Anda</a></li>
                            <li class="active"><a href="rules.php">Peraturan Perpustakaan</a></li>
                        </ul>
                        <div class="dropdown" style="float:right">
                            <h5 style="color:white;float:right;margin-top:10px; border-radius: 20px;">Welcome ,<?php echo $_SESSION['username'] ?> <img src="img/avatar.png" width="30px" height="30px"></h5>
                            <div class="dropdown-content">
                                <a href="#">Edit Profile</a>
                                <a href="sessionLogoutUser.php">Log Out</a>
                            </div>
                        </div>
                    </div>
                </nav>
        <?php }
            } ?>
        <div class="container" style="padding: 20px; margin: 20 px auto; margin-left: auto; margin-right: auto;">
            <div class="row">
                <center>
                    <div class="col-md-6" style="background-color: #f2f2f2; height: 700px; width: 1150px; padding: 10px; border-radius: 25px;">
                        <h1 style="font-size: 50;font-family: 'Times New Roman', Times, serif;">Peraturan EzLib</h1>

                        <h3 style="text-align: left"> Mekanisme Peminjaman Buku</h3><br>
                        <ol>
                            <li class="liPeraturan">Peminjam Telah Terdaftar Sebagai anggota website EzLib.</li>
                            <li class="liPeraturan">Peminjam Bisa Melihat Buku pada Catalog Buku. Buku yang tersedia bisa langsung dibooking untuk dipesan.</li>
                            <li class="liPeraturan">Maksimal Waktu Pengambilan Buku Yang Telah Di Booking Adalah 3 Hari, lebih dari itu Buku akan Tersedia Kembali. </li>
                            <li class="liPeraturan">Peminjam mengatakan ke admin ID Peminjaman yang telah tertera pada menu <i>"Pemesanan Anda"</i></li>
                            <li class="liPeraturan">Maksimal Waktu Pinjam adalah 7 Hari </li>
                            <li class="liPeraturan">Denda terlambat pengembalian dikenakan Rp 5000/ hari</li>
                            <li class="liPeraturan">Peminjam Dapat Melihat Maksimal Tanggal Kembali Pada Menu <i>"Pemesanan Anda"</i></li>
                        </ol>
                        <br>
                        <h3 style="text-align: left">Mekanisme Pengembalian Buku</h3><br>
                        <ol>
                            <li class="liPeraturan">Mahasiswa memperlihatkan akun anggota perpustakaan online</li>
                            <li class="liPeraturan">Mahasiswa harus menunjukan buku yang telah di pinjam kepada admin </li>
                            <li class="liPeraturan">Lalu silahkan diberikan kepada admin untuk melihat tanggal kembalinya</li>
                        </ol>
                    </div>
                </center>
            <?php
            } else {
                header("Refresh:0; url=user_login.php");
            }
            ?>
</body>

</html>