<?php
try {
    $dsn = 'mysql:dbname=cadastros;host=database';
    $dbuser = 'root';
    $dbpass = 'root';
    $pdo = new \PDO($dsn, $dbuser, $dbpass);
} catch (\PDOException $e) {
    die($e->getMessage());
}
