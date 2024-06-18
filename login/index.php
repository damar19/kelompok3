<?php

session_start();

$fail = $_GET['fail'] ?? null;
$session = $_SESSION['email'] ?? null;

if ($session) {
    header('location: /admin');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content bg-gray-800 rounded-md w-full md:w-1/3 p-10">
            <div class="w-full">
                <h1 class="text-3xl font-medium mb-5">Masuk Administrator</h1>

                <?php
                if ($fail) {
                    echo '<div class="text-sm text-red-500">Email atau password salah!</div>';
                }
                ?>
                <form action="/loginProccess.php" method="post">
                    <label class="form-control w-full">
                        <div class="label"><span class="label-text">Email</span></div>
                        <input name="email" type="email" placeholder="Email" class="input input-bordered w-full" />
                    </label>
                    <label class="form-control w-full">
                        <div class="label"><span class="label-text">Password</span></div>
                        <input name="password" type="password" placeholder="Password" class="input input-bordered w-full" />
                    </label>

                    <button type="submit" class="mt-5 btn btn-primary w-full">Login</button>
                </form>

            </div>
        </div>
    </div>
</body>

</html>