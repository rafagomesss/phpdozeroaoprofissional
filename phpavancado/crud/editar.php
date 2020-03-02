<?php
include_once 'contato.class.php';
$contato = new Contato();

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $info = $contato->getInfo($id);

    if (empty($info['email'])) {
        header('Location: index.php');
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}
?>
<h2>Editar</h2>

<form action="editar_submit.php" method="POST">
    <input type="hidden" name="id" value="<?= $info['id']; ?>">
    Nome: <br>
    <input type="text" name="nome" value="<?= $info['nome']; ?>"><br><br>

    E-mail: <?= $info['email']; ?> <br><br>
    <input type="submit" value="Salvar">
</form>
