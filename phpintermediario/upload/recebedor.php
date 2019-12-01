<?php
$arquivo = $_FILES['arquivo'];

if (isset($arquivo['tmp_name']) && empty(isset($arquivo['tmp_name'])) === false) {
    try {
        $nomeDoArquivo = md5(time() . rand(0,99)) . '.png';
        move_uploaded_file($arquivo['tmp_name'], __DIR__ . '/arquivos/' . $nomeDoArquivo);
        echo 'Arquivo enviado com sucesso!';
    } catch (Exception $e) {
        echo 'Erro: ' .  $e->getMessage();
    }
}
?>