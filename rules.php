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
    </style>

</head>

<body>
    <?php
    include "connection.php";

    session_start();
    if ($_SESSION['status'] == 'user_login') {
        ?>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="user_dashboard.php">User Dashboard EzLib</a>
                </div>
                <ul class="nav navbar-nav" style="margin-left:60px;">
                    <li class="active"><a href="user_profile.php">List Buku</a></li>
                    <li><a href="#">Pemesanan Anda</a></li>
                </ul>
                <div class="dropdown">
                    <button class="dropbtn" style="color:red;float:right;margin-top:10px; border-radius: 20px;">Welcome ,<?php echo $_SESSION['username'] ?> <img src="img/avatarr.png" width="30px" height="30px"></button>
                    <div class="dropdown-content">
                        <a href="#">Edit Profile</a>
                        <a href="sessionLogoutUser.php">Log Out</a>
                    </div>
                </div>
                <form class="navbar-form navbar-left" action="/action_page.php" style="margin-left:500px;">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
        <div class="container" style="padding: 20px; margin: 20 px auto; margin-left: auto; margin-right: auto;">
            <div class="row" style="margin-top:50px;">
                <center>
                    <div class="col-md-6" style="background-color: #f2f2f2; height: 700px; width: 1150px; padding: 10px; border-radius: 25px;">
                        <h1 style="font-size: 50;">EzLib Rules</h1>
                        <br>
                        <br>
                        <br>
                        <br>
                        <h3> Mekanisme Peminjam buku <br>
                            <br>
                            - Mahasiswa telah terdaftar sebagai anggota perpustakaan Online <br>
                            - Mahasiswa membawa bukti pinjam perpustakaan Online <br>
                            - Maksimal Waktu Pinjam adalah 7 Hari <br>
                            - Denda terlambat pengembalian dikenakan Rp 5000/ hari <br>
                            - Buku di diatur di website dengan tanggal kembali dan diserahkan kepada peminjam
                            <br> <br>
                            <br> <br>
                            <br>
                            Mekanisme Pengembalian Buku <br>
                            <br>
                            - Mahasiswa memperlihatkan akun anggota perpustakaan online <br>
                            - Mahasiswa harus menunjukan buku yang telah di pinjam kepada admin <br>
                            - Lalu silahkan diberikan kepada admin untuk melihat tanggal kembalinya

                        </h3>
                    </div>
                </center>
            <?php
            } else {
                header("Refresh:0; url=user_login.php");
            }
            ?>
</body>

</html>