<html>

<head>
<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style1.css">
</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav" style="margin-left:60px;">
      <li class="active"><a href="#">Buku</a></li>
      <li><a href="#">User</a></li>
    </ul>
    <form class="navbar-form navbar-left" action="/action_page.php" style="margin-left:900px;">
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
        <!-- Start Catalogue Book Area -->
        <section id="testimornial-area" style="padding:50px">
            <div class="container">
                <div class="row text-center" style="margin-top:30px;">
    <?php
    include "connection.php";
    $id_buku = $_GET['id_buku'];
    $query = "select * from buku where id_buku='$id_buku'";
    $result = mysqli_query($connect, $query);
    ?>
    <form action="prosesEditBuku.php" method="GET">
        <!-- <table> -->
            <?php
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
                                <div class="testimonial-content">
                                <center>
                <tr>
                    <td>ID: </td>
                    <td><input type="text" name="id_buku" value="<?php echo $row['id_buku']; ?>"></td>
                </tr>
                <tr>
                    <td>Nama Buku : </td>
                    <td><input type="text" name="nama_buku" value="<?php echo $row['nama_buku']; ?>" size="30" maxlength="99" required></td>
                </tr>
                <tr>
                    <td>Penerbit : </td>
                    <td><input type="text" name="penerbit" value="<?php echo $row['penerbit']; ?>" size="30" maxlength="50" required></td>
                </tr>
                <tr>
                    <td>Keterangan Buku: </td>
                    <td><textarea name="keterangan_buku" required cols="30" rows="10"><?php echo $row['keterangan_buku']; ?></textarea></td>
                </tr>
                <tr>
                    <td>Status Buku: </td>
                    <td><input type="text" name="status_buku" value="<?php echo $row['status_buku']; ?>" size="30" maxlength="45" required></td>
                </tr>
                <tr>
                    <td><input type="submit" name="simpan" value="Simpan"></td>
                </tr>
                </center>
                </div>
                            </div>
        <!-- </table> -->
    <?php
    }
    ?>
    </div>
            </div>
        </section>
        <!-- End Catalogue Book Area -->
    </div>
    </form>
    
</body>

</html>