<?php

    require_once('funcoes/topo.php');
    require_once('funcoes/menu.php');
    require_once('funcoes/rodape.php');
    include('../db/verificaLogin.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Padoka Hill Valley</title>
        <link rel="stylesheet" href="cms_css/style.css">
        <link rel="stylesheet" href="cms_css/index_cms.css">
        <link rel="shortcut icon" href="../imagens/LogoOficial.png">
    </head>
    <body>
            <?php topo()?>
            <?php menu()?>

            <div class="container_opcao">
                <p>Seja Bem Vindo</p>
                <p>ao</p>
                <p>Sistema de Gerenciamento de Site!</p>
            </div>

            <?php rodape()?>

    </body>
</html>