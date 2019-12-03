<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
        <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: auto; margin-right: auto;">
            <div class="row">
                <div class="col-lg-12" style="background-color: #f2f2f2; max-height: 2000px; max-width: 3000px; padding: 10px; border-radius: 25px;">
                    <center>
                        <h1>Tambah Buku</h1><br>
                    </center>
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
                        <br>
                        <center>
                            <button style="width:150px;height:40px;font-size:20px;" type="reset" class="btn btn-danger" value="Reset">Reset</button>
                            <button style="width:150px;height:40px;font-size:20px;" type="submit" class="btn btn-success" value="Simpan">Simpan</button>
                        </center>
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