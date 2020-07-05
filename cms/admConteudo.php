<?php

require_once('funcoes/topo.php');
require_once('funcoes/rodape.php');
require_once('../db/conexao.php');

$conex = conexaoMysql();

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Padoka Hill Valley</title>
        <link rel="stylesheet" href="cms_css/style.css">
    </head>
    <body>

        <?php topo()?>

        <div class="container_corpo">
            <div class="container_corpo_titulo">Administração de Conteúdo</div>

            <a href="cmsCuriosidades.php">
                <div class="editConteudo">
                    Curiosidades
                </div>
            </a>
            
            <a href="cmsEmpresa.php">
                <div class="editConteudo">
                    Sobre Empresa
                </div>
            </a>
            
            <a href="cmsLojas.php">
                <div class="editConteudo">
                    Nossas Lojas
                </div>
            </a>
        </div>

        <?php rodape()?>
    </body>
</html>