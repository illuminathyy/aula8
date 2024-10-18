<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrando livros</title>
</head>
<body>
<?php

$servidor = 'localhost';
$banco = 'biblioteca';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$codigoSQL = 'SELECT * FROM `livro`';

$comando = $conexao->prepare($codigoSQL);
$resultado = $comando->execute();

if($resultado) {
    echo "Mostrando resultado:<br>";

    while($linha = $comando->fetch()) {
        echo $linha['titulo'];
        echo "<br>";
        echo $linha['idioma'];
        echo "<br>";
        echo $linha['quantidade'];
        echo "<br>";
        echo $linha['editora'];
        echo "<br>";
        echo $linha['data'];
        echo "<br>";
        echo $linha['isbn'];
        echo "<br>";
        $id = $linha['id'];
        echo "<a href='apagalivros.php?id=$id'>Apagar</a><br>";
    }
} else {
    echo "Erro no comando SQL";
}
?>
</body>
</html>
