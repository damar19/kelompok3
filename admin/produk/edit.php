<?php

require '../../vendor/autoload.php';

use App\SQLiteConnection;

session_start();
$_SESSION['email'] == null ? header('location: /login') : null;
$id = $_GET['id'];
$id == null ? header('Location: /admin/produk') : null;

$db = (new SQLiteConnection())->connect("../../db/database.db");
$product = $db->query("SELECT * FROM products WHERE id = $id")->fetchAll()[0] ?? null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - Administrator</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-row">
    <ul class="menu bg-base-200 w-60 h-screen">
        <h3 class="p-4 text-xl font-bold">Administrator</h3>

        <li>
            <a href="/admin">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4">
                    <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                    <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                </svg> Dashboard
            </a>
        </li>
        <li>
            <a href="/admin/produk">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4">
                    <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875ZM9.75 17.25a.75.75 0 0 0-1.5 0V18a.75.75 0 0 0 1.5 0v-.75Zm2.25-3a.75.75 0 0 1 .75.75v3a.75.75 0 0 1-1.5 0v-3a.75.75 0 0 1 .75-.75Zm3.75-1.5a.75.75 0 0 0-1.5 0V18a.75.75 0 0 0 1.5 0v-5.25Z" clip-rule="evenodd" />
                    <path d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
                </svg> Produk
            </a>
        </li>
        <li>
            <a href="/admin/setting">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4">
                    <path d="M18.75 12.75h1.5a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM12 6a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 6ZM12 18a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 18ZM3.75 6.75h1.5a.75.75 0 1 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM5.25 18.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 0 1.5ZM3 12a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 3 12ZM9 3.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM12.75 12a2.25 2.25 0 1 1 4.5 0 2.25 2.25 0 0 1-4.5 0ZM9 15.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
                </svg> Pengaturan
            </a>
        </li>
        <li>
            <a href="/logout.php">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4">
                    <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 0 0 6 5.25v13.5a1.5 1.5 0 0 0 1.5 1.5h6a1.5 1.5 0 0 0 1.5-1.5V15a.75.75 0 0 1 1.5 0v3.75a3 3 0 0 1-3 3h-6a3 3 0 0 1-3-3V5.25a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3V9A.75.75 0 0 1 15 9V5.25a1.5 1.5 0 0 0-1.5-1.5h-6Zm5.03 4.72a.75.75 0 0 1 0 1.06l-1.72 1.72h10.94a.75.75 0 0 1 0 1.5H10.81l1.72 1.72a.75.75 0 1 1-1.06 1.06l-3-3a.75.75 0 0 1 0-1.06l3-3a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                </svg> Logout
            </a>
        </li>

        <div class="absolute bottom-0 p-4">
            <h3 class="text-base font-medium"><?php echo $_SESSION['name'] ?></h3>
            <h3 class="text-xs">Administrator</h3>
        </div>
    </ul>

    <!-- Content -->
    <div class="py-5 px-10 w-max">
        <div class="text-sm breadcrumbs mb-5">
            <ul>
                <li>Dashboard</li>
                <li>Produk</li>
                <li>Edit</li>
            </ul>
        </div>

        <div class="flex items-center justify-between">
            <h3 class="font-semibold text-2xl">Edit Produk</h3>
            <a class="btn btn-xs bg-gray-500 text-white" href="/admin/produk">Kembali</a>
        </div>
        <div class="container bg-gray-800 mt-5 p-5 rounded-md w-[500px]">
            <form action="update.php" method="post">
                <input name="id" type="hidden" value="<?= $product['id'] ?>" />
                <label class="form-control w-full">
                    <div class="label"><span class="label-text">Nama Produk</span></div>
                    <input name="name" type="text" placeholder="Nama" value="<?= $product['name'] ?>" class="input input-bordered" />
                </label>
                <label class="form-control w-full">
                    <div class="label"><span class="label-text">Harga</span></div>
                    <input name="price" type="text" placeholder="Harga" value="<?= $product['price'] ?>" class="input input-bordered" />
                </label>
                <label class="form-control w-full">
                    <div class="label"><span class="label-text">Deskripsi</span></div>
                    <textarea name="desc" class="textarea textarea-bordered" placeholder="Deskripsi Produk..."><?= $product['description'] ?></textarea>
                </label>

                <button type="submit" class="mt-5 btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</body>

</html>