<?php
    include("conexao.php");

    $nome = $_POST["nome"];
    $tamanho = $_POST["tamanho"];
    $status_produto = $_POST["status_produto"];
    $marca = $_POST["marca"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $categoria = $_POST["categoria"];
    $imagem_produto = $_POST["imagem_produto"];
    
 
    $imagem_produto = $_FILES['imagem_produto'];
    $extensao = $imagem_produto['type'];
    $conteudo = file_get_contents($imagem_produto['tmp_name']);
    $base64 = "data:".$extensao.";base64,".base64_encode($conteudo);

    $comando = $pdo -> prepare("INSERT INTO produto(nome,tamanho,status_produto,marca,descricao,preco,categoria,imagem_produto) VALUES(:nome,:tamanho,:status_produto,:marca,:descricao,:preco,:categoria,:conteudo)");

    //,foto_adm_produto ,:foto_adm_produto
    $comando->bindValue(":nome",$nome); 
    $comando->bindValue(":tamanho",$tamanho); 
    $comando->bindValue(":status_produto",$status_produto); 
    $comando->bindValue(":marca",$marca); 
    $comando->bindValue(":descricao",$descricao);                                     
    $comando->bindValue(":preco",$preco);  
    $comando->bindValue(":categoria",$categoria);


    $comando->bindValue(":conteudo",$base64);
   
    $comando->execute();  


    header("Location:pag_listar_produtos.php");
?>