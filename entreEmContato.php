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
        <!-- <link rel="stylesheet" href="css/style2.css"> -->
        <link rel="stylesheet" href="css/entreContato.css">
        <script src="js/jquery.js"></script>
        <?php menuMobile();?>
        
    </head>
    <body>
        
        <?php cabecalho();?>
    
        <div class="containerCorpo">

            <div id="entreContato"> 
                Entre em contato
            </div>
            <form name="" method="post">
                <div id="containerFormularioContato">

                    <div class="formItens">
                        <p>Nome</p>
                        <input class="caixaInput" type="text" name="nome" required value="">
                    </div>

                    <div class="formItens">
                        <p>Telefone</p>
                        <input class="caixaInput" type="text" name="telefone" value="">
                    </div>
                    
                    <div class="formItens">
                        <p>Celular</p>
                        <input class="caixaInput" type="text" name="celular" value="">
                    </div>
                    
                    <div class="formItens">
                        <p>Email</p>
                        <input class="caixaInput" type="text" name="email" value="">
                    </div>
                    
                    <div class="formItens">
                        <p>Facebook</p>
                        <input class="caixaInput" type="text" name="facebook" value="">
                    </div>
                    
                    <div class="formItens">
                        <p>Home Page</p>
                        <input class="caixaInput" type="text" name="homepage" value="">
                    </div>
                    
                    <div class="formItens">
                        <p>Mensagem</p>
                        <input class="caixaInput" type="text" name="" value="">
                    </div>
                    
                    <div class="formItens">
                        <p>Profissão</p>
                        <input class="caixaInput" type="text" name="" value="">
                    </div>
                    
                    <div class="formItemSexo">
                        <p>Sexo</p>
                        <input type="radio" name="sexo" value="" >Masculino
                        <input type="radio" name="sexo" value="" >Feminino
                        <input type="radio" name="sexo" value="" >Outros
                    </div>

                    <div class="formItemSugestao">
                        <p>Sugestão</p>
                        <textarea class="areaTexto" name="" value="" ></textarea>
                    </div>
                    <div id="containerBotao">
                        <input id="botaoEnviar" type="submit" value="Enviar">
                    </div>
                    
                    <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->
                </div>

            </form>

            <div id="containerImagemContato">
                <img src="imagens/xicaraDeCafe.jpg" alt="xicaraDeCafe">
            </div>

        </div>
        <?php rodape();?>
    </body>
</html>