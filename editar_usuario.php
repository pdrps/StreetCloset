<?php
    include("conexao.php");

    $codigo = $_GET['codigo'];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
 
    //comando sql.
    //Insira o comando SQL aqui.
    $comando = $pdo->prepare("UPDATE usuario SET nome = :nome, email = :email WHERE id_usuario = :codigo;");

    //insere valores das variaveis no comando sql.
    $comando->bindValue(':codigo',$codigo);
    $comando->bindValue(':nome',$nome);
    $comando->bindValue(':email',$email);

    //executa a consulta no banco de dados.
    $comando->execute();

    //Fecha declaração e conexão.
    unset($comando);
    unset($pdo);

    header("location:pag_editar_user.php");
    
?>