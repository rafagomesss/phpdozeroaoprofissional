<?php
require_once 'config.php';
?>
<a href="adicionar.php">Adicionar Novo Usuário</a>
<div class="container">
    <div class="row">
        <div class="col-8">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = 'SELECT * FROM usuarios';
                    $sql = $pdo->query($sql);
                    if ($sql->rowCount() > 0 ) :
                        foreach($sql->fetchAll() as $usuario) :
                            ?>
                            <tr>
                                <td><?= $usuario['nome']; ?></td>
                                <td><?= $usuario['email']; ?></td>
                                <td>
                                    <a href="editar.php?id=<?= $usuario['id']; ?>">Editar</a>
                                    -
                                    <a href="excluir.php?id=<?= $usuario['id']; ?>">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>