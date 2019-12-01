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
                    <li class="active"><a href="user_profile.php">List Buku</a></li>
                    <li><a href="#">Pemesanan Anda</a></li>
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
            $id_buku = $_GET['id_buku'];
            $username = $_GET['username'];
            $queryUser = "select * from user where username = '$username'";
            $query = "select * from buku where id_buku='$id_buku'";
            $resultUsername = mysqli_query($connect, $queryUser);
            $result = mysqli_query($connect, $query);
            ?>
        <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: auto; margin-right: auto;">
            <center>
                <h1>Pesen Buku</h1><br>
            </center>
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="prosesUploadBuku.php" name="form1" id="form1">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nama_buku">Nama Buku: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_buku" id="nama_buku" maxlength="95" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="penerbit">Penerbit Buku: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="penerbit" name="penerbit" maxlength="45" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="keterangan_buku">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="7" name="keterangan_buku" id="keterangan_buku"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="status_buku">Status Buku</label>
                            <div class="col-sm-10">
                                <label><input type="radio" name="status_buku" value="Tersedia" checked>Tersedia</label>
                                <label><input type="radio" name="status_buku" value="Tidak Tersedia">Tidak Tersedia</label>
                            </div>
                        </div>
                        <label class="control-label col-sm-2" for="foto">Foto Buku : </label>
                        <div class="file-field">
                            <div class="btn btn-primary btn-sm float-left">
                                <span>Choose file</span>
                                <input type="file" name="nama_file" id="nama_file" required>
                            </div>
                            <br>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success" value="Simpan">Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    } else {
        header("Refresh:0; url=user_login.php");
    }
    ?>
</body>

</html>