<?php

class Usuario
{
    private $id;
    private $email;
    private $senha;
    private $nome;

    private $pdo;

    public function __construct($i = '')
    {
        try {
            $this->pdo = new \PDO('mysql:host=database;dbname=usuarios', 'root', 'root');
        } catch (\PDOException $e) {
            echo 'Falhou: ' . $e->getMessage();
        }

        if (!empty($i)) {
            $sql = 'SELECT * FROM usuarios WHERE id = ?';
            $sql = $this->pdo->prepare($sql);
            $sql->execute([$i]);

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch();
                $this->id = $data['id'];
                $this->email = $data['email'];
                $this->senha = $data['senha'];
                $this->nome = $data['nome'];
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setSenha($senha)
    {
        $this->senha = md5($senha);
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function salvar()
    {
        if (!empty($this->id)) {
            $sql = "UPDATE usuarios SET email = ?, senha = ?, nome = ? WHERE id = ?";
            $sql = $this->pdo->prepare($sql);
            $sql->execute([$this->email, $this->senha, $this->nome, $this->id]);
        } else {
            $sql = "INSERT usuarios SET email = ?, senha = ?, nome = ?";
            $sql = $this->pdo->prepare($sql);
            $sql->execute([$this->email, $this->senha, $this->nome]);
        }
    }

    public function delete()
    {
        $sql = 'DELETE FROM usuarios WHERE id = ?';
        $sql = $this->pdo->prepare($sql);
        $sql->execute([$this->id]);
    }
}
