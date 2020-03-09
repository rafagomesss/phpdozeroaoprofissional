<?php

try {
    $pdo = new \PDO('mysql:host=database;dbname=projeto_permissao', 'root', 'root');
} catch (\PDOException $e) {
    echo 'ERRO: ' . $e->getMessage();
    exit();
}
