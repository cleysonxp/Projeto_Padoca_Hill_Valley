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
        <!-- <link rel="stylesheet" href="css/style2.css"> -->
        <link rel="stylesheet" href="css/cabecario.css">
        <link rel="stylesheet" href="css/curiosidade.css">
        <script src="js/jquery.js"></script>
        <?php menuMobile();?>
    </head>
    <body>
        <?php cabecalho();?>

        <div class="containerCorpo">

            <div id="curiosidadesProdutos">
                Curiosidades dos Produtos
            </div>

            <section class="curiosidade">
                <h1>Café</h1>
                <div class="curiosidadeProduto">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet voluptate hic quas natus quod cum, dolorum voluptatibus explicabo ipsam libero error consequatur dolor soluta impedit, repellat quasi totam veniam fugiat!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet voluptate hic quas natus quod cum, dolorum voluptatibus explicabo ipsam libero error consequatur dolor soluta impedit, repellat quasi totam veniam fugiat!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet voluptate hic quas natus quod cum, dolorum voluptatibus explicabo ipsam libero error consequatur dolor soluta impedit, repellat quasi totam veniam fugiat!
                </div>

                <div class="imagemProduto">
                    <!-- <img src="./imagens/cafe3.jpg" alt=""> -->
                </div>
            </section>

        </div>

        <?php rodape();?>
    </body>
</html>