<?php
    include("conexao.php");

    $comando = $pdo->prepare("SELECT id_usuario, nome, email, adm, imagem_usuario FROM usuario;");

    $comando->execute();
    if($comando->rowCount()>= 1)
    {
        $lista_usuarios = $comando->fetchAll();
    }else{
        echo("Não há usuarios cadastrados.");
    }

    unset ($comando);
    unset ($pdo);
?>