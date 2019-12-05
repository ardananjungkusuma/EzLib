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
                        <li class="active"><a href="user_profile.php">List Buku</a></li>
                        <li><a href="pemesanan_user.php?id_user=<?php echo $row2['id_user'] ?>">Pemesanan Anda</a></li>
                        <li><a href="rules.php">Peraturan Perpustakaan</a></li>
                    </ul>
                    <div class="dropdown" style="float:right">
                        <h5 style="color:white;float:right;margin-top:10px; border-radius: 20px;">Welcome ,<?php echo $_SESSION['username'] ?> <img src="img/avatar.png" width="30px" height="30px"></h5>
                        <div class="dropdown-content">
                            <a href="sessionLogoutUser.php">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
    <?php
            }
        }
        ?>
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
                            <?php
                                        if ($row['status_buku'] == "Tersedia") {
                                            ?>
                                <a href="pesanBuku.php?id_buku=<?php echo $id_buku ?>&username=<?php echo $_SESSION['username'] ?>"><button class="btn btn-primary" style="width:250px;">Pesan Buku</button></a>
                            <?php
                                        } else {
                                            //do nothing
                                        }
                                        ?>
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