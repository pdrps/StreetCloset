<?php
    session_start();
    include("conexao.php");

    $id_usuario = $_POST['id_usuario'];
    $total = $_POST['total'];
    
    

$query_bag = "INSERT INTO compras(id_usuario, total)VALUES(:id_usuario, :total); DELETE FROM bag WHERE id_usuario = :id_usuario";

$comando = $pdo -> prepare($query_bag);
$comando->bindValue(":id_usuario",$id_usuario);
$comando->bindValue(":total",$total);
$comando->execute();

header("location: pag_principal.php");
unset($comando);
unset($pdo);

?>