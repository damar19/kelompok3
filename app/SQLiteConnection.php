<?php

namespace App;

class SQLiteConnection
{
    private $pdo;

    public function connect($db_path = Config::DB_PATH)
    {
        if ($this->pdo == null) {
            $this->pdo = new \PDO("sqlite:" . $db_path);
        }
        return $this->pdo;
    }

    public function getProducts()
    {
        $db = $this->connect(Config::DB_PATH2);
        $products = $db->query('SELECT * FROM products')->fetchAll();

        return $products;
    }
}
