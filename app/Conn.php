<?php

require 'vendor/autoload.php';

use App\SQLiteConnection;

$db = (new SQLiteConnection())->connect();
