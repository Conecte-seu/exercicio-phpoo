
<?php

/*
QUESTÃO 1 - O QUE É ENCAPSULAMENTO?

a) Encapsular significa proteger os atributos
de uma classe, controlando seu acesso.

b) Public: acesso de qualquer lugar.
Protected: acesso pela classe e suas filhas.
Private: acesso somente dentro da própria classe.

c) Não é boa prática deixar todos os atributos
public porque qualquer parte do código poderia
modificar os dados sem controle.


QUESTÃO 2 - MÉTODOS GET E SET

a) O get permite consultar um atributo privado
sem acessar diretamente seu conteúdo.

b) O set pode validar um valor antes de armazená-lo.

c) Exemplo: setIdade() verifica se a idade é
maior ou igual a zero antes de salvar.


QUESTÃO 3 - VERDADEIRO OU FALSO

1. Falso: atributo private não pode ser acessado
diretamente fora da classe.

2. Verdadeiro: getters e setters controlam o acesso
aos atributos privados.

3. Verdadeiro: encapsulamento aumenta a segurança
e facilita a manutenção do código.

4. Verdadeiro: podemos ter um getter sem setter,
permitindo consultar sem modificar o atributo.

/*
QUESTÃO 4 - ACESSO A ATRIBUTO PRIVADO
*/

class Produto {
    private $nome;
    private $preco;

    public function __construct($nome, $preco) {
        $this->nome = $nome;
        $this->preco = $preco;
    }

    public function getNome() {
        return $this->nome;
    }
}

$p = new Produto("Teclado", 150.00);
echo "Questão 4 - Produto: " . $p->getNome() . "<br><br>";

/*
QUESTÃO 5 - USO DE VARIÁVEL SEM $this
*/

class AlunoErro {
    private $nome;
    private $nota;

    public function __construct($nome, $nota) {
        $this->nome = $nome;
        $this->nota = $nota;
    }

    public function exibir() {
        echo "Aluno: " . $this->nome .
             " - Nota: " . $this->nota;
    }
}

$a = new AlunoErro("Carlos", 8.5);
echo "Questão 5 - ";
$a->exibir();
echo "<br><br>";

/*
QUESTÃO 6 - SETTER NÃO BLOQUEIA VALOR INVÁLIDO
*/

class Pessoa {
    private $idade;

    public function setIdade($idade) {
        if ($idade < 0) {
            echo "Idade invalida!<br>";
            return;
        }

        $this->idade = $idade;
    }

    public function getIdade() {
        return $this->idade;
    }
}

$pessoa = new Pessoa();
$pessoa->setIdade(-5);

/*
QUESTÃO 7 - INSTANCIAÇÃO SEM NEW

class Carro {
    private $modelo;

    public function __construct($modelo) {
        $this->modelo = $modelo;
    }

    public function getModelo() {
        return $this->modelo;
    }
}

$c = new Carro("Fusca");
echo "Questão 7 - Modelo: " . $c->getModelo() . "<br><br>";


/*
PARTE 3 - EXERCÍCIOS PRÁTICO

QUESTÃO 8 - CLASSE LIVRO
*/

class Livro {
    private $titulo;
    private $autor;
    private $paginas;

    public function __construct($titulo, $autor, $paginas) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->paginas = $paginas;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function getPaginas() {
        return $this->paginas;
    }

    public function setPaginas($paginas) {
        $this->paginas = $paginas;
    }

    public function exibir() {
        echo "Titulo: " . $this->titulo . "<br>";
        echo "Autor: " . $this->autor . "<br>";
        echo "Paginas: " . $this->paginas . "<br><br>";
    }
}

echo "<h3>Questão 8 - Livros</h3>";

$livro1 = new Livro("Dom Casmurro", "Machado de Assis", 256);
$livro2 = new Livro("O Pequeno Principe", "Antoine de Saint-Exupery", 96);

$livro1->exibir();
$livro2->exibir();


/*
QUESTÃO 9 - CONTA BANCÁRIA
*/

class ContaBancaria {
    private $titular;
    private $saldo;

    public function __construct($titular) {
        $this->titular = $titular;
        $this->saldo = 0;
    }

    public function depositar($valor) {
        if ($valor <= 0) {
            echo "Valor invalido para deposito!<br>";
            return;
        }

        $this->saldo += $valor;
    }

    public function sacar($valor) {
        if ($valor <= 0) {
            echo "Valor invalido para saque!<br>";
            return;
        }

        if ($valor > $this->saldo) {
            echo "Saldo insuficiente!<br>";
            return;
        }

        $this->saldo -= $valor;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function getTitular() {
        return $this->titular;
    }
}

echo "<h3>Questão 9 - Conta Bancaria</h3>";

$conta = new ContaBancaria("Carlos");
$conta->depositar(500);
$conta->sacar(200);

echo "Titular: " . $conta->getTitular() . "<br>";
echo "Saldo final: R$ " .
     number_format($conta->getSaldo(), 2, ',', '.') . "<br><br>";


/*
QUESTÃO 10 - ALUNO COM MÉDIA
*/

class Aluno {
    private $nome;
    private $nota1;
    private $nota2;

    public function __construct($nome, $nota1, $nota2) {
        $this->nome = $nome;
        $this->setNota1($nota1);
        $this->setNota2($nota2);
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNota1() {
        return $this->nota1;
    }

    public function setNota1($nota1) {
        if ($nota1 >= 0 && $nota1 <= 10) {
            $this->nota1 = $nota1;
        }
    }

    public function getNota2() {
        return $this->nota2;
    }

    public function setNota2($nota2) {
        if ($nota2 >= 0 && $nota2 <= 10) {
            $this->nota2 = $nota2;
        }
    }

    public function calcularMedia() {
        return ($this->nota1 + $this->nota2) / 2;
    }

    public function situacao() {
        if ($this->calcularMedia() >= 5) {
            echo "Aprovado";
        } else {
            echo "Reprovado";
        }
    }
}

echo "<h3>Questão 10 - Aluno</h3>";

$aluno = new Aluno("Maria", 8, 7);

echo "Nome: " . $aluno->getNome() . "<br>";
echo "Media: " . $aluno->calcularMedia() . "<br>";
echo "Situacao: ";
$aluno->situacao();
echo "<br><br>";


/*
QUESTÃO 11 - RETÂNGULO
*/

class Retangulo {
    private $largura;
    private $altura;

    public function __construct($largura, $altura) {
        if ($largura <= 0 || $altura <= 0) {
            throw new InvalidArgumentException("Medidas devem ser positivas.");
        }

        $this->largura = $largura;
        $this->altura = $altura;
    }

    public function getLargura() {
        return $this->largura;
    }

    public function setLargura($largura) {
        if ($largura > 0) {
            $this->largura = $largura;
        }
    }

    public function getAltura() {
        return $this->altura;
    }

    public function setAltura($altura) {
        if ($altura > 0) {
            $this->altura = $altura;
        }
    }

    public function calcularArea() {
        return $this->largura * $this->altura;
    }

    public function calcularPerimetro() {
        return 2 * ($this->largura + $this->altura);
    }
}

echo "<h3>Questão 11 - Retangulos</h3>";

$r1 = new Retangulo(5, 10);
$r2 = new Retangulo(8, 6);

echo "Area do primeiro: " . $r1->calcularArea() . "<br>";
echo "Perimetro do primeiro: " . $r1->calcularPerimetro() . "<br>";
echo "Area do segundo: " . $r2->calcularArea() . "<br>";
echo "Perimetro do segundo: " . $r2->calcularPerimetro() . "<br>";

if ($r1->calcularArea() > $r2->calcularArea()) {
    echo "O primeiro retangulo tem maior area.<br><br>";
} elseif ($r1->calcularArea() < $r2->calcularArea()) {
    echo "O segundo retangulo tem maior area.<br><br>";
} else {
    echo "Os dois possuem a mesma area.<br><br>";
}


/*
QUESTÃO 12 - FUNCIONÁRIO
*/

class Funcionario {
    private $nome;
    private $cargo;
    private $salario;

    public function __construct($nome, $cargo, $salario) {
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->salario = $salario;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function getSalario() {
        return $this->salario;
    }

    public function aumentarSalario($percentual) {
        if ($percentual > 0) {
            $this->salario *= (1 + $percentual / 100);
        }
    }

    public function exibir() {
        echo "Nome: " . $this->nome . "<br>";
        echo "Cargo: " . $this->cargo . "<br>";
        echo "Salario: R$ " .
             number_format($this->salario, 2, ',', '.') . "<br><br>";
    }
}

echo "<h3>Questão 12 - Funcionario</h3>";

$funcionario = new Funcionario("Joao", "Programador", 2000);

echo "Antes do aumento:<br>";
$funcionario->exibir();

$funcionario->aumentarSalario(15);

echo "Depois do aumento:<br>";
$funcionario->exibir();


/*
QUESTÃO 13 - TEMPERATURA
*/

class Temperatura {
    private $celsius;

    public function __construct($celsius) {
        $this->celsius = $celsius;
    }

    public function getCelsius() {
        return $this->celsius;
    }

    public function setCelsius($celsius) {
        $this->celsius = $celsius;
    }

    public function paraFahrenheit() {
        return ($this->celsius * 9 / 5) + 32;
    }

    public function paraKelvin() {
        return $this->celsius + 273.15;
    }
}

echo "<h3>Questão 13 - Temperaturas</h3>";

$temperaturas = [0, 100, 37];

foreach ($temperaturas as $valor) {
    $temp = new Temperatura($valor);

    echo $temp->getCelsius() . " Celsius<br>";
    echo $temp->paraFahrenheit() . " Fahrenheit<br>";
    echo $temp->paraKelvin() . " Kelvin<br><br>";
}


/*
QUESTÃO 14 - ESTOQUE
*/

class Estoque {
    private $produtos = [];

    public function adicionarProduto($nome, $quantidade) {
        $this->produtos[] = [
            'nome' => $nome,
            'qtd' => $quantidade
        ];
    }

    public function listarProdutos() {
        foreach ($this->produtos as $produto) {
            echo $produto['nome'] . ": " .
                 $produto['qtd'] . "<br>";
        }
    }

    public function totalItens() {
        $total = 0;

        foreach ($this->produtos as $produto) {
            $total += $produto['qtd'];
        }

        return $total;
    }
}

echo "<h3>Questão 14 - Estoque</h3>";

$estoque = new Estoque();

$estoque->adicionarProduto("Teclado", 10);
$estoque->adicionarProduto("Mouse", 15);
$estoque->adicionarProduto("Monitor", 5);

$estoque->listarProdutos();

echo "Total de itens: " . $estoque->totalItens() . "<br><br>";


/*
QUESTÃO 15 - AGENDA DE CONTATOS
*/

class Contato {
    private $nome;
    private $telefone;

    public function __construct($nome, $telefone) {
        $this->nome = $nome;
        $this->telefone = $telefone;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTelefone() {
        return $this->telefone;
    }
}

class Agenda {
    private $contatos = [];

    public function adicionarContato($nome, $telefone) {
        $contato = new Contato($nome, $telefone);
        $this->contatos[] = $contato;
    }

    public function listar() {
        foreach ($this->contatos as $contato) {
            echo "Nome: " . $contato->getNome() . "<br>";
            echo "Telefone: " . $contato->getTelefone() . "<br><br>";
        }
    }
}

echo "<h3>Questão 15 - Agenda de Contatos</h3>";

$agenda = new Agenda();

$agenda->adicionarContato("Ana", "99999-1111");
$agenda->adicionarContato("Carlos", "99999-2222");
$agenda->adicionarContato("Mariana", "99999-3333");

$agenda->listar();

?>
