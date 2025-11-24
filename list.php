<?php require '../../views/header.php'; ?>
<?php require '../../config/database.php'; ?>
<?php include("koneksi.php"); 
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
    <title>Data Barang</title>
</head>
<body>
<div class="container">
    <h1>Data Barang</h1>
    <p><a href="tambah.php">+ Tambah Barang Baru</a></p>
    <table>
        <tr>
            <th>Gambar</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php if(mysqli_num_rows($result)>0): ?>
            <?php while($row = mysqli_fetch_array($result)): ?>
            <tr>
                <td>
                    <?php if($row['gambar'] && file_exists($row['gambar'])): ?>
                        <img src="<?= $row['gambar'] ?>" alt="<?= $row['nama'] ?>">
                    <?php else: ?> [Gambar tidak ada] <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= $row['kategori'] ?></td>
                <td>Rp <?= number_format($row['harga_beli'],0,',','.') ?></td>
                <td>Rp <?= number_format($row['harga_jual'],0,',','.') ?></td>
                <td><?= $row['stok'] ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row['id_barang'] ?>">Ubah</a> |
                    <a href="hapus.php?id=<?= $row['id_barang'] ?>" 
                       onclick="return confirm('Yakin hapus <?= $row['nama'] ?>?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="7" style="text-align:center;">Belum ada data</td></tr>
        <?php endif; ?>
    </table>
</div>
</body>
</html>
<?php require '../../views/footer.php'; ?>
