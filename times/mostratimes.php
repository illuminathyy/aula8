
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrando times</title>
</head>
<body>
<?php
$servidor = 'localhost';
$banco = 'times';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$comandoSQL = 'SELECT * FROM `quetimeteu`';

$comando = $conexao->prepare($comandoSQL);
$resultado = $comando->execute();

if($resultado) {
    echo "Mostrando resultado:<br>";
    while($linha = $comando->fetch()) {
	echo $linha['nome'];
	$id = $linha['id'];
	echo "<a href='apagatimes.php?id=$id'>Apagar</a><br>";
    }
} else {
    echo "Erro no comando SQL";
}
    ?>

</body>
</html>  