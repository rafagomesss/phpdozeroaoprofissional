<?php

try {
    $dsn = 'mysql:dbname=blog;host=database';
    $dbuser = 'root';
    $dbpass = 'root';
    $pdo = new \PDO($dsn, $dbuser, $dbpass);
} catch (\PDOException $e) {
    die($e->getMessage());
}

/**
 * ? 1. Calcular a quantidade total de páginas
 * ? 2. definir o $p
 * ? 3. fazer a query com LIMIT
 */

$qtde_por_pagina = 10;
$total = 0;

$sql = "SELECT COUNT(*) AS c FROM posts";
$sql = $pdo->query($sql);
$sql = $sql->fetch();
$total = $sql['c'];
$paginas = $total / $qtde_por_pagina;

$pg = '1';

if (isset($_GET['p']) && !empty($_GET['p'])) {
    $pg = addslashes($_GET['p']);
}

$p = ($pg - 1) * $qtde_por_pagina;

$sql = "SELECT * FROM posts LIMIT $p, $qtde_por_pagina";
$sql = $pdo->query($sql);

if ($sql->rowCount() > 0) {
    foreach ($sql->fetchAll() as $item) {
        echo $item['id'] . ' - ' . $item['titulo'] . '<br>';
    }
}

echo '<hr>';

for ($q = 0; $q < $paginas; $q++) {
    echo '<a href="./?p=' . ($q + 1) . '">[' . ($q + 1) . ']</a>';
}
echo 'TOTAL DE PÁGINAS: ' . $paginas;
