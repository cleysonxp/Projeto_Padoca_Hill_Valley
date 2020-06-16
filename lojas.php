<?php

require_once('funcoes/cabecalho.php');
require_once('funcoes/rodape.php');
require_once('funcoes/menuMobile.php');

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
        <script src="js/jquery.js"></script>
        <?php menuMobile();?>
    </head>
    <body>
        <?php cabecalho();?>

        <div class="containerCorpo">
        
            <div class="titulo_lojas">
                <h1>Nossas filiais</h1>
            </div>

            <div class="container_loja">

                <div class="imagem_loja">
                
                </div>

                <div class="container_funcionamento">
                    <p>Localização: </p>
                    <p>Dias de funcionamneto:</p>
                    <p>Horário de funcionamento: </p>
                </div>

            </div>

            <div class="container_loja">

                <div class="imagem_loja">
                
                </div>

                <div class="container_funcionamento">
                    <p>Localização: </p>
                    <p>Dias de funcionamneto:</p>
                    <p>Horário de funcionamento: </p>
                </div>

            </div>

            <div class="container_loja">

                <div class="imagem_loja">
                
                </div>

                <div class="container_funcionamento">
                    <p>Localização: </p>
                    <p>Dias de funcionamneto:</p>
                    <p>Horário de funcionamento: </p>
                </div>

            </div>

            

        </div>
        
        <?php rodape();?>
    </body>
</html>