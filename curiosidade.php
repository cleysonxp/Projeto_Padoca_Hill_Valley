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
        <!-- <link rel="stylesheet" href="css/style2.css"> -->
        <link rel="stylesheet" href="css/cabecario.css">
        <link rel="stylesheet" href="css/curiosidade.css">
        <link rel="shortcut icon" href="imagens/LogoOficial.png">
        <script src="js/jquery.js"></script>
        <?php menuMobile();?>
    </head>
    <body>
        <?php cabecalho();?>

        <div class="containerCorpo">

            <div id="curiosidadesProdutos">
                Curiosidades dos Produtos
            </div>

            <?php
            
                $conex = conexaoMysql();
                
                $sql = " select * from tblcuriosidades";

                $selectCuriosidades = mysqli_query($conex, $sql);

                while($rsCuriosidades = mysqli_fetch_assoc($selectCuriosidades))
                {                
            ?>

            <section class="curiosidade">
                <h1><?=$rsCuriosidades['titulo']?></h1>
                <div class="curiosidadeProduto">
                    <?=$rsCuriosidades['texto']?>
                </div>

                <div class="imagemProduto">
                    <img class="imgCuri" src="db/arquivos/<?=$rsCuriosidades['imagem']?>" alt="db/arquivos/<?=$rsCuriosidades['imagem']?>">
                </div>
            </section>

            <?php
                }
            ?>

        </div>

        <?php rodape();?>
    </body>
</html>