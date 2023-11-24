<?php
include("conexao.php");


session_start();

// Verifique se o usuário está logado, se não, redirecione-o para uma página de login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.html");
    exit; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexão Banco de Dados</title>
</head>

<body style="background-color: black;">

<?php
    include("listar_usuario_conectado.php");

    echo '<p <nav class="navbar" style="background-color:#260352; color: white"; >Bem Vindo '.$informacoes_usuario['nome'].'! </nav>
    
    <a href="pag_listar_usuario_adm.php">
        <button class="btn btn-outline-success text-white" style="color: white; background-color: #260352; border-color: black;" type="submit">VOLTAR</button>
    </a>'
?>
    <!--O action determina para onde será enviado os dados do formulário.-->
    <form action="editar_usuario.php?codigo=<?php echo $_GET['codigo'];?>" method="POST" enctype="multipart/form-data">
        
        <label style="color: white; ">Nome:</label>
        <br>
        <input placeholder="" type="text" name="nome">
        <br>
        <label style="color: white; ">Email:</label>
        <br>
        <input type="text" name="email">
        <br>
        <label style="color: white; ">Senha:</label>
        <br>
        <input type="password" name="senha">
        <br>
        <input type="file" name="imagem" multiple accept="image/*"> 
        <br>
        <!--Necessário um input do tipo submit.-->
        <input type="submit" value="Atualizar" name="submit">
    </form>
    <br>
    <a href="pag_listar_usuario_adm.php">Voltar</a>
    
</body>
</html>