<?php
$array = [
    'nome' => 'Rafael',
    'idade' => 31,
    'país' => 'Brasil',
    'cidade' => 'Maringá'
];

$array2 = array_keys($array);
$array3 = array_values($array);

echo '<pre>' . print_r($array2, true) . '</pre>';
echo '<pre>' . print_r($array3, true) . '</pre>';

$rest = array_pop($array);
$rest2 = array_shift($array);

echo '<pre>' . print_r($rest, true) . '</pre>';
echo '<pre>' . print_r($rest2, true) . '</pre>';
echo '<pre>' . print_r($array, true) . '</pre>';

$novoArray = [
    'nome' => 'Rafael',
    'idade' => 31,
    'país' => 'Brasil',
    'cidade' => 'Maringá'
];

asort($novoArray);
echo '<pre>' . print_r($novoArray, true) . '</pre>';
echo count($novoArray);

echo '<hr>';

$needle = 'Rafael';
$nomes = [
    'Rafael',
    'Fulano',
    'Ciclano',
    'Beltrano'
];

echo in_array($needle, $nomes)
        ? 'O nome ' . mb_convert_case($needle, MB_CASE_TITLE) . ' foi encontrado!<br>'
        : 'O nome ' . mb_convert_case($needle, MB_CASE_TITLE) . ' <strong>não </strong>foi encontrado!<br>';

