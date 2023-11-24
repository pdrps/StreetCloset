<?php
include("conexao.php");

$id_usuario = $_SESSION['id_usuario'];

$comando = $pdo->prepare("SELECT * FROM bag WHERE id_usuario = $id_usuario");

$comando->execute();

if ($comando->rowCount() >= 1) {
    $lista_bag = $comando->fetchAll();
} else {
    echo "<p style='color: white'> Não há produtos na sua bag :/</p>";
}

unset($comando);
unset($pdo);

?>