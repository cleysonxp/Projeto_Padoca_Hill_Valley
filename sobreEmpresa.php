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
        <link rel="stylesheet" href="css/empresa.css">
        <script src="js/jquery.js"></script>
        <?php menuMobile();?>

    </head>
    <body>
        <?php cabecalho();?>

        <div class="containerCorpo">

            <div id="quemSomos">
                Quem somos?
            </div>
            <div class="containerConteudoEmpresa">
                <div class="conteudoEmpresa" >
                    Somos uma oficina de pães artesanais formada por pessoas que valorizam a simplicidade, a qualidade e a experiência de fazer e comer pão.
                    Plantamos trigo junto com pequenos produtores, moemos os grãos em nossa cozinha, cultivamos o próprio fermento, manuseamos cada fornada e servimos os clientes olho no olho, pão por pão.
                    Sempre frescos, naturais e de fabricação limitada, ficamos felizes de oferecer pães com mais sabor e significado, que expressam a paixão pelo que somos e fazemos.
                </div>
                <div class="imagemEmpresa">
                    <img id="imgEmpresa" src="imagens/paes_artesanais.jpg" alt="paes_artesanais">
                </div>
            </div>
            

        </div>

        <?php rodape();?>
    </body>
</html>