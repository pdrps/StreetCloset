<?php
    include("conexao.php");

    $comando = $pdo -> prepare("SELECT nome FROM usuario WHERE id_usuario = :id_usuario");
    $comando->bindValue("id_usuario", $_SESSION["id_usuario"]);
    $comando->execute();

    if($comando->rowCount() >= 1)
    {
    $informacoes_usuario = $comando->fetch();
    }else
    {
    echo("Não há usuarios conectados.");
    }

    unset ($comando);
    unset($pdo)
?>