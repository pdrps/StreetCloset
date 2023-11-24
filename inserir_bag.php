<?php
    session_start();
    include("conexao.php");

    

    $id_usuario = $_POST['id_usuario'];
    $id_produto = $_POST['id_produto'];
    $preco = $_POST['preco'];
    $imagem_produto = $_POST['imagem_produto'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $tamanho = $_POST['tamanho'];
    

$query_bag = "INSERT INTO bag(id_usuario, id_produto, preco, imagem_produto, nome, descricao, tamanho)VALUES(:id_usuario, :id_produto, :preco, :imagem_produto, :nome, :descricao, :tamanho)";

$comando = $pdo -> prepare($query_bag);
$comando->bindValue(":id_usuario",$id_usuario);
$comando->bindValue(":id_produto",$id_produto);
$comando->bindValue(":preco",$preco);
$comando->bindValue(":imagem_produto",$imagem_produto);
$comando->bindValue(":nome",$nome);
$comando->bindValue(":descricao",$descricao);
$comando->bindValue(":tamanho",$tamanho);
$comando->execute();

header("location: pag_bag.php");
unset($comando);
unset($pdo);

?>