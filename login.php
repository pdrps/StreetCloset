<?php

    include("conexao.php");
     
    $email = $_POST["email"];
    $set_senha = $_POST["senha"];

    $comando = $pdo-> prepare("SELECT id_usuario, senha, adm FROM usuario WHERE email = :email");

    $comando->bindValue(":email",$email);
    $comando->execute();

 

    if($comando->rowCount() == 1){
        $resultado = $comando->fetch();

        if($resultado['senha'] == MD5($set_senha)){

            header("location:pag_principal.php");

            session_start();
            $_SESSION['id_usuario'] = $resultado['id_usuario'];
            $_SESSION['adm'] = $resultado['adm'];
            $_SESSION['loggedin'] = true; 

        }else{
            echo ("<script>alert('Email ou senha incorretos!');</script>");
        }

    }else{
        echo ("<script>alert('Email ou senha incorretos!');</script>");

    }


    unset($comando);
    unset($pdo);

    ?>
    
