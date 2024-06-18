<?php

require '../../vendor/autoload.php';

use App\SQLiteConnection;

$data = [
    'id' => 1,
    'wa' => $_POST['wa'],
];

$db = (new SQLiteConnection())->connect("../../db/database.db");
$db->query("UPDATE settings SET no_wa = '{$data['wa']}' WHERE id = '{$data['id']}'");

header('Location: /admin/setting?update=success');
