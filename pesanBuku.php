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
        <?php }
            } ?>
        <?php
            include "connection.php";
            $id_buku = $_GET['id_buku'];
            $username = $_GET['username'];
            $queryUser = "select * from user where username = '$username'";
            $query = "select * from buku where id_buku='$id_buku'";
            $resultUsername = mysqli_query($connect, $queryUser);
            $result = mysqli_query($connect, $query);
            ?>
        <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: auto; margin-right: auto;">
            <center>
                <h1>Pesan Buku Untuk Dipinjam</h1><br>
            </center>
            <div class="row">
                <div class="col-lg-12" style="background-color: #f2f2f2; max-height: 2000px; max-width: 3000px; padding: 10px; border-radius: 25px;">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="prosesPesanBuku.php" name="form1" id="form1">
                        <?php
                            while ($row = mysqli_fetch_array($result)) {
                                while ($rowUser = mysqli_fetch_array($resultUsername)) { ?>
                                <input type="hidden" name="id_buku" value="<?php echo $row['id_buku']; ?>" id="id_buku" maxlength="20" required>
                                <input type="hidden" name="id_user" value="<?php echo $rowUser['id_user']; ?>" id="id_user" required>
                                <center>
                                    <center><img class="zoom" style="margin-top:30px;margin-bottom:30px;border: 1px solid black;" src="<?php echo $row['nama_file'] ?>" width="140"></center>
                                    <h2><?php echo $row['nama_buku'] ?></h2>
                                    <h5>"<?php echo $row['penerbit'] ?>"</h5>
                                    <h5 style="text-align:left;margin-bottom:10px;"><?php echo $row['keterangan_buku'] ?></h5>
                                </center>
                        <?php
                                }
                            }
                            ?>
                </div>
                <br>
                <center><button type="submit" style="width:500px;height:50px;font-size:25px;margin-top:15px;" class="btn btn-success" value="Pesan">Order Now</button></center>
                </form>
            </div>
        </div>
    <?php
    } else {
        header("Refresh:0; url=user_login.php");
    }
    ?>
</body>

</html>