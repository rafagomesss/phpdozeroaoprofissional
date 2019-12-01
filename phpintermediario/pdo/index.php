<?php

$dsn = 'mysql:dbname=blog;host=127.0.0.1';
$dbuser = 'root';
$dbpass = '';

try {
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $pdo = new PDO($dsn, $dbuser, $dbpass, $options);

    // selecionarDados($pdo);
    // inserirDados($pdo);
    // atualizarDados($pdo);
    // removerDados($pdo);
    atualizarComBind($pdo);
} catch (PDOException $e) {
    echo 'Falhou: ' . $e->getMessage();
}

function selecionarDados($conn)
{
    $sql = 'SELECT * FROM usuarios';
    $sql = $conn->query($sql);

    if ($sql->rowCount() > 0) {
        foreach ($sql->fetchAll() as $key => $value) {
            echo 'Nome: ' . $value['nome'] . '<br>Email: ' . $value['email'] . '<br>Senha: ' . $value['senha'] . '<br><hr>';
        }
    } else {
        echo 'Nenhum usuário encontrado!';
    }
}

function inserirDados($conn)
{
    $nome = 'Teste de Inserir Dados';
    $email = 'teste@inserirdados.com.br';
    $senha = md5('987654321');

    $sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = '$senha'";
    $sql = $conn->query($sql);

    if ($sql->rowCount() > 0) {
        echo 'Usuário inserido com sucesso! - ID do último usuário inserido: ' . $conn->lastInsertId();
    }
}

function atualizarDados($conn)
{
    $sql = "UPDATE usuarios SET email = 'teste@inserirdados.com.br' WHERE email = 'abc@hotmail.com'";
    $sql = $conn->query($sql);

    $message = 'Usuário não encontrado, nenhum dado foi atualizado!';

    if ((int)$sql->rowCount() === 1) {
        $message = 'Usuário atualizado com sucesso!';
    } elseif((int)$sql->rowCount() > 1) {
        $message = 'Usuários atualizados com sucesso!';
    }

    echo $message;
}

function removerDados($conn)
{
    $sql = "DELETE FROM usuarios WHERE id = (SELECT MAX(id) FROM usuarios);";
    $sql = $conn->query($sql);

    $message = 'Usuário não encontrado, nenhum dado foi removido!';

    if ((int)$sql->rowCount() > 0) {
        $message = 'Usuário removido com sucesso!';
    }

    echo $message;
}

function atualizarComBind($conn)
{
    $nome = 'aaasdsdfsdfdsfasds';
    $id = 4;

    $sql = "UPDATE usuarios SET nome = :novonome WHERE id = :id";

    $sql = $conn->prepare($sql);

    $sql->bindValue(':novonome', $nome);
    $sql->bindValue(':id', $id);

    $message = 'Usuário não encontrado, nenhum dado foi atualizado!';

    if ($sql->execute() && (int)$sql->rowCount() === 1) {
        $message = 'Usuário atualizado com sucesso!';
    } elseif($sql->execute() && (int)$sql->rowCount() > 1) {
        $message = 'Usuários atualizados com sucesso!';
    }

    echo $message;
}