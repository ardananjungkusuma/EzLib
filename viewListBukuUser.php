<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <table border="1px">
        <tr>
            <th>Nama Buku</th>
            <th>Keterangan Buku</th>
            <th>Status Buku</th>
            <th>Gambar Buku</th>
        </tr>
        <?php
        include "connection.php";

        $query = "select * from buku";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $row['nama_buku'] ?></td>
                    <td><?php echo $row['keterangan_buku'] ?></td>
                    <td><?php echo $row['status_buku'] ?></td>
                    <td><img src="<?php echo $row['nama_file'] ?>" width="140"></td>
            <?php
                }
            } else {
                echo "0 Result";
            }
            ?>
                </tr>
    </table>
</body>

</html>