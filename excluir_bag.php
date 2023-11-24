<?php
session_start();
include("conexao.php");

$id_produto = $_GET['id_produto'];

$comando =$pdo->prepare("DELETE FROM bag WHERE id_produto = :id_produto");

$comando->bindValue(':id_produto',$id_produto);
    
    //executa a consulta no banco de dados.
    $comando->execute();

    header("location:pag_bag.php");

    //Fecha declaração e conexão.
    unset($comando);
    unset($pdo);
    
?>