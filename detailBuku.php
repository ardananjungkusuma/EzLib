<!DOCTYPE html>
<html>

<head>
    <title>EzLib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
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
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="single-page-nav sticky-wrapper" id="tmNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="index.php#section1">Homepage</a></li>
                    <li><a href="index.php#section2">Trending Books</a></li>
                    <li><a href="index.php#section3">List Buku</a></li>
                    <li><a href="index.php#section4">Login/Register</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="padding: 20px; margin: 20 px auto; margin-left: auto; margin-right: auto;">
        <div class="row" style="margin-top:190px;">
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
            <div class="col-md-6">
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
    </div>
</body>

</html>