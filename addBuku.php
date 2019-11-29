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
                    <li class="active"><a href="#">Buku</a></li>
                    <li><a href="#">User</a></li>
                    <li><a href="sessionLogoutAdmin.php">Log Out</a></li>
                </ul>
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
        <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: auto; margin-right: auto;">
            <center>
                <h1>Tambah Buku</h1><br>
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
                        <button type="submit" class="btn btn-success" value="Simpan">Simpan</button>
                        <button type="reset" class="btn btn-danger" value="Reset">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    } else {
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Anda Belum Login',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    <?php
        header("Refresh:1; url=admin_login.php");
    }
    ?>
</body>

</html>