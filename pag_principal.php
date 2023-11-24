<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <title>Tela Principal</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">


<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background-color: black;">

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

      <li class="nav-item active">
        <img src="PNGStreetCloset.png" width="120px">
      </li>

      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar por peças" aria-label="Procure" size="60px" id="pesquisar">
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

  <main>

  
  
                    
    <div class="album py-5 bg-black">
      <div class="container">
        
        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 g-5">
        <?php 
        include("conexao.php");
        include("listar_produtos.php");
         if (!empty($lista_produtos)) {
                    foreach($lista_produtos as $linha) { ?>
          <div class="col">
          
            <div class="card shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="auto" height="370px" role="img" src="<?php echo $linha['imagem_produto']; ?>" preserveAspectRatio="xMidYMid slice" focusable="false"></img>
              <div class="card-body"  style="height:210px;">
                <p class="card-text" style="font-size: 23px; text-align: center"><?php echo $linha['nome'];?></p>
                <p class="card-text" style="font-size: 23px; text-align: center"> 𐤏 R$<?php echo $linha['preco'];?>  𐤏</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                   <a href="pag_produto.php?codigo=<?php echo $linha['id_produto'] ?>"><button type="button" class="btn btn-sm btn-outline-secondary" style="background-color: #260352; color: white; margin-left:95px; height: 40px; width: 200px">Ver produto</button> </a>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <?php 
            }
              } 
          ?>
          
      </div>

      
    </div>
    

  </main>

  <footer class="text-muted py-5">
    <div class="container">
      <p class="float-end mb-1">
        <a href="#">Back to top</a>
      </p>
    </div>
  </footer>


  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
      if (event.key === "Enter") {
        searchData();
      }
    });

    function searchData() {
      window.location = 'pag_principal.php?search=' + search.value;
    }

    <?php
    include("conexao.php")?>
  </script>

</body>

</html>