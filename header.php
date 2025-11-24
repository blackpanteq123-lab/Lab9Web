<?php
function base_url() {
    return sprintf("%s://%s%s/", 
        isset($_SERVER['HTTPS']) ? 'https' : 'http',
        $_SERVER['HTTP_HOST'],
        dirname($_SERVER['SCRIPT_NAME'])
    );
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Barang - Lab 9 Modular</title>
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Manajemen Data Barang</h1>
    <nav>
        <a href="<?= base_url() ?>barang/list">Daftar Barang</a> |
        <a href="<?= base_url() ?>barang/add">Tambah Barang</a>
    </nav>
    <hr>
