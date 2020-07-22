<?php

require_once('funcoes/cabecalho.php');
require_once('funcoes/rodape.php');
require_once('funcoes/menuMobile.php');
require_once('db/conexao.php');

?>


<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Padoka Hill Valley</title>
        <link rel="stylesheet" href="css/cabecario.css">
        <link rel="stylesheet" href="css/lojas.css">
        <link rel="shortcut icon" href="imagens/LogoOficial.png">
        <script src="js/jquery.js"></script>
        <?php menuMobile();?>
    </head>
    <body>
        <?php cabecalho();?>

        <div class="containerCorpo">
        
            <div class="titulo_lojas">
                <h1>Nossas filiais</h1>
            </div>

            <?php

                $conex = conexaoMysql();
            
                $sql = " select * from tbllojas";

                $selectLoja = mysqli_query($conex, $sql);

                while($rsLoja = mysqli_fetch_assoc($selectLoja)){

                    if($rsLoja['modo'] != 0){

                            
            ?>

            <div class="container_loja">

                <div class="filial">
                    Filial <?=$rsLoja['numeroFilial']?>
                </div>

                <div class="imagem_loja">
                        <img class="imgLoja" src="db/arquivos/<?=$rsLoja['imagem']?>">
                </div>

                <div class="container_funcionamento">
                    <p>Localização: <?=$rsLoja['rua']?> n° <?=$rsLoja['numero']?>, <?=$rsLoja['bairro']?> <?=$rsLoja['cep']?> </p>                    
                    <p>Horário de funcionamento:  <?=$rsLoja['horaAberto']?> as <?=$rsLoja['horaFechado']?></p>
                </div>

            </div>   

            <?php
                }

                    }
            
            ?>       

                       
        </div>
        
        <?php rodape();?>
    </body>
</html>