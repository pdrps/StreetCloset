    <?php
    include("conexao.php");

    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $telefone = $_POST["telefone"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $senha = MD5($_POST["senha"]);
    $confirme_senha = MD5($_POST["confirme_senha"]);
    $rua = $_POST["rua"];
    $bairro = $_POST["bairro"];
    $numero = $_POST["numero"];
    $complemento = $_POST["complemento"];
    $cep = $_POST["cep"];
    //$imagem_usuario = $_POST["imagem_usuario"];
    
    // $imagem = $_FILES['imagem'];
    // $extensao = $imagem['type'];
    // $conteudo = file_get_contents($imagem['tmp_name']);
    // $base64 = "data:".$extensao.";base64,".base64_encode($conteudo);
    

    $comando = $pdo -> prepare("INSERT INTO usuario(nome,sobrenome,telefone,cpf,email,senha,rua,bairro,numero,complemento,cep) VALUES(:nome,:sobrenome,:telefone,:cpf,:email,:senha,:rua,:bairro,:numero,:complemento,:cep)");
    
    $comando->bindValue(":nome",$nome); 
    $comando->bindValue(":sobrenome",$sobrenome); 
    $comando->bindValue(":telefone",$telefone); 
    $comando->bindValue(":cpf",$cpf); 
    $comando->bindValue(":email",$email);                                     
    $comando->bindValue(":senha",$senha); 
    $comando->bindValue(":rua",$rua); 
    $comando->bindValue(":bairro",$bairro); 
    $comando->bindValue(":numero",$numero); 
    $comando->bindValue(":complemento",$complemento);
    $comando->bindValue(":cep",$cep); 

   // $comando->bindValue(":conteudo",$base64);

    if($senha == $confirme_senha){
         $comando->execute();
         header("Location:pag_login.html");
    }else{
        echo'<script>alert("Confirme a sua senha corretamente");</script>';
        header("Location:pag_cadastro.html");
    }

    unset($comando);
    unset($pdo);
?>
