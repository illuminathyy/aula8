<?php

$servidor = 'localhost';
$banco = 'times';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$codigoSQL = "INSERT INTO `quetimeteu` (`id`, `nome`, `pontos`) VALUES (NULL, :nm, :pts)";

try {
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('nm' => $_GET['nome'], 'pts' => $_GET['pontos']));

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