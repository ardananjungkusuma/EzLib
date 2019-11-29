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
    <!-- Start Testimornial Area -->
    <section id="testimornial-area">
        <div class="container">
            <div class="row" style="margin-top:50px;">
                <div class="col-lg-12">
                    <?php
                    include "connection.php";

                    $id_buku = $_GET['id_buku'];
                    $query = "select * from buku where id_buku='$id_buku'";
                    $result = mysqli_query($connect, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <div class="tm-box">
                                <center><img src="<?php echo $row['nama_file'] ?>" width="140"></center>
                                <div class="tm-box-description">
                                    <center>
                                        <h2><?php echo $row['nama_buku'] ?></h2>
                                        <h6><?php echo $row['penerbit'] ?></h6>
                                        <h5 style="color:red;"><?php echo $row['status_buku'] ?></h5>
                                    </center>
                                    <p class="tm-box-p"><?php echo $row['keterangan_buku'] ?></p>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "0 Result";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimornial Area -->
    </div>
</body>

</html>