<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Upload Buku</title>
</head>

<body>
    <form action="prosesUploadBuku.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <p>Nama Buku :
            <input name="nama_buku" type="text" id="nama_Buku" size="30" maxlength="45" required />
        </p>
        <p>
            Keterangan Buku:
            <textarea name="keterangan_buku" id="keterangan_buku" type="text" cols="30" rows="10" required></textarea>
        </p>
        <p>
            Status Buku : (Tersedia/Tidak Tersedia)
            <input type="radio" name="status_buku" value="Tersedia" checked>Tersedia</label>
            <label><input type="radio" name="status_buku" value="Tidak Tersedia">Tidak Tersedia</label>
        </p>
        <p>
            File Gambar
            :
            <input name="nama_file" type="file" id="nama_file" size="70" />
        </p>
        <p>
            <input type="submit" name="btnSimpan" id="btnSimpan" value="Simpan" />
        </p>
    </form>
</body>
<!-- lanjut edit buku add buku view buku edit buku -->

</html>