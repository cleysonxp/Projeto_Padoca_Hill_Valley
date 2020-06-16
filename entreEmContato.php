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
        <!-- <link rel="stylesheet" href="css/style2.css"> -->
        <link rel="stylesheet" href="css/entreContato.css">
        <script src="js/jquery.js"></script>

        <?php menuMobile();?>
        
    </head>
    <body>
        
        <?php cabecalho();?>
    
        <div class="containerCorpo">

            <form name="formulario_entre_em_contato" action="db/insertCliente.php?modo=inserir" method="post">
                <div class="container_formulario">

                    <div class="formulario_titulo">Entre em Contato</div>
                    
                    <div class="formulario_linha">
                        <div class="linha_titulo">Nome*</div>        
                        <div class="linha_input">
                            <input class="caixaInput" type="text" name="txtNome" required value="">
                        </div>
                    </div>
    
                    <div class="formulario_linha">
                        <div class="linha_titulo">Telefone</div>        
                        <div class="linha_input">
                            <input class="caixaInput" id="telefone" type="text" name="txtTelefone"  value="">
                        </div>
                    </div>
    
                    <div class="formulario_linha">
                        <div class="linha_titulo">Celular*</div>        
                        <div class="linha_input">
                            <input class="caixaInput" type="text" name="txtCelular" required value="">
                        </div>
                    </div>
    
                    <div class="formulario_linha">
                        <div class="linha_titulo">Email*</div>        
                        <div class="linha_input">
                            <input class="caixaInput" type="text" name="txtEmail" required value="">
                        </div>
                    </div>
    
                    <div class="formulario_linha">
                        <div class="linha_titulo fb">Link do Facebook</div>        
                        <div class="linha_input">
                            <input class="caixaInput" type="text" name="txtFacebook"  value="">
                        </div>
                    </div>
    
                    <div class="formulario_linha">
                        <div class="linha_titulo">Home Page</div>        
                        <div class="linha_input">
                            <input class="caixaInput" type="text" name="txtHomePage"  value="">
                        </div>
                    </div>
    
                    <div class="formulario_linha">
                        <div class="linha_titulo">Profissão*</div>        
                        <div class="linha_input">
                            <input class="caixaInput" type="text" name="txtProfissao" required value="">
                        </div>
                    </div>
    
                    <div class="formulario_linha">
                        <div class="linha_titulo">Sexo*</div>        
                        <div class="linha_input radios">
                            <input type="radio" name="rdoSexo" value="M" required>Masculino
                            <input type="radio" name="rdoSexo" value="F" required>Feminino
                        </div>
                    </div>
    
                    <div class="formulario_linha">
                        <div class="linha_titulo fb">Tipo da Mensagem*</div>        
                        <div class="linha_input radios">
                            <select class="slt" name="sltTipoMensagem" required>
                                <option value="" selected>Selecione o tipo da mensagem</option>
                                <?php
                                
                                $sql = "select * from tbltipomensagem order by tipo_mensagem;";

                                $selectTipoMensagem = mysqli_query($conex, $sql);
                                

                                while( $rsTipoMensagem = mysqli_fetch_assoc($selectTipoMensagem))
                                {
                                ?>
                                <option value="<?=$rsTipoMensagem['idTipoMensagem']?>">
                                    <?=$rsTipoMensagem['tipo_mensagem']?>
                                </option>                            
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
    
                    <div class="formulario_linha_msg">
                        <div class="msgTitulo">Mensagem*</div>        
                        <div class="linha_input ">
                            <textarea class="areaTexto" name="txtObs" cols="50" rows="7" required></textarea>
                        </div>
                    </div>

                    <div class="formulario_linha btn">
                        <input class="botaoEnviar" type="submit" value="Salvar" name="btnEnviar">
                    </div>
    
                </div>
            </form>
            
        </div>
        <?php rodape();?>
    </body>
</html>