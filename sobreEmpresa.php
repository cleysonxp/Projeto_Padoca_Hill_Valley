    <?php

    require_once('funcoes/cabecalho.php');
    require_once('funcoes/rodape.php');
    require_once('funcoes/menuMobile.php');
    require_once('db/conexao.php');

    $conex = conexaoMysql();
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Padoka Hill Valley</title>
        <link rel="stylesheet" href="css/cabecario.css">
        <link rel="stylesheet" href="css/empresa.css">
        <link rel="shortcut icon" href="imagens/LogoOficial.png">
        <script src="js/jquery.js"></script>
        <?php menuMobile();?>

    </head>
    <body>
        <?php cabecalho();?>

        <div class="containerCorpo">

            <?php
            
                $sql = "select * from tblempresa";

                $selectConteudo = mysqli_query($conex, $sql);

                while($rsConteudo = mysqli_fetch_assoc($selectConteudo))
                {
            ?>

            <div id="quemSomos">
                <?=$rsConteudo['titulo']?>
            </div>

            <div class="containerConteudoEmpresa">
                <div class="conteudoEmpresa">
                 <?=$rsConteudo['texto']?>       
                        
                </div>
                <div class="imagemEmpresa">
                    <img class="imgEmpresa" src="db/arquivos/<?=$rsConteudo['imagem']?>" alt="paes_artesanais">
                </div>
            </div>
            <?php
                }
            ?>
            

        </div>

        <?php rodape();?>
    </body>
</html>

<!-- Somos uma oficina de pães artesanais formada por pessoas que valorizam a simplicidade, a qualidade e a experiência de fazer e comer pão.
                        Plantamos trigo junto com pequenos produtores, moemos os grãos em nossa cozinha, cultivamos o próprio fermento, manuseamos cada fornada e servimos os clientes olho no olho, pão por pão.
                        Sempre frescos, naturais e de fabricação limitada, ficamos felizes de oferecer pães com mais sabor e significado, que expressam a paixão pelo que somos e fazemos. -->