<?php

$servidor = 'localhost';
$banco = 'biblioteca';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$codigoSQL = "INSERT INTO `livro` (`id`, `titulo`, `idioma`,`quantidade`,`editora`, `data`, `isbn`) VALUES (NULL, :tit,:idi ,:qua, :edi, :dat, :isb)";

try {
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('tit' => $_GET['titulo'], 'idi' => $_GET['idioma'],'qua' => $_GET['quantidade'], 'edi' => $_GET['editora'],'dat' => $_GET['data'], 'isb' => $_GET['isbn'],));

    if($resultado) {
	echo "Comando executado!";
    } else {
	echo "Erro ao executar o comando!";
    }
} catch (Exception $e) {
    echo "Erro $e";
}

$conexao = null;

?>