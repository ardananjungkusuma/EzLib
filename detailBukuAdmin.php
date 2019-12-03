<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style1.css">
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
    if ($_SESSION['status'] == 'admin_login') {
        ?>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="admin_dashboard.php">Admin Dashboard EzLib</a>
                </div>
                <ul class="nav navbar-nav" style="margin-left:60px;">
                    <li class="active"><a href="admin_dashboard.php">Manajemen Buku</a></li>
                    <li><a href="manajemen_peminjaman.php">Manajemen Peminjaman</a></li>
                    <li><a href="manajemen_user.php">Manajemen User</a></li>
                </ul>
                <div class="dropdown" style="float:right">
                    <h5 style="color:white;float:right;margin-top:10px; border-radius: 20px;">Welcome Admin <?php echo $_SESSION['username'] ?> <img src="img/avatar.png" width="30px" height="30px"></h5>
                    <div class="dropdown-content">
                        <a href="sessionLogoutAdmin.php">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container" style="padding: 20px; margin: 20 px auto; margin-left: auto; margin-right: auto;">
            <div class="row" style="margin-top:140px;">
                <div class="col-md-6">
                    <?php
                        include "connection.php";
                        $id_buku = $_GET['id_buku'];
                        $query = "select * from buku where id_buku='$id_buku'";
                        $result = mysqli_query($connect, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                            <center><img class="zoom" style="margin-top:30px;margin-bottom:30px;border: 1px solid black;" src="<?php echo $row['nama_file'] ?>" width="140"></center>
                    <?php
                            }
                        } else {
                            echo "0 Result";
                        } ?>
                </div>
                <div class="col-md-6" style="background-color: #f2f2f2; max-height: 2000px; max-width: 3000px; padding: 10px; border-radius: 25px;">
                    <?php
                        include "connection.php";
                        $id_buku = $_GET['id_buku'];
                        $query = "select * from buku where id_buku='$id_buku'";
                        $result = mysqli_query($connect, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                            <center>
                                <h2><?php echo $row['nama_buku'] ?></h2>
                                <h6><?php echo $row['penerbit'] ?></h6>
                                <h5 style="color:red;"><?php echo $row['status_buku'] ?></h5>
                                <h5 style="margin-bottom:10px;"><?php echo $row['keterangan_buku'] ?></h5>
                            </center>
                    <?php
                            }
                        } else {
                            echo "0 Result";
                        } ?>
                </div>
            </div>
        </div><?php

                } else {
                    header("Refresh:0; url=user_login.php");
                }
                ?>
</body>

</html>