<?php
session_start();
include("conexao.php");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.101.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
        crossorigin="anonymous"></script>
  <title>Carrinho usuario</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/blog/">





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



  <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">

  <link href="blog.css" rel="stylesheet">
</head>

<body>

  <body style="background-color: black; overflow-x: hidden;">
    <nav class="navbar-expand-lg container-fluid" style="background-color: #260352;">

      <ul class="navbar">


      <a href="pag_principal.php">
        <li class="nav-item active">
          <img src="PNGStreetCloset.png" width="120px">
        </li>
      </a>

        <h1 style="color: white; font-size: 50px; margin-right: 8%;">FINALIZAR COMPRA</h1>

        <?php

    echo '
    <a href="pag_bag.php">
        <button class="btn btn-outline-success text-white" style="color: white; background-color: #260352; border-color: black;" type="submit">VOLTAR</button>
    </a>'
    ?>


      </ul>

    </nav>
    </row>

    <div class="cabecalho" style="color: white; margin-left: 35%;  margin-top: 2%; font-size: 40px">
     RESUMO DA COMPRA
    </div>
   

    <table class="table table-hover" style="color: white; font-size: 18px">
  <thead>
    <tr>
      <th scope="col">Nome do produto</th>
      <th scope="col">Tamanho</th>
      <th scope="col">Preco</th>
    </tr>
  </thead>
  <tbody>

<?php
            include("listar_bag.php");
            if(!empty($lista_bag)) {
                foreach ($lista_bag as $linha){ 
                    $id_usuario = $linha['id_usuario'];?>
                <tr>
                    <td> <?php echo $linha['nome']; ?> </td>
                    <td> <?php echo $linha['tamanho']; ?> </td>
                    <td> <?php echo $linha['preco']; ?> </td>

                </tr>
                     
             <?php } 
            }
            ?>
</tbody>
</table>

                <?php 
                include("conexao.php");

                    $id_usuario = $linha['id_usuario'];

                    $sql = $pdo->prepare("SELECT SUM(preco) as total FROM bag WHERE id_usuario = $id_usuario");

                    $sql->execute();



                    $value = $sql->fetchObject();
                    
                    $value->total;
                 ?>

      

      <div class="col-md-4 col-xs-12 data" style="background-color: #260352; height:50px; width: 300px; color: white; font-size: 25px; margin-top: 30px; margin-left: 30px;
               text-align: center; padding: 5px 0 10px 0;">O preço final é de: R$<?php echo $value->total;?>
        </div>

    
    
    <form action="codigo_fecha_compra.php" method="POST">
           <input class="d-none" name="id_usuario" type="text" value="<?php echo $_SESSION['id_usuario'] ?>">
           <input class="d-none" name="total" type="text" value="<?php echo $value->total;?>">
        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 500px; height:50px; display: block; margin: 30px auto; background-color: white; color: black;;">
              FINALIZAR LOCAÇÃO
        </button>
    </form>

</body>
</html>
