<?php

require '../../vendor/autoload.php';

use App\SQLiteConnection;

$id = $_GET['id'];

$db = (new SQLiteConnection())->connect("../../db/database.db");

$data = $db->query("SELECT * FROM products WHERE id = '{$id}'")->fetchAll()[0];
$imagepath = "../../assets/products/" . $data['image'];

unlink($imagepath);

$db->query("DELETE FROM products WHERE id = '{$id}'");

header('Location: /admin/produk');
