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
  <title>Pagina do Cartão</title>

<body style="background-color: black; overflow-x: hidden;">

  <nav class="navbar-expand-lg container-fluid" style="background-color: #260352;">

    <ul class="navbar">

  <div class="row" style="position:absolute; left:46%;">
    <a href="pag_principal.php">
      <li class="nav-item active">
        <img src="PNGStreetCloset.png" width="120px">
      </li>
    </a>
  </div>  

      
     <?php
       include("listar_usuario_conectado.php");
           echo '<p <nav class="navbar px-5" style="background-color:#260352; color: white top:8%; left: 0%"; font-size:20px; ><a href="perfil_usuario.php" style="text-decoration: none; color: white;">Bem Vindo ' . $informacoes_usuario['nome'] . '! </a> </nav></p>';
       ?> 

   <?php
    include("listar_usuario_conectado.php");

        echo '
        <a href="perfil_usuario.php">
            <button class="btn btn-outline-success text-white" style="color: white; background-color: #260352; border-color: black; position: absolute; top:2%; left: 90%" type="submit">VOLTAR</button>
        </a>'
        ?>


<div class="container" style="position: absolute; top: 15%; left: 9%">
            
            <div class="my-3 card shadow-sm">
            
                <form action="inserir_cartao.php" method="POST" class="row needs-validation" novalidate=""
                    autocomplete="off">
                    <div class="text-muted card-body p-5">
                        <div class="fw-bold d-flex align-items-center justify-content-between">
                            <div class="p-2 card shadow-lg "
                                style="width: 300px; height: 160px; background-image: linear-gradient(50deg, #260352 30%, yellow 100%);">
                                <img src="https://www.freepnglogos.com/uploads/visa-inc-logo-png-11.png" width="60px"
                                    class="" alt="" style="margin-bottom: 30px">
                                
                                <p>xxxx xxxx xxxx xxxx</p>
                                <div row>
                                    <span class="m-2" style="font-size: x-small;">validade </span> <span class="m-3"
                                        style="font-size: x-small;">cvv</span>

                                </div>
                            </div>
                            <button style="background-color: #260352;" type="button" class="col-7 m-5 btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Adicionar cartão
                            </button>
                        </div>

                        <?php 
                        include("conexao.php");
                            $id_usuario = $_SESSION['id_usuario'];

                            $query_usuario = "SELECT * FROM cartao WHERE id_usuario = :id_usuario";  
                            $result_usuario = $pdo->prepare($query_usuario);
                            $result_usuario->bindParam(':id_usuario', $_SESSION['id_usuario']);

                            $result_usuario->execute();
                            if(($result_usuario) AND ($result_usuario->rowCount() != 0 )){
                                $listaItens = $result_usuario;
                            }

                            if(($result_usuario) AND ($result_usuario->rowCount() != 0 )){ ?>
                                <?php
                                echo '<h3 class="pt-5">Seus cartões:</h3>';
                                echo '<div class="d-flex ">';
                                if (!empty($listaItens)) {
                                    foreach($listaItens as $linha) { 
                            ?>

<div class="text-muted card-body  p-3">
                        <div class="fw-bold d-flex align-items-center justify-content-between">
                            <div class="d-none d-md-block p-2 card shadow-lg "
                                style="width: 300px; height: 160px; background-image: linear-gradient(50deg, #260352 50%, yellow 100%);">
                                
                                <img src="https://www.freepnglogos.com/uploads/visa-inc-logo-png-11.png" width="60px"
                                    class="" alt="" style="margin-bottom: 30px">
                                    <a style="margin-left:39%;" href="excluir_cartao.php?id_cartao=<?php echo $linha['id_cartao'];?>">
                                        <button type="button"  class=" btn btn-outline" data-bs-toggle="tooltip" data-bs-placement="top"  title="Excluir cartão">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="danger bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </button>
                                    </a>
                                <p class="m-1"><?php echo $linha['nome_titular'];?></p>
                                <p class="m-1"><?php echo $linha['numero_cartao'];?></p>
                                <div row>
                                <p> <span class="m-1" style="font-size: x-small;"><?php echo $linha['data_validade']?> </span> <span class="px-3"
                                        style="font-size: x-small;"><?php echo $linha['cvv'];?></p></span>      
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }} echo '</div>'; }  ?>

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cartão de crédito/débido</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body row">
                                        <form action="inserir_cartao.php" method="POST" class="">
                                            <!-- <form action="base.html" method="POST" class="row needs-validation" > -->
                                            <div class="col">

                                                <div class="mt-3">
                                                    <label for="" class="form-label fs-5">Titular do cartao</label>
                                                    <input type="text" class="form-control" name="nome_titular" id="titular"
                                                        aria-describedby="helpId" placeholder="" required autofocus>
                                                    <div class="invalid-feedback">
                                                        Preencha com o mesmo nome impresso no cartão.
                                                    </div>

                                                </div>
                                                </select>
                                                <div class=" mt-3">
                                                    <label for="" class="form-label fs-5">Número do cartão</label>
                                                    <input class=" form-control" type="number" name="numero_cartao"
                                                        id="numero_cartao" placeholder="" required autofocus>
                                                    <div class="invalid-feedback">
                                                        Este campo é obrigatório.
                                                    </div>

                                                </div>
                                                <div class=" mt-3">
                                                    <label for="" class="form-label fs-5">Validade</label>
                                                    <input class=" form-control" type="date" name="data_validade"
                                                        id="validade" placeholder="MM/AAAA" required>
                                                    <div class="invalid-feedback">
                                                        Este campo é obrigatório.
                                                    </div>

                                                </div>
                                                <div class="mt-3">
                                                    <label for="" class="form-label fs-5">CVV</label>
                                                    <input class="form-control" type="number" name="cvv" id="cvv" 
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Este campo é obrigatório.
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fechar</button>
                                                <input type="submit" name="submit"
                                                    class="btn btn-primary ms-auto justify-content-center"
                                                    value="Salvar">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </main>

        </div>
      </div>
    </div>

  </footer>


    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
        crossorigin="anonymous"></script>
    <script src="/assets/js/login.js"></script>
    <script>
            var search = document.getElementById('pesquisar');
    
            search.addEventListener("keydown", function(event){
                if (event.key === "Enter")
                {
                    searchData();
                }
            });
    
            function searchData()
            {
                window.location = 'categoria.php?search='+search.value;
            }
        </script>

</body>

</html>
