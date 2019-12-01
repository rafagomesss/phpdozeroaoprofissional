<?php

if (isset($_FILES['arquivo'])) {
    $qtdeArquivos = count($_FILES['arquivo']['tmp_name']);
    if ($qtdeArquivos > 0) {
        for ($i = 0; $i < $qtdeArquivos; $i++) {
            $nomeDoArquivo = md5($_FILES['arquivo']['name'][$i].time().rand(0,999)) . '.jpg';
            move_uploaded_file($_FILES['arquivo']['tmp_name'][$i], __DIR__ . '/arquivos/' . $nomeDoArquivo);
        }
    }
}

?>
<form method="POST" enctype="multipart/form-data">
    <label for="file">Arquivo:</label>
    <input type="file" name="arquivo[]" multiple> <br><br>
    <input type="submit" value="Enviar">
</form>