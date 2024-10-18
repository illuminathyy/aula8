<?php

$servidor = 'localhost';
$banco = 'loja';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$codigoSQL = "INSERT INTO `produto` (`id`, `nome`, `descricao`,`url`,`preco`) VALUES (NULL, :nm, :dsc,:url ,:pc)";

try {
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('nm' => $_GET['nome'], 'dsc' => $_GET['descricao'],'url' => $_GET['url'],'pc' => $_GET['preco'], ));

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