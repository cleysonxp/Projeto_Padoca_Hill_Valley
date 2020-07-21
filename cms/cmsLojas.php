<?php

    $id = 0;
    $horaFechado = null;
    $imagem = null;
    $rua = null;
    $bairro = null;
    $numero = null;
    $cep = null;
    $foto = null;
    $modo= null;
    $numeroFilial = null;
    $horaAberto = null;
    // $horaFechado = '0';
    
    $action = "../db/insertLojas.php?modo=inserir";

    // $action2 = "../db/uploadImagemEmpresa.php";

    require_once('funcoes/topo.php');
    require_once('funcoes/menu.php');
    require_once('funcoes/rodape.php');
    require_once('../db/conexao.php');
    include('../db/verificaLogin.php');

    $conex = conexaoMysql();

    
    if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'consutaEditar')
        {
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];

                $sql = "select * from tbllojas where idLoja = " .$id;

                $selectLoja = mysqli_query($conex, $sql);
    
                if($rsListLoja = mysqli_fetch_assoc($selectLoja)){
                                        
                    $imagem = $rsListLoja['imagem'];                    
                    $rua = $rsListLoja['rua'];
                    $numero = $rsListLoja['numero'];
                    $bairro = $rsListLoja['bairro'];                    
                    $cep = $rsListLoja['cep'];
                    $numeroFilial = $rsListLoja['numeroFilial'];
                    $modo = $rsListLoja['modo'];                    
                    $horaAberto = $rsListLoja['horaAberto'];
                    $horaFechado  = $rsListLoja['horaFechado'];
                    
    
                    // $action2 = "../db/updateEmpresa.php";
                    $action = "../db/updateLoja.php?modo=atualizar&id=".$rsListLoja['idLoja']."&imagem=".$rsListLoja['imagem'];
                }
            }            
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Padoka Hill Valley</title>
        <link rel="stylesheet" href="cms_css/style.css">
        <link rel="stylesheet" href="cms_css/conteudo.css">
        <link rel="shortcut icon" href="../imagens/LogoOficial.png">
        <script src="../js/teste.js"></script>
        <script src="../js/jquery.form.js"></script>
        <script defer src="../js/masks.js" type="module"></script>
        <script>
            $(document).ready(function(){

                $('.visualizar').click(function(){
                    $('#modal').fadeIn(1000);
                });

                $('#foto').live('change',function(){
                    $('#frmFoto').ajaxForm({
                        target: '#imagem'
                    }).submit();
                });
            });

            function visualizarLoja (idLoja)
            {
                $.ajax({
                    type: "POST",
                    url: "../db/visualizarLoja.php",
                    data: {modo:'visualizar', id:idLoja},
                    success: function(dados) {
                        $('#modalConteudo').html(dados);
                    }
                });
            }
            function updateEstadoLoja(idLoja,modo){
                $.ajax({
                    type: "POST",
                    url:"../db/updateEstadoLoja.php",
                    data:{id:idLoja, modo:modo}
                    // success: function(dados){
                    //     $('#estadoContas').html(dados);
                    // }
                });
            }

        </script>
    </head>
    <body>
        <div id="modal">
            <div id="modalConteudo">
            
            </div>
        </div>
        
        
        <?php menu()?>

        <div class="container_corpo">
            <a href="admConteudo.php">
                <div class="flecha" alt="voltar">
                    🡨
                </div>
            </a>

            
            <div class="container_conteudo_dados">

                <form name="frmFotoLoja" id="frmFoto" action="../db/uploadImagemEmpresa.php" method="post" enctype="multipart/form-data">
                    <div class="linha_titulo_container">Página Lojas</div>
                    <div class="linha">
                        <div class="linha_titulo">Imagem da loja</div>
                        <div class="linha_entrada_dados alinhar">
                            <input id="foto" type="file" name="fleImagem" accept="image/jpeg, image/png, image/jpg">
                         </div>
                    </div>
                    <div class="linha_Imagem">
                        <div id="imagem">
                            <img class="imagem2" src="../db/arquivos/<?=$imagem?>" alt="">
                        </div>
                    </div>
                </form>

                <form id="form" class="form" action="<?=$action?>" method="post" enctype="multipart/form-data">
                
                    <div class="linha">
                        <div class="linha_titulo">Filial</div>
                        <div class="linha_entrada_dados">
                            <input class="caixa_dados" type="text" name="txtFilial" value="<?=$numeroFilial?>" required data-type="number" maxlength="5">
                        </div>
                    </div>                

                    <div class="linha">
                        <div class="linha_titulo">Rua</div>
                        <div class="linha_entrada_dados">
                            <input class="caixa_dados" type="text" name="txtRua" value="<?=$rua?>" required>
                        </div>
                    </div>

                    <div class="linha">
                        <div class="linha_titulo">Número</div>
                        <div class="linha_entrada_dados">
                            <input class="caixa_dados" type="text" name="txtNumero" value="<?=$numero?>" required data-type="number" maxlength="9"> 
                        </div>
                    </div>

                    <div class="linha">
                        <div class="linha_titulo">Bairro</div>
                        <div class="linha_entrada_dados">
                            <input class="caixa_dados" type="text" name="txtBairro" value="<?=$bairro?>" required data-type="text">
                        </div>
                    </div>

                    <div class="linha">
                        <div class="linha_titulo">Cep</div>
                        <div class="linha_entrada_dados">
                            <input class="caixa_dados" id="cep" type="text" name="txtCep" data-type="cep" value="<?=$cep?>" required maxlength="9">
                        </div>
                    </div>

                    <div class="linha">
                        <div class="linha_titulo">Hora de Abrir</div>
                        <div class="linha_entrada_dados centro">
                            <input class="tempo" type="time" name="timeAberto" value="<?=$horaAberto?>" required>
                        </div>
                    </div>

                    <div class="linha">
                        <div class="linha_titulo">Hora de Fechar</div>
                        <div class="linha_entrada_dados centro"> 
                            <input class="tempo" type="time" name="timeFechado" value="<?=$horaFechado?>" required>
                        </div>
                    </div> 

                    <div class="linha">
                        <div class="linha_titulo">Modo</div>
                        <div class="linha_entrada_dados centro">
                            <input type="radio" name="rdoModo" value="1" <?php if($modo == '1') echo('checked')?> required>Ativado
                            <input type="radio" name="rdoModo" value="0" <?php if($modo == '0') echo('checked')?> required>Desativado
                        </div>
                    </div>

                    <div class="linha btn">
                        <input class="btnSalvar" name="btnEnviarLoja" type="submit" value="Salvar">
                    </div>
                </form>
            </div>
            
            
            <div id="tabela_conteudo">
                <table>
                    <tr>
                        <td colspan="7" class="titulo_conteudo">Dados da Pagina de Lojas</td> 
                    </tr>                    
                    <tr>
                       <td>N.Filial</td>
                       <td>rua</td> 
                       <td>cep</td>                    
                       <td>Aberto</td>
                       <td>Fechado</td>
                       <td>modo</td>
                       <td>Opções</td>
                    </tr>

                    <?php
                    
                        $sql = "select * from tbllojas";

                        $selectLoja = mysqli_query($conex, $sql);

                        while($rsLoja = mysqli_fetch_assoc($selectLoja))
                        {

                            $estado = $rsLoja['modo'];
                    ?>

                    <tr>
                        <td><?=$rsLoja['numeroFilial']?></td>
                        <td><?=$rsLoja['rua']?></td>
                        <td><?=$rsLoja['cep']?></td>
                        <td><?=$rsLoja['horaAberto']?></td>
                        <td><?=$rsLoja['horaFechado']?></td>
                        <td>
                            <form class="estadoContas" method="POST" onclick="updateEstadoLoja(<?=$rsLoja['idLoja']?>,<?=$rsLoja['modo']?>);">
                                <input class="estadoConta" type="radio" name="rdoEstado" value="1"
                                <?php if($estado == '1') echo('checked')?>>Ativada   
                                <input class="estadoConta" type="radio" name="rdoEstado" value="0"
                                <?php if($estado == '0') echo('checked')?>>Desativada
                            </form>
                        </td>
                        <td>
                            <div class="container_img">

                                <a onclick="return confirm('Deseja realmente excluir esse registro?');" 
                                    href="../db/deleteLoja.php?modo=excluirLoja&idLoja=
                                    <?=$rsLoja['idLoja']?>&imagem=<?=$rsLoja['imagem']?>">
                                    <div class="excluir"></div>
                                </a>        

                                <a href="cmsLojas.php?modo=consutaEditar&id=<?=$rsLoja['idLoja']?>">
                                    <div class="editar"></div>
                                </a>

                                <div class="visualizar" onclick="visualizarLoja(<?=$rsLoja['idLoja']?>);"></div>
                            </div>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>

        </div>

        <?php rodape()?>
        
    </body>
</html>