<?php
$dataAtual = date('d/m/Y \à\s H:i:s');

echo $dataAtual;

$dataProxima = date('d/m/Y', strtotime('+10 days'));

echo '<br>' . $dataProxima;