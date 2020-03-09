<?php
try {
    $pdo = new \PDO('mysql:host=database;dbname=projeto_filtrotabela', 'root', 'root');
} catch (\PDOException $e) {
    echo 'ERRO: ' . $e->getMessage();
}

$sexos = [
    '0' => 'Masculino',
    '1' => 'Feminino'
];

if (isset($_POST['sexo']) && $_POST['sexo'] !== '') {
    $sexo = $_POST['sexo'];
    $sql = 'SELECT * FROM usuarios WHERE sexo = :sexo';
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':sexo', $sexo);
    $sql->execute();
} else {
    $sexo = '';
    $sql = 'SELECT * FROM usuarios';
    $sql = $pdo->query($sql);
}
?>

<form method="POST">
    <select name="sexo">
        <option value=""></option>
        <option value="0" <?= $sexo === '0' ? 'selected' : ''; ?>>Masculino</option>
        <option value="1" <?= $sexo === '1' ? 'selected' : ''; ?>>Feminino</option>
    </select>
    <input type="submit" value="Filtrar">
</form>
<table border="1" width="100%">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Idade</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($sql->rowCount() > 0) {
            foreach ($sql->fetchAll() as $usuario) :
        ?>
                <tr>
                    <td><?= $usuario['nome']; ?></td>
                    <td><?= $sexos[$usuario['sexo']]; ?></td>
                    <td><?= $usuario['idade']; ?></td>
                </tr>
        <?php
            endforeach;
        }
        ?>
    </tbody>
</table>
