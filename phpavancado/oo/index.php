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

echo '<hr>';

/*
# Herança de classes
class Animal
{
    public $nome;
    private $idade;
}

class Cavalo extends Animal
{
    private $quantidade_de_patas;
    private $tipo_de_pelo;
}

class Gato extends Animal
{
    private $quantidade_de_patas;
    private $miado;
}

$cavalo = new Cavalo();
$cavalo->nome = 'Cavalo 1';

echo 'O nome do cavalo é: ' . $cavalo->nome;
*/
echo '<hr>';

# Abstração de classes
abstract class Animal
{
    private $nome;
    private $idade;

    abstract protected function andar();

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }
}

class Cavalo extends Animal
{
    private $quantidade_de_patas;
    private $tipo_de_pelo;

    public function andar()
    {
    }
}

$cavalo = new Cavalo();
$cavalo->setNome('Cavalo Teste');

echo 'O nome do cavalo instanciado é: ' . $cavalo->getNome();
echo '<hr>';

# Interface

interface Animall
{
    public function andar();
}

class Cao implements Animall
{
    public function andar()
    {
        echo 'O cão está andando...';
    }
}

$cao = new Cao();
$cao->andar();
echo '<hr>';

# Polimorfismo

class Mamifero
{
    public function locomover()
    {
        return 'Estou me locomovendo ' . get_class() . '<br>';
    }
}

$mamifero = new Mamifero();
echo $mamifero->locomover();

class Pessoa extends Mamifero
{
    public function locomover()
    {
        return 'Estou me locomovendo ' . get_class() . '<br>';
    }
}

$pessoa = new Pessoa();
echo $pessoa->locomover();
