<?php 
    session_start();
    include("conexao.php");

    $id_usuario = $_SESSION['id_usuario'];
    $imagem_usuario = $_POST["imagem_usuario"];
    
    $imagem_usuario = $_FILES['imagem_usuario'];
    $extensao = $imagem_usuario['type'];
    $conteudo = file_get_contents($imagem_usuario['tmp_name']);
    $base64 = "data:".$extensao.";base64,".base64_encode($conteudo);
  
    $comando = $pdo -> prepare("UPDATE usuario set imagem_usuario = :conteudo WHERE id_usuario = $id_usuario");
    $comando->bindValue(":conteudo",$base64);
       
    $comando->execute();

    header("location: perfil_usuario.php");
    ?>














