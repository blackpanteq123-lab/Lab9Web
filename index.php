<?php
require 'views/header.php';
require 'config/database.php';

$page = $_GET['page'] ?? 'barang/list';

$routes = [
    'barang/list'   => 'modules/barang/list.php',
    'barang/add'    => 'modules/barang/add.php',
    'barang/edit'   => 'modules/barang/edit.php',
    'barang/delete' => 'modules/barang/delete.php',
];

if (isset($routes[$page]) && file_exists($routes[$page])) {
    include $routes[$page];
} else {
    echo "<h2>Halaman tidak ditemukan!</h2>";
}
?>
