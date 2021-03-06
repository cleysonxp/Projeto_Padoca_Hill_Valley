<?php

    $id = 0;
    $titulo = null;
    $imagem = null;
    $texto = null;

    $action = "../db/insertEmpresa.php?modo=inserir";

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

                $sql = "select * from tblempresa where idEmpresa = " .$id;

                $selectEmpresa = mysqli_query($conex, $sql);
    
                if($rslistEmpresa = mysqli_fetch_assoc($selectEmpresa)){
                    
                    $titulo = $rslistEmpresa['titulo'];                    
                    $texto = $rslistEmpresa['texto'];
                    $imagem = $rslistEmpresa['imagem'];
    
                    // $action2 = "../db/updateEmpresa.php";
                    $action = "../db/updateEmpresa.php?modo=atualizar&id=".$rslistEmpresa['idEmpresa']."&imagem=".$rslistEmpresa['imagem'];
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
        <script>
            $(document).ready(function(){


                $('#foto').live('change',function(){
                    $('#frmFoto').ajaxForm({
                        target: '#imagem'
                    }).submit();
                });

            });

            
        </script>
    </head>
    <body>
        
        
        <?php menu()?>

        <div class="container_corpo">
            <a href="admConteudo.php">
                <div class="flecha" alt="voltar">
                    🡨
                </div>
            </a>

            
            <div class="container_conteudo_dados">

                <form name="frmFoto" id="frmFoto" action="../db/uploadImagemLoja.php" method="post" enctype="multipart/form-data">
                    <div class="linha_titulo_container">Página Sobre a Empresa</div>
                    <div class="linha">
                        <div class="linha_titulo">Imagem</div>
                        <div class="linha_entrada_dados alinhar">
                            <input required id="foto" type="file" name="fleImagem" accept="image/jpeg, image/png, image/jpg" >
                         </div>
                    </div>
                    <div class="linha_Imagem">
                        <div id="imagem">
                            <img class="imagem2" src="../db/arquivos/<?=$imagem?>" alt="">
                        </div>
                    </div>
                </form>

                <form action="<?=$action?>" method="post" enctype="multipart/form-data">
                    
                    <div class="linha">
                        <div class="linha_titulo">Titulo</div>
                        <div class="linha_entrada_dados">
                            <input class="caixa_dados" type="text" name="txtTitulo" value="<?=$titulo?>" required>
                        </div>
                    </div>

                    <div class="linha_texto">
                        <div class="linha_titulo_texto">Texto</div>
                        <div class="linha_entrada_texto">
                            <textarea class="areaTexto" name="txtTexto" id="" cols="30" rows="10" required><?=$texto?></textarea>
                        </div>
                    </div>

                    <div class="linha btn">
                        <input class="btnSalvar" name="btnEnviarEmpresa" type="submit" value="Salvar">
                    </div>
                </form>
            </div>
            
            
            <div id="tabela_conteudo">
                <table>
                    <tr>
                        <td colspan="4" class="titulo_conteudo">Dados da Pagina de Curiosidades</td> 
                    </tr>                    
                    <tr>
                       <td>Titulo</td>
                       <td>Texto</td> 
                       <td>Imagem</td>                    
                       <td>Opções</td>
                    </tr>

                    <?php
                    
                        $sql = "select * from tblempresa";

                        $selectEmpresa = mysqli_query($conex, $sql);

                        while($rsEmpresa = mysqli_fetch_assoc($selectEmpresa))
                        {
                    ?>

                    <tr>
                        <td><?=$rsEmpresa['titulo']?></td>
                        <td><?=$rsEmpresa['texto']?></td>
                        <td>
                            <img src="../db/arquivos/<?=$rsEmpresa['imagem']?>" class="imagem">
                        </td>
                        <td>
                            <div class="container_img">

                                <a onclick="return confirm('Deseja realmente excluir essas informacões?');" 
                                    href="../db/deleteEmpresa.php?modo=excluirEmpresa&idEmpresa=
                                    <?=$rsEmpresa['idEmpresa']?>&imagem=<?=$rsEmpresa['imagem']?>">
                                    <div class="excluir"></div>
                                </a>        

                                <a href="cmsEmpresa.php?modo=consutaEditar&id=<?=$rsEmpresa['idEmpresa']?>">
                                    <div class="editar"></div>
                                </a>

                                
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