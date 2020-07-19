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
        <link rel="stylesheet" href="css/produtoDoMes.css">
        <link rel="shortcut icon" href="imagens/LogoOficial.png">
        <script src="js/jquery.js"></script>
        <?php menuMobile();?>
        
    </head>
    <body>
        <?php cabecalho();?>
        <div class="containerCorpo">
            <div id="produtoDoMes">Produto do Mês</div>

            <section id="containerProdutoDoMes">
                <h1>Pão de Queijo e Sua História</h1>
                <div id="imagemProdutoDoMes">
                    <img class="responsive" src="imagens/paoDeQueijo.jpg" alt="">
                </div>

                <div id="containerProdutoTexto">
                    <p> Valor : R$ 5,00</p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel molestiae alias corporis ab debitis quo hic, nobis, voluptatibus amet praesentium iure rerum mollitia, odit ea. Consequuntur corporis iure amet accusantiumLorem ipsum dolor sit amet consectetur adipisicing elit. Vel molestiae alias corporis ab debitis quo hic, nobis, voluptatibus amet praesentium iure rerum mollitia, odit ea. Consequuntur corporis iure amet accusantiumLorem ipsum dolor sit amet consectetur adipisicing elit. Vel molestiae alias corporis ab debitis quo hic, nobis, voluptatibus amet praesentium iure rerum mollitia, odit ea. Consequuntur corporis iure amet accusantium.
                </div>
            </section>


        </div>
        <?php rodape();?>
    </body>
</html>