<html>

<head>
    <title>Upload Status</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body>
    <?php
    $namafolder = "img/booksCatalogue/"; //tempat menyimpan file
    $con = mysqli_connect("localhost", "root", "", "ezlib") or die("Gagal");
    if (!empty($_FILES["nama_file"]["tmp_name"])) {
        $nama_file = $_FILES['nama_file']['type'];
        $nama_buku = $_POST['nama_buku'];
        $penerbit = $_POST['penerbit'];
        $keterangan_buku = $_POST['keterangan_buku'];
        $status_buku = $_POST['status_buku'];
        if ($nama_file == "image/jpeg" || $nama_file == "image/jpg" || $nama_file == "image/gif" || $nama_file == "image/x-png") {
            $gambar = $namafolder . basename($_FILES['nama_file']['name']);
            if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
                $sql = "insert into buku(nama_buku,penerbit,keterangan_buku,status_buku,nama_file) values ('$nama_buku','$penerbit','$keterangan_buku','$status_buku','$gambar')";
                $res = mysqli_query($con, $sql) or die(mysqli_close($con));
                ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Books Uploaded',
                        showConfirmButton: false,
                        timer: 2000
                    })
                </script>
                <?php
                            header("Refresh:2; url=admin_dashboard.php");
                            ?>
            <?php
                    } else {
                        ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error Upload Book',
                        showConfirmButton: false,
                        timer: 2000
                    })
                </script>
            <?php
                        header("Refresh:1; url=addBuku.php");
                    }
                    ?>
        <?php
            } else {
                ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gambar yang anda masukkan formatnya salah',
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>
    <?php
            header("Refresh:1; url=addBuku.php");
        }
    } else {
        header("Refresh:0; url=admin_login.php");
    } ?>
</body>

</html>