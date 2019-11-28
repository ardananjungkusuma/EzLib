<html>

<head></head>

<body>
    <?php
    include "connection.php";
    $id_buku = $_GET['id_buku'];
    $query = "select * from buku where id_buku='$id_buku'";
    $result = mysqli_query($connect, $query);
    ?>
    <form action="prosesEditBuku.php" method="GET">
        <table>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td>ID: </td>
                    <td><input type="text" name="id_buku" value="<?php echo $row['id_buku']; ?>"></td>
                </tr>
                <tr>
                    <td>Nama Buku : </td>
                    <td><input type="text" name="nama_buku" value="<?php echo $row['nama_buku']; ?>" size="30" maxlength="99" required></td>
                </tr>
                <tr>
                    <td>Keterangan Buku: </td>
                    <td><textarea name="keterangan_buku" cols="30" rows="10"><?php echo $row['keterangan_buku']; ?> required</textarea></td>
                </tr>
                <tr>
                    <td>Status Buku: </td>
                    <td><input type="text" name="status_buku" value="<?php echo $row['status_buku']; ?>" size="30" maxlength="45" required></td>
                </tr>
                <tr>
                    <td><input type="submit" name="simpan" value="Simpan"></td>
                </tr>
        </table>
    <?php
    }
    ?>
    </form>
</body>

</html>