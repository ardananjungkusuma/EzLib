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
    <div id="section2">
        <!-- Start Catalogue Book Area -->
        <section id="testimornial-area" style="padding:50px">
            <div class="container">
                <div class="row text-center" style="margin-top:30px;">
                    <?php
                    include "connection.php";

                    $query = "select * from buku";
                    $result = mysqli_query($connect, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
                                <div class="testimonial-content">
                                    <img src="<?php echo $row['nama_file'] ?>" width="150" style="margin-top:20px;">
                                    <h2 style="padding:10px;"><?php echo $row['nama_buku'] ?></h2>
                                    <h5>"<?php echo $row['penerbit'] ?>"</h5>
                                    <mark style="background-color:black;color:white;"><?php echo $row['status_buku'] ?></mark><br><br>
                                    <a href="detailBuku.php?id_buku=<?php echo $row['id_buku']; ?>"><button class="btn btn-warning">Detail Buku</button></a>
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
        </section>
        <!-- End Catalogue Book Area -->
    </div>
</body>

</html>