<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
    $id         = $_POST['id'];
    $nama       = $_POST['nama'];
    $kategori   = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok       = $_POST['stok'];
    $gambar     = $_POST['gambar_lama'];

    if ($_FILES['file_gambar']['error'] == 0) {
        $filename = str_replace(' ', '_', $_FILES['file_gambar']['name']);
        $dest = dirname(__FILE__) . '/gambar/' . $filename;
        if (move_uploaded_file($_FILES['file_gambar']['tmp_name'], $dest)) {
            $gambar = 'gambar/' . $filename;
        }
    }

    $sql = "UPDATE data_barang SET nama='$nama', kategori='$kategori', 
            harga_jual='$harga_jual', harga_beli='$harga_beli', stok='$stok', gambar='$gambar'
            WHERE id_barang='$id'";
    mysqli_query($conn, $sql);
    header('Location: index.php');
}

$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM data_barang WHERE id_barang='$id'"));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
    <title>Ubah Barang</title>
</head>
<body>
<div class="container">
    <h1>Ubah Barang</h1>
    <form method="post" action="ubah.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $data['id_barang'] ?>">
        <input type="hidden" name="gambar_lama" value="<?= $data['gambar'] ?>">

        <div class="input"><label>Nama Barang</label><input type="text" name="nama" value="<?= $data['nama'] ?>" required></div>
        <div class="input"><label>Kategori</label>
            <select name="kategori">
                <option value="Komputer" <?= $data['kategori']=='Komputer'?'selected':'' ?>>Komputer</option>
                <option value="Elektronik" <?= $data['kategori']=='Elektronik'?'selected':'' ?>>Elektronik</option>
                <option value="Hand Phone" <?= $data['kategori']=='Hand Phone'?'selected':'' ?>>Hand Phone</option>
            </select>
        </div>
        <div class="input"><label>Harga Jual</label><input type="number" name="harga_jual" value="<?= $data['harga_jual'] ?>" required></div>
        <div class="input"><label>Harga Beli</label><input type="number" name="harga_beli" value="<?= $data['harga_beli'] ?>" required></div>
        <div class="input"><label>Stok</label><input type="number" name="stok" value="<?= $data['stok'] ?>" required></div>
        <div class="input">
            <label>Gambar Saat Ini</label><br>
            <?php if($data['gambar']): ?><img src="<?= $data['gambar'] ?>" width="150"><br><?php endif; ?>
            <label>Ganti Gambar</label>
            <input type="file" name="file_gambar" accept="image/*">
        </div>
        <div class="submit">
            <input type="submit" name="submit" value="Simpan Perubahan">
            <a href="index.php">Batal</a>
        </div>
    </form>
</div>
</body>
</html>
