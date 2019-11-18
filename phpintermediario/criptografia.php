<?php

$nome = 'Rafael';
$nomeCriptoMD5 = md5($nome);
$nomeCriptoBase64 = base64_encode($nome);

echo 'Nome Original: ' . $nome . '<br>';
echo 'Nome Cripto MD5: ' . $nomeCriptoMD5 . '<br>';
echo 'Nome Cripto Base64: ' . $nomeCriptoBase64 . '<br>';