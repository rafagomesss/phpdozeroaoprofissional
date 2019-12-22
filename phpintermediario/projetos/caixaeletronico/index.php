<?php
session_start();

require_once 'config.php';

if (isset($_SESSION['banco']) && !empty($_SESSION['banco'])) {
    $id = $_SESSION['banco'];

    $sql = $pdo->prepare('SELECT * FROM contas WHERE id = :id');
    $sql->bindValue(':id', $id);
    $sql->execute();

    if ($sql->rowCount() > 0 ) {
        $info = $sql->fetch();
    } else {
        header('Location: login.php');
        exit();
    }
} else {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
    </head>
    <body>
        <h1>Banco XYZ</h1>
        Titular: <?=$info['titular'];?> <br>
        Agencia: <?=$info['agencia'];?> <br>
        Conta: <?= $info['conta'];?> <br>
        Saldo: <?= $info['saldo'];?> <br>
        <a href="sair.php"> Sair </a>

        <hr>
        <h3>Movimentação/Extrato</h3>
        <a href="add-transacao.php">Adicionar Transação</a><br><br>
        <table border='1' width="400">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = $pdo->prepare('SELECT * FROM historico WHERE id_conta = :id_conta');
                    $sql->bindValue(':id_conta', $id);
                    $sql->execute();

                    if ($sql->rowCount() > 0):
                        while($item = $sql->fetch()):
                ?>
                <tr>
                    <td><?= date('d/m/Y H:i', strtotime($item['data_operacao']));?></td>
                    <td><span style="color:<?= $item['tipo'] == '0' ? 'green' : 'red'?>">R$ <?=$item['valor'];?></span></td>
                </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2">Nenhum Registro Econtrado!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </body>
</html>