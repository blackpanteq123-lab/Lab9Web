<?php
include_once 'koneksi.php';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Hapus gambar lama jika ada
    $row = mysqli_fetch_array(mysqli_query($conn, "SELECT gambar FROM data_barang WHERE id_barang='$id'"));
    if($row['gambar'] && file_exists($row['gambar'])) unlink($row['gambar']);
    
    mysqli_query($conn, "DELETE FROM data_barang WHERE id_barang='$id'");
}
header("Location: " . base_url() . "barang/list");
exit;
?>
