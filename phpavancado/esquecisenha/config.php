<?php

try {
    $dsn = 'mysql:host=database;dbname=projeto_esqueciasenha';
    $dbuser = 'root';
    $dbpass = 'root';
    $pdo = new \PDO($dsn, $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
    die($e->getMessage());
}
