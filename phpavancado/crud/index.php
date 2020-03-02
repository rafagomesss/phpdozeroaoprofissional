<?php

require_once 'contato.class.php';

$contato = new Contato();
?>

<h1>Contatos</h1>
<a href="adicionar.php">[ ADICIONAR NOVO CONTATO ]</a>
<br>
<br>
<table border="1" width=500>
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>E-MAIL</th>
            <th>AÇÕES</th>
        </tr>
    </thead>
    <tbody>
        <?php $lista = $contato->getAll(); ?>
        <?php
        if (count($lista) > 0) : ?>
            <?php foreach ($lista as $contato) : ?>
                <tr>
                    <td><?= $contato['id']; ?></td>
                    <td><?= $contato['nome']; ?></td>
                    <td><?= $contato['email']; ?></td>
                    <td>
                        <a href="editar.php?id=<?= $contato['id']; ?>">[ EDITAR ]</a>
                        <a href="excluir.php?id=<?= $contato['id']; ?>">[ EXCLUIR ]</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="4" align="center">Nenhum registro encontrado!</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
