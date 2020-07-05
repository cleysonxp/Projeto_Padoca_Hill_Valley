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
                    <p>Horário de funcionamento: </p>
                </div>

            </div>

            <div class="container_loja">

                <div class="imagem_loja">
                
                </div>

                <div class="container_funcionamento">
                    <p>Localização: </p>
                    <p>Horário de funcionamento: </p>
                </div>

            </div>

            <div class="container_loja">

                <div class="imagem_loja">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14629.679057519277!2d-46.8378212!3d-23.553363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf003dc0000001%3A0xa8b188d36f5d3483!2sPlaza%20Shopping%20Carapicu%C3%ADba!5e0!3m2!1spt-BR!2sbr!4v1593978640162!5m2!1spt-BR!2sbr" width="400" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>

                <div class="container_funcionamento">
                    <p>Localização: Rua barbosa </p>
                    <p>Horário de funcionamento: </p>
                </div>

            </div>

            

        </div>
        
        <?php rodape();?>
    </body>
</html>