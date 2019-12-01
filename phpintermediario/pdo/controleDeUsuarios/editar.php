<?php
require_once 'config.php';

if (isset($_GET['id']) && empty($_GET['id']) === false) {
    $id = addslashes($_GET['id']);
}

if (isset($_POST['nome']) && empty($_POST['nome']) === false) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);

    $sql = "UPDATE usuarios SET nome = '$nome', email = '$email' WHERE id = '$id'";
    $pdo->query($sql);

    header('Location: index.php');
}


$sql = "SELECT * FROM usuarios  WHERE id = '$id'";
$sql = $pdo->query($sql);
if ($sql->rowCount() > 0) {
    $dadosUsuario = $sql->fetch();
} else {
    header('Location: index.php');
}

?>

<form method="POST" action="">
    Nome: <br>
    <input type="text" name="nome" value="<?=$dadosUsuario['nome']; ?>"> <br><br>
    E-mail: <br>
    <input type="email" name="email" value="<?=$dadosUsuario['email'];?>"> <br><br>

    <input type="submit" value="Atualizar">
</form>