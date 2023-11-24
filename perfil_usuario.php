<?php
session_start();
include("conexao.php");
// Verifique se o usuário está logado, se não, redirecione-o para uma página de login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: pag_login.html");
  exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sidebars/">
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

  <script src="sidebars.js"></script>
  <title>Pagina de Perfil</title>

<body style="background-color: black; overflow-x: hidden;">

  <nav class="navbar-expand-lg container-fluid" style="background-color: #260352;">

    <ul class="navbar">

    <a href="pag_principal.php">
      <li class="nav-item active">
        <img src="PNGStreetCloset.png" width="120px">
      </li>
  </a>

      <form class="d-flex" role="search">
        <input class="form-control me-2" type="busca" placeholder="Buscar por peças" aria-label="Procure" size="60px">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
     <?php
       include("listar_usuario_conectado.php");
           echo '<p <nav class="navbar px-5" style="background-color:#260352; color: white"; font-size:20px; ><a href="perfil_usuario.php" style="text-decoration: none; color: white;">Bem Vindo ' . $informacoes_usuario['nome'] . '! </a> </nav></p>';
        ?> 


      <!-- <li class="nav-item" style="margin-right: 50px ;">
        <a class="nav-link" href="pag_login.html" style="color: white;">Olá</a>
        <h1 style="color: white; font-size: 15px;">ou</h1>
      <a class="nav-link" href="pag_cadastro.html" style="color: white">Usuário</a> -->

        </div>
    </ul>
  </nav>

  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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


  <!-- Custom styles for this template -->
  <link href="sidebars.css" rel="stylesheet">
  </head>

  <main class="d-flex flex-nowrap">
    <div class="d-flex flex-column flex-shrink-0 bg-light" style="width: 4.5rem;">
      <a href="pag_principal.php" class="d-block p-3 link-dark text-decoration-none" title="StreetCloset" data-bs-toggle="tooltip" data-bs-placement="right">
        <img class="bi pe-none" width="40" height="32" src="PNGStreetCloset.png">
        <use xlink:href="#bootstrap" /></img>
        <span class="visually-hidden">StreetCloset</span>
      </a>

      <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
        <li class="nav-item">
          <a href="pag_cartao.php" class="nav-link py-3 border-bottom rounded-0" title="Carteira" data-bs-toggle="tooltip" data-bs-placement="right">
            <img class="bi pe-none" width="24" height="24" role="img" src="carteira.png" aria-label="BAG">
            <use xlink:href="#home" /></img>
          </a>
        </li>
        <li>
          <a href="pag_bag.php" class="nav-link py-3 border-bottom rounded-0" title="BAG" data-bs-toggle="tooltip" data-bs-placement="right">
            <img class="bi pe-none" width="24" height="24" role="img" src="bag.png" aria-label="BAG">
            <use xlink:href="#speedometer2" /></img>
          </a>
        </li>
        <li>
        </li>
      </ul>
    </div>



<?php include("conexao.php");
           $id_usuario = $_SESSION['id_usuario'];
             $comando = $pdo->prepare("SELECT * FROM usuario WHERE id_usuario = $id_usuario"); 
             $comando->execute();
           if($comando->rowCount()>= 1)
       
             $lista_usuarios = $comando->fetch(PDO::FETCH_ASSOC);?>
    <form action="inserir_img_perfil.php" method="POST" enctype="multipart/form-data">
      <div class="container">
        <div class="row mb-2">
          <div class="col-md-3 col-lg-3 col-xl-3 text-center">
            <div class="foto-perfil mx-auto">
              <img alt="" src="" class="foto">
              <div class="trocar-imagem">
                <i class="fal fa-2x fas icon-camera upload-button"></i>
                  
                  <input class="arquivo" id="imagem" type="file" name="imagem_usuario" multiple accept="image/*" style="position: absolute; left:11%; top:52%; width: 125px; background-color: #260352; border-color: black;">
                  <img src="<?php echo $lista_usuarios['imagem_usuario']; ?>" style="width:150px; heigt=auto; position: absolute; left:15%; top:17%;">
              </div>
              </div>
              </div>
          
          <input class="btn btn-danger" type="submit" value="salvar" style="position: absolute; left:21%; top:51%; width: 100px; background-color: #260352; border-color: black;">
          <a href="sair.php" style="position:absolute;top:150px;left:1300px;">
          
            <button type="button" class="btn btn-danger">Sair</button>
          </a>

    </form>
    
    <?php
       include("listar_usuario_conectado.php");
       include("listar_sobrenome_usuario_conectado.php");
           echo '<p <a style="color: white; position:absolute;top:190px;left:430px; font-size:35px" >' . $informacoes_usuario['nome'] .' ' . $sobrenome_usuario['sobrenome'] .' </a></p>';
          // echo '<p <a style="color: white; position:absolute;top:190px;left:430px; font-size:35px" >' . $sobrenome_usuario['sobrenome'] .' </a></p>';
    ?> 
      <?php
       //include("listar_sobrenome_usuario_conectado.php");
       //echo '<p <a style="color: white; position:absolute;top:190px;left:430px; font-size:35px" >' . $informacoes_usuario['sobrenome'] .' </a></p>';
      ?> 
    </div>
    </div>

    </div>
    <div class="b-example b-example-vr"></div>

<?php 
           include("conexao.php");
           $id_usuario = $_SESSION['id_usuario'];
             $comando = $pdo->prepare("SELECT * FROM usuario WHERE id_usuario = $id_usuario"); 
             $comando->execute();
           if($comando->rowCount()>= 1)
       
             $lista_usuarios = $comando->fetchAll();
          
               if(!empty($lista_usuarios)) {
                 foreach ($lista_usuarios as $linha){ 
    ?>

<br>
<br>
<br>
<br>
<br>
<br>
    <div class="row" style="position:absolute;top:70%;left:8%;">
      <div class="col-md-6 col-xs-12" style="color: white;">
        <label>EMAIL:</label>
      <div class="form-control" type="number" name="email" style=" width:600px; height:30px"><?php echo $linha['email'] ?></div>
      </div>
      
      <div class="col-md-6 col-xs-12" style="color: white;">
        <label>TELEFONE:</label>
        <div class="form-control" type="number" name="telefone" style=" width:600px; height:30px;"><?php echo $linha['telefone'] ?></div>
      </div>

      <div class="row" style="position:absolute;top:70px;">
      <div class="col-md-6 col-xs-12" style="color: white;">
          <label>CPF:</label>
          <div class="form-control" type="number" name="cpf" style=" width:600px; height:30px;"><?php echo $linha['cpf'] ?></div>
        </div>

      
      <div class="row" style="position:absolute;top:200px;">
      <div class="col-md-6 col-xs-12" style="color: white;">
        <label>RUA:</label>
        <div class="form-control" type="text" name="rua" style=" width:600px; height:30px;"><?php echo $linha['rua'] ?></div>
      </div>
      <div class="col-md-6 col-xs-12" style="color: white;">
        <label>COMPLEMENTO:</label>
        <div class="form-control" type="text" name="complemento" style=" width:600px; height:30px;"><?php echo $linha['complemento'] ?></div>  
      </div>
      </div>


      <div class="row" style="position:absolute;top:270px;">
      <div class="col-md-6 col-xs-12" style="color: white;">
        <label>BAIRRO:</label>
        <div class="form-control" type="text" name="bairro" style=" width:600px; height:30px;"><?php echo $linha['bairro'] ?></div>
      </div>
      <div class="col-md-5 col-xs-12" style="color: white;">
        <label> NÚMERO</label>
        <div class="form-control" type="number" name="numero" style=" width:200px; height:30px;"><?php echo $linha['numero'] ?></div>
      </div>
      </div>
  </main>
  </div>
  
  <?php }}?>
</body>

</html>