<?php 
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
    <title>Cadastro Produto</title>
</head>

<body style="background-color: white; overflow-x: hidden;">

    <nav class="navbar-expand-lg container-fluid" style="background-color: #260352;">

        <ul class="navbar">

            <li class="nav-item active">
                <img src="PNGStreetCloset.png" width="120px">
            </li>


            <li class="nav-item" style="margin-right: 80px ;">
                <h1 style="color: white; font-size: 50px;">ATUALIZAR PRODUTOS</h1>
            </li>

            </div>

            <a href="pag_principal_adm.php">
                <button class="btn btn-outline-success text-white" style="color: white; background-color: #260352; border-color: black;" type="submit">VOLTAR</button>
            </a>
        </ul>

    </nav>
    </row>
    <?php $id_produto = $_GET['codigo'];
            $comando = $pdo->prepare("SELECT * FROM produto WHERE id_produto = $id_produto");

            $comando->execute();
            if($comando->rowCount()>= 1)
            {
                $lista_produtos = $comando->fetchAll();
                if(!empty($lista_produtos)) {
                    foreach ($lista_produtos as $linha){ 
                        
    ?>
<form class="mx-8" action="editar_produto.php" method="POST" enctype="multipart/form-data">
    <div class="container-fluid ms-4">
        <div class="produto">
            <br>
            <img src="<?php echo $linha['imagem_produto']; ?>" width="100px"><br>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-5 col-xs-12">
<BR>
    <BR>
    <input class="d-none" type="text" name="id_produto"  value="<?php echo $linha['id_produto']; ?>">
        <div class="col-md-5 col-xs-12">
            <label>Nome do produto:</label>
            <input class="form-control" type="text" name="nome" required="" value="<?php echo $linha['nome']; ?>">
        </div>
        <BR>
                    <div class="col-md-5 col-xs-12">
                        <label> Selecione a categoria </label>
                        <select class="form-select" name="categoria" required="" >
                            <option selected value="<?php echo $linha['categoria']; ?>"><?php echo $linha['categoria']; ?></option>
                            <option value="Calca">Calça</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Shorts">Shorts</option>
                            <option value="Vestido">Vestido</option>
                            <option value="Regata">Regata</option>
                            <option value="Moletom">Moletom</option>
                            <option value="Corta Vento">Corta vento</option>
                            <option value="Jaqueta">Jaqueta</option>
                            <option value="Tenis">Tênis</option>
                            <option value="Camiseta">Camiseta</option>
                            <option value="Oculos">Óculos</option>
                            <option value="Bone">Boné</option>
                            <option value="Camisa">Camisa</option>
                            <option value="Pulseira">Pulseira</option>


                        </select>
                        <br>
                    </div>

                    <div class="col-md-5 col-xs-12">
                        <label> Selecione o tamanho </label>
                        <select class="form-select" name="tamanho" required="">
                            <option selected value="<?php echo $linha['tamanho']; ?>"><?php echo $linha['tamanho']; ?></option>
                            <option value="P">P</option>
                            <option value="M">M</option>
                            <option value="G">G</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            
                        </select>
                        <br>
                    </div>

                    <div class="col-md-5 col-xs-12">
                        <label> Selecione o status </label>
                        <select class="form-select" name="status_produto" required="">
                        <option selected value="<?php echo $linha['status_produto']; ?>"><?php  if($linha['status_produto'] !=1){ echo "Indisponivel"; }else{echo "Disponivel"; }  ?></option>
                            <option value="0">Disponivel</option>
                            <option value="1">Indisponivel</option>
                        </select>
                        <br>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5 col-xs-12">
                                <label>Marca:</label>
                                <input class="form-control" type="text"  name="marca" required="" value="<?php echo $linha['marca']; ?>"  >
                            </div>
                            <div class="col-md-5 col-xs-12">
                                <label>Descrição do produto:</label>
                                <input class="form-control" type="text" placeholder="Escreva sobre a cor, material." name="descricao" required="" value="<?php echo $linha['descricao']; ?>">
                            </div>
                        
                            <div class="col-md-5 col-xs-12">
                                <br>
                                <label>Valor:</label>
                                <input class="form-control" type="text" placeholder=" <?php echo $linha['preco'];?>" name="preco" required="" value=" <?php echo $linha['preco'];?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center align-item-center">
        <div class="col-md-auto" style="color: white;">
            
                <button class="btn btn-outline-success text-white" style="color: white; background-color: #260352; border-color: black;" type="submit">SALVAR</button>
            
        </div>
        <br>
            <br>
    </form>
    <?php }} }?>
</body>

<script>
    
</script>
</html>