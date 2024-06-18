<?php

require 'app/Conn.php';

$data = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
];

if ($data['email'] == null) {
    header('location: /login');
    exit;
}

$user = $db->prepare('SELECT * FROM users WHERE email = :email');
$user->execute(['email' => $data['email']]);
$user = $user->fetch();

if ($user && password_verify($data['password'], $user['password'])) {
    session_start();
    $_SESSION['email'] = $user['email'];
    $_SESSION['name'] = $user['name'];

    header('location: /admin');
} else {
    header('location: /login?fail=1');
}
