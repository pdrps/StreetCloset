<?php
    include("conexao.php");

    $id_produto = $_POST["id_produto"];
    $nome = $_POST["nome"];
    $tamanho = $_POST["tamanho"];
    $status_produto = $_POST["status_produto"];
    $marca = $_POST["marca"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $categoria = $_POST["categoria"];
    




    $comando = $pdo->prepare("UPDATE produto SET nome = :nome, tamanho = :tamanho, status_produto = :status_produto, marca = :marca, descricao = :descricao,
     preco = :preco, categoria = :categoria
     WHERE id_produto = :id_produto");

    //,foto_adm_produto ,:foto_adm_produto
    $comando->bindValue(":id_produto",$id_produto); 
    $comando->bindValue(":nome",$nome); 
    $comando->bindValue(":tamanho",$tamanho); 
    $comando->bindValue(":status_produto",$status_produto); 
    $comando->bindValue(":marca",$marca); 
    $comando->bindValue(":descricao",$descricao);                                     
    $comando->bindValue(":preco",$preco);  
    $comando->bindValue(":categoria",$categoria);


   
    $comando->execute();  

    //Fecha declaração e conexão.
    unset($comando);
    unset($pdo);

    header("location:pag_listar_produtos.php");
    
?>