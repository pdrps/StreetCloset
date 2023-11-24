<?php
session_start();
include("conexao.php");


$nome_titular = $_POST["nome_titular"];
$numero_cartao = $_POST["numero_cartao"];
$cvv = $_POST["cvv"];
$data_validade = $_POST["data_validade"];
$id_usuario = $_SESSION["id_usuario"];

$query_cartao = "INSERT INTO cartao (nome_titular, numero_cartao, cvv, data_validade, id_usuario) 
VALUES (:nome_titular, :numero_cartao, :cvv, :data_validade, :id_usuario)";

$cad_cartao = $pdo -> prepare($query_cartao);
$cad_cartao->bindValue(":nome_titular", $nome_titular);
$cad_cartao->bindValue(":numero_cartao", $numero_cartao);
$cad_cartao->bindValue(":cvv", $cvv);
$cad_cartao->bindValue(":data_validade", $data_validade);
$cad_cartao->bindValue(":id_usuario", $id_usuario);
$cad_cartao->execute();

header("location: pag_cartao.php");

unset($cad_cartao);
unset($pdo);

?>
