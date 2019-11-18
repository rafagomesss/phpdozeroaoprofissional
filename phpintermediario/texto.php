<?php

$nome = "Rafael Gomes";

$x = explode(" ", $nome);

echo '<pre>' . print_r($x, true) . '</pre>';

echo '<hr>';

$array = ['Rafael', 'Gomes', 'de', 'Souza'];

$nomeCompleto = implode(' ', $array);

echo '<pre>' . print_r($nomeCompleto, true) . '</pre>';

echo '<hr>';

$number = number_format(34989.12, 2, ',', '.');

echo $number;

echo '<hr>';

$texto = 'O rato roeu a roupa!';
$string = str_replace('roeu', 'comeu', $texto);

echo $string;

echo '<hr>';
echo '<strong>strtolower: </strong>';
echo strtolower('RAFAEL GOMES');
echo '<br>';
echo '<strong>strtoupper: </strong>';
echo strtoupper('rafael gomes');
echo '<br>';

echo '<strong>substr: </strong>';
$texto2 = "Rafael";
$result = substr($texto2, 0, 3);

echo $result;

echo '<br>';
echo '<strong>ucfirst: </strong>';
echo ucfirst('rafael');
echo '<br>';
echo '<strong>ucwords: </strong>';
echo ucwords('rafael gomes de souza');