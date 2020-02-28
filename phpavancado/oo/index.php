<?php

# Definindo uma classe
class Usuario
{
    #Definindo métodos
    public function alterarNome()
    {
    }

    private function validarInformacoes()
    {
    }

    public function alterarSenha($senhaAtual, $novaSenha)
    {
        // Conectar ao banco de dados
        // Verificar se a senha atual está correta
        // Trocar a senha
    }

    protected function fazerAlgumaCoisa($parametroA, $parametroB)
    {
        return $parametroA . ' - ' . $parametroB;
    }
}

# Instanciando uma classe
class Cachorro
{
    public $nome;
    private $idade;
    public function latir()
    {
        echo 'Au au!';
    }
}

$cachorro = new Cachorro();
$cachorro->latir();
echo '<br/>';
$dudu = new Cachorro();
$dudu->latir();
echo '<br/>';
$cachorro->nome = 'Teste';

echo $cachorro->nome;
echo '<br/>';
echo '<br/>';


# Acessando propriedades geter and setter

class Post
{
    private $titulo;
    private $data;
    private $corpo;
    private $comentarios;
    private $qtComentarios;

    public function __construct($titulo, $corpo)
    {
        $this->setTitulo($titulo);
        $this->setCorpo($corpo);
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        if (is_string($titulo)) {
            $this->titulo = $titulo;
        }
    }

    public function getCorpo()
    {
        return $this->corpo;
    }

    public function setCorpo($corpo)
    {
        if (is_string($corpo)) {
            $this->corpo = $corpo;
        }
    }

    public function addComentario($msg)
    {
        $this->comentarios[] = $msg;
        $this->contarComentarios();
    }

    public function getQuantosComentarios()
    {
        return $this->qtComentarios;
    }

    private function contarComentarios()
    {
        $this->qtComentarios = count($this->comentarios);
    }
}

$post = new Post("Título da postagem", "Corpo da minha postagem");

echo 'Título: ' . $post->getTitulo() . '<br>';
echo 'Corpo: ' . $post->getCorpo() . '<br>';

$post->addComentario('Teste');
$post->addComentario('Teste 2');
$post->addComentario('Teste 3');

echo 'Quantidade de comentários: ' . $post->getQuantosComentarios();
