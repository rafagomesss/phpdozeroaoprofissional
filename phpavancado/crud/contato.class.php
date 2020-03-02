<?php

class Contato
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO("mysql:host=database;dbname=crudoo", 'root', 'root');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    private function existeEmail($email)
    {
        $sql = 'SELECT * FROM contatos WHERE email = :email';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return true;
        }
        return false;
    }

    public function adicionar($email, $nome = '')
    {
        if ($this->existeEmail($email) === false) {
            $sql = 'INSERT INTO contatos (nome, email) VALUES (:nome, :email)';
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome, PDO::PARAM_STR);
            $sql->bindValue(':email', $email, PDO::PARAM_STR);
            $sql->execute();
            return true;
        }
        return false;
    }

    public function editar($nome, $email)
    {
        if ($this->existeEmail($email)) {
            $sql = 'UPDATE contatos SET nome = :nome WHERE email = :email';
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome, PDO::PARAM_STR);
            $sql->bindValue(':email', $email, PDO::PARAM_STR);
            $sql->execute();
            return true;
        }
        return false;
    }

    public function excluir($email)
    {
        $sql = 'DELETE FROM contatos WHERE id = :id';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id, PDO::PARAM_STR);
        $sql->execute();
    }

    public function getNome($email)
    {
        $sql = 'SELECT nome FROM contatos WHERE email = :email';
        $sql =  $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email, PDO::PARAM_STR);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $info = $sql->fetch();
            return $info['nome'];
        }
        return 'Contato não encontrado!';
    }
    public function getAll()
    {
        $sql = 'SELECT * FROM contatos';
        $sql = $this->pdo->query($sql);

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        }
        return [];
    }
}
