<?php

class Calculadora
{
    private $n;
    public function __construct($numeroInicial)
    {
        $this->n = $numeroInicial;
    }

    public function somar($n1)
    {
        $this->n += $n1;
        return $this;
    }

    public function subtrair($n1)
    {
        $this->n -= $n1;
        return $this;
    }

    public function multiplicar($n1)
    {
        $this->n *= $n1;
        return $this;
    }

    public function dividir($n1)
    {
        $this->n /= $n1;
        return $this;
    }

    public function resultado()
    {
        return $this->n;
    }
}

$calculadora = new Calculadora(10);

$calculadora->somar(2)->subtrair(3)->multiplicar(5)->dividir(2);
$resultado = $calculadora->resultado(); // 22.5
echo 'Resultado é: ' . $resultado;

// echo '2 + 10 = ' . $calculadora->somar(2, 10) . '<br>';
// echo '20 - 16 = ' . $calculadora->subtrair(20, 16) . '<br>';
// echo '9 * 2 = ' . $calculadora->multiplicar(9, 2) . '<br>';
// echo '12 / 2 = ' . $calculadora->dividir(12, 2) . '<br>';
