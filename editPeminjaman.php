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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
                    <li><a href="admin_dashboard.php">Manajemen Buku</a></li>
                    <li class="active"><a href="manajemen_peminjaman.php">Manajemen Peminjaman</a></li>
                    <li><a href="#">Manajemen User</a></li>
                </ul>
                <div class="dropdown">
                    <button class="dropbtn" style="color:red;float:right;margin-top:10px;">Welcome Admin <?php echo $_SESSION['username'] ?></button>
                    <div class="dropdown-content">
                        <a href="#">Edit Profile</a>
                        <a href="sessionLogoutAdmin.php">Log Out</a>
                    </div>
                </div>
                <form class="navbar-form navbar-left" action="/action_page.php" style="margin-left:200px;">
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
            $id_peminjaman = $_GET['id_peminjaman'];
            $query = "select * from peminjaman where id_peminjaman = '$id_peminjaman'";
            $result = mysqli_query($connect, $query);
            ?>
        <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: auto; margin-right: auto;">
            <div class="row">
                <div class="col-lg-12" style="background-color: #f2f2f2; max-height: 2000px; max-width: 3000px; padding: 10px; border-radius: 25px;">
                    <form class="form-horizontal" action="prosesEditPeminjaman.php" method="GET" name="form1" id="form1">
                        <?php
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                            <center>
                                <h1>Edit Peminjaman</h1>
                            </center>
                            <input type="hidden" class="form-control" name="id_peminjaman" value="<?php echo $row['id_peminjaman']; ?>" id="id_peminjaman" maxlength="20" required>
                            <!-- hidden agar tidak diotak atik oleh admin -->
                            <input type="hidden" class="form-control" name="id_buku" value="<?php echo $row['id_buku']; ?>" id="id_buku" maxlength="95" required>
                            <input type="hidden" class="form-control" id="id_user" value="<?php echo $row['id_user']; ?>" name="id_user" maxlength="45" required>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="tanggal_booking">Tanggal Booking</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tanggal_booking" value="<?php echo $row['tanggal_booking']; ?>" name="tanggal_booking" maxlength="15" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="tanggal_pinjam">Tanggal Pinjam</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tanggal_pinjam" value="<?php echo $row['tanggal_pinjam']; ?>" name="tanggal_pinjam" maxlength="15" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="tanggal_kembali">Tanggal Kembali</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tanggal_kembali" value="<?php echo $row['tanggal_kembali']; ?>" name="tanggal_kembali" maxlength="15" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="denda">Denda</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="denda" value="<?php echo $row['denda']; ?>" name="denda" maxlength="15">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="status">Status Buku</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="status" value="<?php echo $row['status']; ?>" name="status" maxlength="25">
                                </div>
                            </div>
                        <?php
                            }
                            ?>
                        <br>
                        <button type="submit" class="btn btn-success" value="Simpan" style="margin-left:80px;">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    } else {
        header("Refresh:0; url=admin_login.php");
    }
    ?>
</body>

</html>