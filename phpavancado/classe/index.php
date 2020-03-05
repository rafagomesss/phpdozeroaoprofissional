<?php

require 'usuario.php';

$usuario = new Usuario(2);
$usuario->delete();

echo 'Usuário excluído com sucesso!';
// Alterar Usuário
// $usuario = new Usuario(2);
// $usuario->setNome('Fulano');
// $usuario->salvar();

// echo 'Usuário alterado com sucesso!';

// Inserir Usuário
// $usuario->setEmail('teste@teste.com.br');
// $usuario->setSenha('123456');
// $usuario->setNome('Testador');

// $usuario->salvar();

// echo 'Usuario criado com sucesso!';
