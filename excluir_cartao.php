<?php
session_start();
include("conexao.php");

$id_cartao = $_GET['id_cartao'];

$comando =$pdo->prepare("DELETE FROM cartao WHERE id_cartao = :id_cartao");

$comando->bindValue(':id_cartao',$id_cartao);
    
    //executa a consulta no banco de dados.
    $comando->execute();

    //redireciona para a pagina informada.
    header("location:pag_cartao.php");

    //Fecha declaração e conexão.
    unset($comando);
    unset($pdo);
    
?>