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

    <div id="section2">
      <a href="addBuku.php" style="position:absolute; left:200px;margin-top:20px;"><button class="btn btn-success">Tambah Buku</button></a>
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
                    <h2><?php echo $row['nama_buku'] ?></h2>
                    <h4><?php echo $row['penerbit'] ?></h4>
                    <h3><?php echo $row['status_buku'] ?></h3>
                    <a href="detailBuku.php?id_buku=<?php echo $row['id_buku']; ?>">Detail Buku</a>
                    <br>
                    <a href="editBuku.php?id_buku=<?php echo $row['id_buku']; ?>">Edit Buku</a>
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