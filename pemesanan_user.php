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
                    <li class="active"><a href="pemesanan_user.php?id_user=<?php echo $row2['id_user'] ?>">Pemesanan Anda</a></li>
                    <li><a href="rules.php">Peraturan Perpustakaan</a></li>
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
        <?php
            include "connection.php";
            $id_user = $_GET['id_user'];
            // $queryUser = "select * from user where username='$username'";
            $query = "select * from peminjaman where id_user='$id_user'";
            $result = mysqli_query($connect, $query);
            $check = mysqli_num_rows($result);
            if (mysqli_num_rows($result) > 0) { ?>
            <center>
                <table class="table table-bordered" style="width:auto;margin-left:30px;margin-right:30px;">
                    <thead>
                        <tr table-info>
                            <th scope="col">ID Pemesanan</th>
                            <th scope="col">Nama Buku</th>
                            <th scope="col">Tanggal Book</th>
                            <th scope="col">Tanggal Pinjam</th>
                            <th scope="col">Tanggal Kembali</th>
                            <th scope="col">Denda</th>
                            <th scope="col">Status Buku</th>
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

                                    <td><?php echo $row['id_peminjaman'] ?></td>
                                    <td><?php echo $rowBuku['nama_buku'] ?></td>
                                    <td><?php echo $row['tanggal_booking'] ?></td>
                                    <td><?php echo $row['tanggal_pinjam'] ?></td>
                                    <td><?php echo $row['tanggal_kembali'] ?></td>
                                    <td><?php echo $row['denda'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                </tr>

                        <?php
                                    }
                                } ?>
                    </tbody>
                </table>
            </center>
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