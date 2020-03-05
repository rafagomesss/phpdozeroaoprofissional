<?php

class Usuarios
{
    private $db;

    public function __construct()
    {
        try {
            $this->db = new \PDO('mysql:host=database;dbname=blog', 'root', 'root');
        } catch (\PDOException $e) {
            echo 'Falha: ' . $e->getMessage();
        }
    }
}
