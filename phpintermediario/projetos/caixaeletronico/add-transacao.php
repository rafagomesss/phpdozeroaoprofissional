<?php
session_start();
require_once 'config.php';

if (isset($_POST['tipo'])) {
    $tipo = $_POST['tipo'];
    $valor = str_replace(',', '.', $_POST['valor']);
    $valor = floatval($valor);

    $sql =  $pdo->prepare('INSERT INTO historico(id_conta, tipo, valor, data_operacao) VALUES(:id_conta, :tipo, :valor, NOW())');
    $sql->bindValue(':id_conta', $_SESSION['banco']);
    $sql->bindValue(':tipo', $tipo);
    $sql->bindValue(':valor', $valor);
    $sql->execute();

    if ($tipo == '0') {
        // Depósito
        $sql = $pdo->prepare('UPDATE contas SET saldo = saldo + :valor WHERE id = :id');
        $sql->bindValue(':valor', $valor);
        $sql->bindValue(':id', $_SESSION['banco']);
        $sql->execute();
    } else {
        // Sque
        $sql = $pdo->prepare('UPDATE contas SET saldo = saldo - :valor WHERE id = :id');
        $sql->bindValue(':valor', $valor);
        $sql->bindValue(':id', $_SESSION['banco']);
        $sql->execute();
    }

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Caixa Eletrônico</title>
    </head>
    <body>
        <form method="POST">
            Tipo de transação: <br>
            <select name="tipo">
                <option value="0">Depósito</option>
                <option value="1">Retirada</option>
            </select><br><br>

            Valor: <br>
            <input type="text" name="valor" pattern="[0-9.,]{1,}"><br><br>

            <button> Adicionar</button>
        </form>
    </body>
</html>