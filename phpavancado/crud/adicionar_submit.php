<?php

include_once 'contato.class.php';
$contato = new Contato();

if (filter_has_var(INPUT_POST, 'email') && !empty(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING))) {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

    $contato->adicionar($email, $nome);
}
header('Location: index.php');
