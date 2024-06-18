<?php

require 'app/Conn.php';
$number = $db->query('SELECT no_wa FROM settings WHERE id = 1')->fetchAll()[0]['no_wa'];
$formatted_number = str_replace("08", "628", $number);

$api = "https://api.whatsapp.com/send";
$text = "Halo, saya ingin order dengan detail berikut:
----------------------
Nama: Janggar Prabowo
Alamat: Jl. Kebon Jeruk No. 1
No. HP: 081234567890
Produk: Decal Paket Sekolah
Jumlah: 1
Catatan: -
";

$wa = $api . "?phone=" . $formatted_number . "&text=" . urlencode($text);
header("Location: $wa");
