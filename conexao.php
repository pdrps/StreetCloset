<?php
    date_default_timezone_set('America/Sao_Paulo');

    try{
        $pdo = new PDO("mysql:dbname=streetcloset;host=localhost;charset=utf8","root","");
    }
    catch(PDOExeption $erro)
    {
        
        echo("ERRO NA CONEXÃO: <br>".$erro->getMessage());
    }
?>