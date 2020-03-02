<?php

include_once 'contato.class.php';
$contato = new Contato();

if (filter_has_var(INPUT_POST, 'id') && !empty(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING))) {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

    $contato->editar($nome, $id);
}
header('Location: index.php');
