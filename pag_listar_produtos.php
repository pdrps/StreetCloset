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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Pagina Listar Produto ADM</title>
</head>

<body style="background-color: white;">
    <?php
    include("listar_usuario_conectado.php");

    echo '<p <nav class="navbar px-5" style="background-color:#260352; color: white"; font-size:20px; >Bem Vindo ' . $informacoes_usuario['nome'] . '!  </nav>
    <a href="pag_principal_adm.php">
        <button class="btn btn-outline-success text-white" style="color: white; background-color: #260352; border-color: black;" type="submit">VOLTAR</button>
    </a>'
    ?>
    <div class="listar" style="font-size:30px; margin-left: 45%;">
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
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>

            </tr>
        </thead>
        <tbody>
            <?php
            include("listar_produtos.php");
            if (!empty($lista_produtos)) {
                foreach ($lista_produtos as $linha) { ?>
                    <tr>
                        <td> <?php echo '<img height="40px" width="40px" src="' . $linha['imagem_produto'] . '">'; ?> </td>
                        <td> <?php echo $linha['id_produto']; ?> </td>
                        <td> <?php echo $linha['marca']; ?> </td>
                        <td> <?php echo $linha['preco']; ?> </td>
                        <td> <?php echo $linha['nome']; ?> </td>
                        <td> <?php echo $linha['status_produto']; ?> </td>
                        <td> <?php echo $linha['descricao']; ?> </td>
                        <td> <?php echo $linha['tamanho']; ?> </td>
                        <td> <?php echo $linha['categoria']; ?> </td>
                        <td> <a href="editar_campos_produto.php?codigo=<?php echo $linha['id_produto'] ?>">
                                <input type="button" value="Editar">
                            </a>
                        </td>
                        <td> <a href="excluir_produto.php?codigo=<?php echo $linha['id_produto']; ?>">
                                    <button type="button" class="btn btn-danger" onclick="validacao()">Excluir</button>
                            </a>
                        </td>

                <?php }
            }
                ?>
        </tbody>
    </table>
</body>
<script>
    function validacao(){
        alert("Você tem certeza que deseja excluir esse produto?")
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</html>