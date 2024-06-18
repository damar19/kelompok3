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
    'image' => $_FILES['image'],
];

$format = "." . explode("/", $data["image"]["type"])[1];
$fix_name = generateName() . $format;

$target_dir = "../../assets/products/";
$target_file = $target_dir . $fix_name;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$uploadOk = 1;
$errorMessage = "";

// Check if file already exists
if (file_exists($target_file)) {
    $errorMessage = "Gagal, ulangi proses sekali lagi.";
    $uploadOk = 0;
}

// Check file size
if ($data["image"]["size"] > 500000) {
    $errorMessage = "Gagal, size foto terlalu besar.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $errorMessage = "Only JPG, JPEG, & PNG format!";
    $uploadOk = 0;
}

// process upload
if ($uploadOk == 0) {
    header('Location: /admin/produk?error=' . $errorMessage);
} else {
    move_uploaded_file($data["image"]["tmp_name"], $target_file);
}

// save data to db
$db = (new SQLiteConnection())->connect("../../db/database.db");
$sql = "INSERT INTO products (name, price, description, image) VALUES (:name, :price, :description, :image)";
$stmt = $db->prepare($sql);
$stmt->execute([
    'name' => $data['name'],
    'price' => $data['price'],
    'description' => $data['desc'],
    'image' => $fix_name,
]);

header('Location: /admin/produk');
