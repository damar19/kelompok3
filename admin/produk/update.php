<?php

require '../../vendor/autoload.php';

use App\SQLiteConnection;

$data = [
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'desc' => $_POST['desc'],
];

$db = (new SQLiteConnection())->connect("../../db/database.db");
$db->query("UPDATE products SET name = '{$data['name']}', price = '{$data['price']}', description = '{$data['desc']}' WHERE id = '{$data['id']}'");

header('Location: /admin/produk');
