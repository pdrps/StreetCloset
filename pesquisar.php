<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "streetcloset";

$conn = $PDO ($servidor, $usuario, $senha, $dbname);

$pesquisar = $_POST ('pesquisar');
$result_produto = "SELECT * FROM produto WHERE nome LIKE '%$pesquisar%'";
$resultado_produto = $PDO($conn, $result_produto);

while($rows_produto = mysqli_fetch_array($resultado_produto)){
    echo "".$rows_produto['nome']."<br>";
}

?>