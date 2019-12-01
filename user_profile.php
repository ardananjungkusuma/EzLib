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
        $usernameNow = $_SESSION['username'];
        $queryGetId = "select * from user where username = $usernameNow";
        $resultID = mysqli_query($connect, $queryGetId);
        if (mysqli_num_rows($resultID) > 0) {
            // FIX UNTUK MENGEGET ID untuk dikirim ke pemesanan user agar tabel muncul id user dan bisa mengeget nama buku dll
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
                }
            }
            ?>
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
                                        <?php
                                                    if ($row['status_buku'] == "Tersedia") {
                                                        ?>
                                            <a href="pesanBuku.php?id_buku=<?php echo $row['id_buku']; ?>&username=<?php echo $_SESSION['username'] ?>"><button class="btn btn-primary">Pesan Buku</button></a>
                                        <?php
                                                    } else { }
                                                    ?>
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
    <?php
    } else {
        header("Refresh:0; url=user_login.php");
    }
    ?>
</body>

</html>