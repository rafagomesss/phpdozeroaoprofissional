<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://www.checkitout.com.br/wb/pingpong');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'nome=Gomes&idade=30&sexo=masculino');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resposta = curl_exec($ch);

curl_close($ch);

echo '<pre>' . print_r($resposta, 1) . '</pre>';exit;