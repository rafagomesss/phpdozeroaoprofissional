<?php

$pessoas = [
    ['nome' => 'Fulano', 'idade' => 40],
    ['nome' => 'Ciclano', 'idade' => 22],
    ['nome' => 'Beltrano', 'idade' => 38]
];

foreach ($pessoas as $aluno) {
    echo 'Aluno: ' . $aluno['nome'] . ' - Idade: ' . $aluno['idade'] . '<br>';
}

foreach ($pessoas as $indice => $aluno) {
    foreach ($aluno as $key => $value) {
        echo mb_convert_case($key, MB_CASE_TITLE) . ': ' . $aluno[$key] . '<br>';
    }
}