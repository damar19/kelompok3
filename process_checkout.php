<?php
session_start();

// Periksa apakah pengguna login
if (!isset($_SESSION['first_name'])) {
    header("Location: login.php");
    exit;
}

// Proses data checkout
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $_SESSION['order'] = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'address' => $_POST['address'],
        'city' => $_POST['city'],
        'postal_code' => $_POST['postal_code'],
        'phone' => $_POST['phone'],
        'notes' => $_POST['notes'],
        'total_price' => $_SESSION['total_price'],
        'cart' => $_SESSION['cart']
    ];

    // Redirect ke halaman konfirmasi
    header("Location: order_confirmation.php");
    exit;
} else {
    header("Location: checkout.php");
    exit;
}
?>
