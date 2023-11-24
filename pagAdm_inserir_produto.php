<?php
session_start();
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
    <title>Pagina ADM Inserir produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<style>
.h1
{
    color:white;
}

.cadastronome
{
    color:white;
}

.botaopagina
{
    color:white;
}
    </style>
<body style="background-color: white;">
    
    <nav class="navbar-expand-lg container-fluid"  style="background-color: #260352;" >
       
        <ul class="navbar">

            <li class="nav-item active">
                <img src="PNGStreetCloset.png" width="120px">
            </li>

            <h1 style="color: white; font-size: 50px;">INSERIR PRODUTOS</h1>
         
            
            
            
        </div>
        </ul>
       
    </nav>
</row>

<div class="container-fluid mx">
    <div class="row mb-2">
        <div class="col-md-6 col-xs-12">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary">Categoria</strong>
              <h3 class="mb-0">Nome do Produto</h3>
              <div class="mb-1 text-muted">Código:</div>
              <p class="card-text mb-auto">Descrição do Produto</p>
              <a href="pag_cadastro_produto.html" class="stretched-link">Cadastrar Produto</a>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img class="bd-placeholder-img" width="200" height="250" img src="icone_camera.png" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/>>
    
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">Categoria</strong>
                <h3 class="mb-0">Nome do Produto</h3>
                <div class="mb-1 text-muted">Código:</div>
                <p class="card-text mb-auto">Descrição do Produto</p>
                <a href="pag_cadastro_produto.html" class="stretched-link">Cadastrar Produto</a>
              </div>
              <div class="col-auto d-none d-lg-block">
                  <img class="bd-placeholder-img" width="200" height="250" img src="icone_camera.png" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/>>
      
              </div>
            </div>
          </div>
      </div>
    </div>
</div>
     


    <?php
    include("listar_usuario_conectado.php");
    echo '<p <nav class="navbar px-5" style="background-color:#260352; color: white"; font-size:20px; >Bem Vindo '.$informacoes_usuario['nome'].'!  </nav></p>';
    ?>

    <div class="listar" style="font-size:30px; margin-left: 45%; ">
    <h3>Listar Produtos:</h3>
    </div>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">id_produto</th>
      <th scope="col">Marca</th>
      <th scope="col">Preço</th>
      <th scope="col">Nome</th>
      <th scope="col">Status Produto</th>
      <th scope="col">Descrição</th>
      <th scope="col">Tamanho</th>
      <th scope="col">Categoria</th>

    </tr>
  </thead>
  <tbody>
  <?php
            include("listar_produtos.php");
            if(!empty($lista_produtos)) {
                foreach ($lista_produtos as $linha){ ?>
                <tr>
                    <td> <?php echo '<img height="40px" width="40px" src="' .$linha['imagem_produto']. '">'; ?> </td>
                    <td> <?php echo $linha['id_produto']; ?> </td>
                    <td> <?php echo $linha['marca']; ?> </td>
                    <td> <?php echo $linha['preco']; ?> </td>
                    <td> <?php echo $linha['nome']; ?> </td>
                    <td> <?php echo $linha['status_produto']; ?> </td>
                    <td> <?php echo $linha['descricao']; ?> </td>
                    <td> <?php echo $linha['tamanho']; ?> </td>
                    <td> <?php echo $linha['categoria']; ?> </td>
                     
             <?php } 
            }
            ?>
  </tbody>
</table>
</body>


</html>
