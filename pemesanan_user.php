<!DOCTYPE html>
<html lang="en">

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
                    <li><a href="user_profile.php">List Buku</a></li>
                    <li class="active"><a href="#">Pemesanan Anda</a></li>
                </ul>
                <div class="dropdown">
                    <button class="dropbtn" style="color:red;float:right;margin-top:10px;">Welcome ,<?php echo $_SESSION['username'] ?></button>
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
        <?php
            include "connection.php";
            $id_user = $_GET['id_user'];
            // $queryUser = "select * from user where username='$username'";
            $query = "select * from peminjaman where id_user='$id_user'";
            $result = mysqli_query($connect, $query);
            $check = mysqli_num_rows($result);
            if (mysqli_num_rows($result) > 0) { ?>
            <table class="table table-bordered">
                <thead>
                    <tr table-info>
                        <th scope="col">Nama Buku</th>
                        <th scope="col">Tanggal Book</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Denda</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            while ($row = mysqli_fetch_array($result)) {
                                $idBukuCari = $row['id_buku'];
                                $queryBuku = "select * from buku where id_buku = '$idBukuCari'";
                                $resultNamaBuku = mysqli_query($connect, $queryBuku);
                                while ($rowBuku = mysqli_fetch_array($resultNamaBuku)) {
                                    ?>

                            <tr>
                                <td><?php echo $rowBuku['nama_buku'] ?></td>
                                <td><?php echo $row['tanggal_booking'] ?></td>
                                <td><?php echo $row['tanggal_pinjam'] ?></td>
                                <td><?php echo $row['tanggal_kembali'] ?></td>
                                <td><?php echo $row['denda'] ?></td>
                            </tr>

                    <?php
                                }
                            } ?>
                </tbody>
            </table>
    <?php
        } else {
            echo "Anda Tidak Melakukan Pemesanan";
        }
    } else {
        header("Refresh:0; url=user_login.php");
    }
    ?>
</body>

</html>