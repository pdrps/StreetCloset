<?php
    include("conexao.php");

    $email = $_POST["email"];
    $senha = MD5($_POST["senha"]);
    $confirme_senha = MD5($_POST["confirme_senha"]);
    
    $comando = $pdo -> prepare("UPDATE usuario set senha = :senha WHERE email = :email");
    
    $comando->bindValue(":email",$email);                                     
    $comando->bindValue(":senha",$senha); 


    

    if($senha == $confirme_senha){
         $comando->execute();
        header("Location:pag_login.html");
    }else{
        echo'<script>alert("Confirme a sua senha corretamente");</script>';
    }

?>
