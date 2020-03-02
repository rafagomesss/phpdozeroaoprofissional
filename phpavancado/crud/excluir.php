<?php

include_once 'contato.class.php';
$contato = new Contato();

if (!empty($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $contato->excluir($id);
}

header('Location: index.php');
