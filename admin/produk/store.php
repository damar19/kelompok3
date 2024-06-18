<?php

require '../../vendor/autoload.php';

use App\SQLiteConnection;

function generateName($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

$data = [
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'desc' => $_POST['desc'],
    'image1' => $_FILES['image1'],
    'image2' => $_FILES['image2'],
];

$fix_image1 = generateName() . "." . explode("/", $data["image1"]["type"])[1];
$fix_image2 = generateName() . "." . explode("/", $data["image2"]["type"])[1];

$target_dir = "../../assets/products/";
$target_file1 = $target_dir . $fix_image1;
$target_file2 = $target_dir . $fix_image2;

move_uploaded_file($data["image1"]["tmp_name"], $target_file1);
move_uploaded_file($data["image2"]["tmp_name"], $target_file2);

// save data to db
$db = (new SQLiteConnection())->connect("../../db/database.db");
$sql = "INSERT INTO products (name, price, description, image1, image2) VALUES (:name, :price, :description, :image1, :image2)";
$stmt = $db->prepare($sql);
$stmt->execute([
    'name' => $data['name'],
    'price' => $data['price'],
    'description' => $data['desc'],
    'image1' => $fix_image1,
    'image2' => $fix_image2,
]);

header('Location: /admin/produk');
