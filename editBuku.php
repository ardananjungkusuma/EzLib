<html>

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
    <?php
      include "connection.php";
      $id_buku = $_GET['id_buku'];
      $query = "select * from buku where id_buku='$id_buku'";
      $result = mysqli_query($connect, $query);
      ?>
    <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: auto; margin-right: auto;">
      <div class="row">
        <div class="col-lg-12">
          <form class="form-horizontal" action="prosesEditBuku.php" method="GET" name="form1" id="form1">
            <?php
              while ($row = mysqli_fetch_array($result)) {
                ?>
              <center>
                <h1>Edit Buku</h1>
              </center>
              <div class="form-group">
                <label class="control-label col-sm-2" for="id_buku"></label>
                <div class="col-sm-10">
                  <input type="hidden" class="form-control" name="id_buku" value="<?php echo $row['id_buku']; ?>" id="id_buku" maxlength="20" required>
                  <!-- hidden agar tidak diotak atik oleh admin -->
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="nama_buku">Nama Buku: </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_buku" value="<?php echo $row['nama_buku']; ?>" id="nama_buku" maxlength="95" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="penerbit">Penerbit Buku: </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="penerbit" value="<?php echo $row['penerbit']; ?>" name="penerbit" maxlength="45" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="keterangan_buku">Keterangan</label>
                <div class="col-sm-10">
                  <textarea class="form-control" rows="7" name="keterangan_buku" id="keterangan_buku"><?php echo $row['keterangan_buku']; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="status_buku">Status Buku</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="status_buku" value="<?php echo $row['status_buku']; ?>" name="status_buku" maxlength="15" required>
                </div>
              <?php
                }
                ?>
              </div>
              <br>
              <button type="submit" class="btn btn-success" value="Simpan" style="margin-left:80px;">Simpan</button>
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