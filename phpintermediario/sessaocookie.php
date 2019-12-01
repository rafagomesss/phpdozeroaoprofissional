<?php
//Setando sessão
session_start();

$_SESSION['teste'] = 'Rafael Gomes';

echo 'Sessão foi feita...';
echo 'Nome da sessão é: ' . $_SESSION['teste'];

echo '<hr>';

// Setando cookie

setcookie('meuteste', 'Fulano de tal', time() + 3600);

echo 'Meu cookie é: ' . $_COOKIE['meuteste'];
