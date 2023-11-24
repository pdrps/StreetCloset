<?php
session_start();
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

        <h1 style="color: white; font-size: 50px; margin-right: 8%;">BAG</h1>

        <?php

    echo '
    <a href="perfil_usuario.php">
        <button class="btn btn-outline-success text-white" style="color: white; background-color: #260352; border-color: black;" type="submit">VOLTAR</button>
    </a>'
    ?>

      </ul>

    </nav>
    </row>


    
<
    <?php 
        // include("conexao.php");
         include("listar_bag.php");
        //  if (!empty($lista_produtos)) {
        //             foreach($lista_produtos as $linha) { 

          include("conexao.php");
            $comando = $pdo->prepare("SELECT * FROM bag WHERE id_usuario = $id_usuario");

            $comando->execute();
            if($comando->rowCount()>= 1)
            {
                $lista_bag = $comando->fetchAll();
                if(!empty($lista_bag)) {
                    foreach ($lista_bag as $linha){ 

                      ?> 

<div class="container-fluid ms-4">
                     
      <div class="row mb-2">
        
        <div class="col-md-10 col-xs-10">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static" style="background-color: white ;">
            <p class="card-text" style="font-size: 40px; text-align: center"><?php echo $linha['nome'];?></p>
            <p class="card-text" style="font-size: 120%; text-align: center"><?php echo $linha['descricao'];?></p>
              <BR>
              <BR>
              <p class="card-text" style="font-size: 140%; text-align: baseline"> Tamanho: <?php echo $linha['tamanho'];?></p>
              <p class="card-text" style="font-size: 140%; text-align: baseline"> Valor: R$<?php echo $linha['preco'];?></p>
            </div>
            <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img card-img-top" width="auto" height="390px" role="img" src="<?php echo $linha['imagem_produto']; ?>" preserveAspectRatio="xMidYMid slice" focusable="false"></img>
            </div>
          </div>
        </div>
        <div class="col-md-2 col-xs-2" style="margin-top: 160px;">
          <a href="excluir_bag.php?id_produto=<?php echo $linha['id_produto'];?>">
            <img src="lixeira.png" width="150px;">
          </a>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-md-10 col-xs-12">
                      
              
            </div>
            
             
              
              
            </div>
          </div>
        </div>
        
      </div>
    </div>
<?php 
            }
              } 
            }
          ?>


     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 500px; height:50px; display: block; margin: 30px auto; background-color: white; color: black;;">
              PRÓXIMO
     </button>

             
              
              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">CONTRATO DE LOCAÇÃO STREET CLOSET</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    
                        CONTRATO DE LOCAÇÃO DE PRODUTOS STREET CLOSET
                        <BR>

Os signatários, que contratam nas qualidades neste contrato, têm entre si, ajustada a presente locação com prestação de serviço, mediante as seguintes cláusulas e condições;   <BR>

IDENTIFICAÇÃO DAS PARTES <BR>

LOCATÁRIO: [Nome do cliente], com sede ______________________, nº/complemento __________, bairro __________, CEP __________, no Estado __________, inscrita no CNPJ sob o nº __________, e no Cadastro Estadual sob o nº __________, neste ato representada pelo seu [Cargo do representante] __________, [Nacionalidade], [Estado Civil], [Profissão], Carteira de Identidade nº __________, CPF nº __________, residente e domiciliado na Rua __________, nº __________, bairro __________, CEP __________, Cidade __________, no Estado __________; 
<BR>
LOCADORA: [STREET CLOSET], com sede Joinville, no Estado SC.
<BR>
DO OBJETO DO CONTRATO
<BR>
Cláusula 1ª: Constitui objeto deste contrato o aluguel dos seguintes trajes:
<BR>

Código <BR>
Descrição <BR>
Qt. <BR>
Vr. Unit. (R$) <BR>
Vr. total (R$) <BR>

    <BR>
Sendo o valor de ____________________________ referente ao total deste contrato de locação.
<BR>

Obs.: Descrever pormenorizadamente os produtos objetos de locação, com todas as suas especificidades, incluindo dados técnicos que possam vir a influir no entendimento do contrato e, se possível for, dados decorrentes de perícia realizada envolvendo as situações em que serão realizadas a locação (ex. marca, modelo, cor, tamanho, se é primeiro aluguel, etc.).
<BR>

    OBRIGAÇÕES DO LOCATÁRIO <br>

Cláusula 2ª: O LOCATÁRIO deverá fornecer à LOCADORA todas as informações necessárias à realização do aluguel, devendo especificar os detalhes necessários à perfeita consecução do mesmo.

Cláusula 3ª: O LOCATÁRIO deverá efetuar o pagamento na forma e condições estabelecidas na Cláusula 9ª.

OBRIGAÇÕES DA LOCADORA


Cláusula 6ª: A locação terá início no dia __________ às __________ e término no dia __________ às __________.

Parágrafo primeiro: A LOCADORA não se responsabilizará pelos trajes que não forem retirados no dia e horário estabelecidos no caput da presente cláusula.

Parágrafo segundo: A LOCADORA se compromete a entregar os trajes e seus respectivos acessórios lavados e passados, em perfeito estado de conservação e uso, na data estabelecida na cláusula 6ª.

DO PREÇO E DAS CONDIÇÕES DE PAGAMENTO

Cláusula 9ª: A presente locação será remunerado pela quantia total de R$ __________ (valor expresso) por dia, referente aos produtos efetivamente locados, devendo ser pago em dinheiro, ou outra forma de pagamento em que ocorra a prévia concordância de ambas as partes.


Parágrafo segundo: O valor referente à reserva não será devolvido sob qualquer hipótese, mesmo em caso de cancelamento do contrato.

DO INADIMPLEMENTO, DO DESCUMPRIMENTO E DA MULTA

Cláusula 10ª: Em caso de inadimplemento por parte do LOCATÁRIO quanto ao pagamento do aluguel, deverá incidir sobre o valor do presente instrumento, multa pecuniária de 2%, juros de mora de 1% ao mês e correção monetária.

Parágrafo único: Em caso de cobrança judicial, devem ser acrescidas custas processuais e 20% de honorários advocatícios.

Cláusula 11ª: No caso de não haver o cumprimento de qualquer uma das cláusulas,
exceto a 9ª, do presente instrumento, a parte que não cumpriu deverá pagar uma multa de 10% do valor do contrato para a outra parte.

DA RESCISÃO IMOTIVADA


Cláusula 14ª: Caso seja a LOCADORA quem requeira a rescisão imotivada, deverá
devolver a quantia que se refere aos serviços por ele não prestados ao LOCATÁRIO, acrescentado de 2% de taxas administrativas.

DAS CONDIÇÕES GERAIS

Cláusula 15ª: Caso os trajes e/ou acessórios sejam devolvidos com excesso de sujeira ou manchas, será cobrada uma taxa de 20% (valor expresso) para a limpeza das peças.

Parágrafo primeiro: A verificação de possíveis danos existentes na roupa ou acessório, será cobrado do LOCATÁRIO no ato da devolução. Será considerado dano, manchas de tintas, frutas e autobronzeador, graxa de sapato, barro, asfalto, cimento, tecido queimado ou rasgado, bordado desfeito e acessórios que mancham permanentemente.

Parágrafo segundo: É obrigação do LOCATÁRIO devolver as roupas e acessórios, na mesma condição em que foram retirados com capa e cabide ou caixa. Na falta destes itens será cobrado uma taxa de reposição de R$20,00 por capa, R$15,00 por embalagem de calçado e R$10,00 por cabide.

Cláusula 17ª: A não devolução no prazo estabelecido a contar da data prevista, dos trajes e/ou acessórios descritos nesse contrato, será considerada EXTRAVIO ou ROUBO, sendo que o LOCATÁRIO terá que pagar 10% (valor expresso) do valor do aluguel de cada peça.

Parágrafo Primeiro: Se for ultrapassada a data prevista para a devolução dos trajes e/ou acessórios, em prazo inferior ao descrito no caput da presente cláusula, o LOCATÁRIO pagará o valor equivalente a um dia de aluguel extra para cada dia de atraso, acrescido de multa de 10%(valor expresso).

Parágrafo Segundo: Os valores descritos no parágrafo primeiro e no caput da presente cláusula, poderão ser aplicados proporcionalmente a trajes e/ou acessórios avulsos, constantes do rol de produtos locados, que não foram devolvidos na data prevista.

Cláusula 18ª: Não será permitida a troca de trajes e/ou acessórios, após __________ (valor expresso) dias da data da locação.

Cláusula 19ª: No caso de pagamento total do aluguel no ato da reserva, o cliente receberá o valor excedente ao valor da reserva estabelecido no Parágrafo primeiro da Cláusula 9ª, se comunicar o cancelamento até 12 horas antes da data de retirada dos produtos locados.

Cláusula 20ª: Fica compactuado entre as partes a total inexistência de vínculo trabalhista entre as partes contratadas, excluindo as obrigações previdenciárias e os encargos sociais, não havendo entre LOCADORA e LOCATÁRIO qualquer tipo de relação de subordinação.

Cláusula 21ª: Salvo com a expressa autorização do LOCATÁRIO, não pode a LOCADORA transferir ou subcontratar os trajes e/ou acessórios definidos neste instrumento, sob o risco de ocorrer a rescisão imediata.

Cláusula 22ª: Este contrato deverá ser registrado no Cartório de Registro de Títulos e Documentos.

DO FORO

Cláusula 23ª: Para dirimir quaisquer controvérsias oriundas do presente contrato, as
partes elegem o foro da comarca de Joinville.

Por estarem assim justos e contratados, firmam o presente instrumento, em duas vias de igual teor, juntamente com 2 (duas) testemunhas.

[Local, data e completa].










                    </div>
                  <a href="finaliza_compra.php">
                    <div class="modal-footer">
                      <input  type="button" class="btn btn-outline-success" value="ASSINAR CONTRATO">
                    </div>
                  </a>
                  </div>
                </div>
              </div>
                


          
    

  </body>

</html>