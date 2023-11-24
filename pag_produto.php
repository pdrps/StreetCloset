<?php
session_start();
include("conexao.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Tela do Produto</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">


    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background-color: black; overflow-x: hidden;">


    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;

        }
    }

    .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }
    </style>


    <nav class="navbar-expand-lg container-fluid" style="background-color: #260352;">

        <ul class="navbar">

            <a href="pag_principal.php">
                <li class="nav-item active">
                    <img src="PNGStreetCloset.png" width="120px">
                </li>
            </a>

            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar por peças" aria-label="Procure"
                    size="60px" id="pesquisar">
                <button class="btn btn-outline-success" type="submit" onclick="searchData()">Buscar</button>
            </form>

            <?php
      if (!isset($_SESSION["id_usuario"])) {

        echo '<p <nav class="navbar px-5" style="background-color:#260352; color: white; font-size:20px"> <a href="pag_login.html" <button class="btn btn-outline-success text-white" style="color: white; background-color: #260352; border-color: yellow;" type="submit">ENTRE</button></a> </p> <p <nav class="navbar px-5" style="background-color:#260352; color: white; font-size:18px;"> Ou </p> <p <nav class="navbar px-5" style="background-color:#260352; color: white; font-size:20px;"><a href="pag_cadastro.html" <button class="btn btn-outline-success text-white" style="color: white; background-color: #260352; border-color: yellow;" type="submit"> CADASTRE-SE </button></a></p> </nav> ';
    
      } else {
        if ($_SESSION['adm'] == 1) {

          echo '
        <div class="row justify-content-center align-item-center" style="color: white;">
        Você é Administrador!
        </div>';

          echo '
        <div class="row justify-content-center align-item-center">
        <div class="col-md-auto" style="color: white;">
            <a href="pag_principal_adm.php">
                <button class="btn btn-outline-success text-white" style="color: white; background-color: #260352; border-color: black;" type="submit">Funções do administrador</button>
            </a>
            </div>
        </div>
        ';
          include("listar_usuario_conectado.php");
          echo '<p <nav class="navbar px-5" style="background-color:#260352; color: white"; font-size:20px; ><a href="perfil_usuario.php" style="text-decoration: none; color: white;">Bem Vindo ' . $informacoes_usuario['nome'] . '! </a> </nav></p>';
        } else {

          include("listar_usuario_conectado.php");
          echo '<p <nav class="navbar px-5" style="background-color:#260352; color: white"; font-size:20px; ><a style="text-decoration:none; color:white;" href="perfil_usuario.php"> Bem Vindo ' . $informacoes_usuario['nome'] . '! </a> </nav></p>';
        }
      }

      ?>
            <?php
       if (!empty($_GET['search'])) {
       $data = $_GET['search'];
         $comando = $pdo->prepare("SELECT * FROM produto WHERE nome LIKE '%$data%' or categoria LIKE '%$data%' or marca LIKE '%$data%'");

        $comando->execute();

        if ($comando->rowCount() >= 1) {
           $lista_produtos = $comando->fetchAll();
         } else {
           include("listar_produtos.php");
         }
       }
      ?>


            <?php 
 include("conexao.php");
           $id_produto = $_GET['codigo'];
            $comando = $pdo->prepare("SELECT * FROM produto WHERE id_produto = $id_produto");

            $comando->execute();
            if($comando->rowCount()>= 1)
            {
                $lista_produtos = $comando->fetchAll();
                if(!empty($lista_produtos)) {
                    foreach ($lista_produtos as $linha){ 
    ?>



<form action="inserir_bag.php" method="POST">
            <div class="row" style="background-color: white; width: 100%; height: 2px;"></div>
            <br>
            <br>
            <div class="container-fluid ms-4">

              

                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        
                        <input class="d-none" name="id_usuario" type="text" value="<?php echo $_SESSION['id_usuario'] ?>">
                        <input class="d-none" name="id_produto" type="text" value="<?php echo $linha['id_produto'] ?>">
                        <input class="d-none" name="imagem_produto" type="text" value="<?php echo $linha['imagem_produto'] ?>">
                        <input class="d-none" name="nome" type="text" value="<?php echo $linha['nome'] ?>">
                        <input class="d-none" name="preco" type="text" value="<?php echo $linha['preco'] ?>">
                        <input class="d-none" name="descricao" type="text" value="<?php echo $linha['descricao'] ?>">
                        <input class="d-none" name="tamanho" type="text" value="<?php echo $linha['tamanho'] ?>">
                 
                        <div class="img-container">
                            <img name="imagem_produto" style="width: 400px; heigth: 400px" src="<?php echo $linha['imagem_produto'] ?>">
                        </div>
                        <rect width="100%" height="100%px" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                            dy=".3em"></text>
                        </img>
                    </div>

                    <div class="col-md-8 col-xs-12 px-5">
                        <label style="font-size: 50px; color: white;" name="nome"><?php echo $linha['nome'] ?></label>
                        <br>
                        <br>
                        <h1 style="color: white;"> - <?php echo $linha['marca'] ?> - </h1>
                        <br>
                        <h3 style="color: white ; font-size: 25px;"> <?php echo $linha['descricao'] ?>
                            <br>
                            <br>

                        </h3>
                        <br>
                        <br>
                        <div class="col-md-4 col-xs-12">
                            <label style="color: white; font-size: 30px"> TAMANHO: <?php echo $linha['tamanho'] ?>
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <div class="col-md-7 col-xs-12 data" style="background-color: #260352; height:50px; color: white; font-size: 20px; float: left;
                  text-align: left;
                  padding: 16px 0 17px 0">DATA DO ALUGUEL</div>
                <br>
                <BR>
                <br>
                <div class="row">
                    <div class="aluguel col-md-4 col-xs-12">
                        <h3 style="color: white ; font-size: 15px;">DATA DE RETIRADA: </h3>
                        <input type="date">
                        <BR>
                        <br>
                        <h3 style="color: white ; font-size: 15px;">DATA DE DEVOLUÇÃO: </h3>
                        <input type="date">
                    </div>

                    <div class="aluguel col-md-4 col-xs-12">
                        <h3 style="color: white ; font-size: 15px;"> VALOR </h3>
                        <div class="col-md-4 col-xs-12 data" style="background-color: #260352; height:50px; width: 300px; color: white; font-size: 30px; float: center;
                        text-align: center; padding: 5px 0 10px 0;">R$<?php echo $linha['preco'] ?></div>
                    </div>

                </div>

                <BR>
                <br>
                <br>

            
            <?php
            if(!isset($_SESSION["id_usuario"])) {
                echo'
                <div class="texto" style="color: white; margin-left: 30%; font-size:30px;">Cadastre-se ou faça login para ver mais opções</div>
                ';
            }else{echo'<input type="submit" value="ADICIONAR NA BAG"
                style="width: 500px; height:50px; display: block; margin: 30px auto; background-color: white; ">
            ';   
            }
                ?>
        </form>  


                <?php }}} ?>
                <main>
</body>

</html>