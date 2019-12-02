<html>

<head>
    <title>Register Status</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body>
    <?php
    include "connection.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_user = $_POST['nama_user'];
    $alamat_user = $_POST['alamat_user'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];


    $sqlCheck = "SELECT * FROM user where username='$username' AND email='$email'";
    $runCheck = mysqli_query($connect, $sqlCheck);

    $checkAvailability = mysqli_num_rows($runCheck);

    if ($checkAvailability == TRUE) {
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Username or Email already Exist',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
        <?php
            header("Refresh:1; url=user_register.php");
        } else {
            $sql = "INSERT INTO `user` (`username`, `password`, `nama_user`, `alamat_user`, `email`, `no_hp`) VALUES ('$username', MD5('$password'), '$nama_user', '$alamat_user', '$email', '$no_hp')";
            if (mysqli_query($connect, $sql)) {
                ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success Register',
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>
        <?php
                header("Refresh:2; url=user_login.php");
            } else {
                ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error Connect MySQL',
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>
    <?php
            header("Refresh:1; url=user_register.php");
        }
        mysqli_close($connect);
    } ?>
</body>

</html>