<?php

    $id = 0;
    $titulo = null;
    $imagem = null;
    $texto = null;

    $action = "../db/insertCuriosidades.php?modo=inserir";

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

                $sql = "select * from tblcuriosidades where idCuriosidade = " .$id;

                $selectCuriosidades = mysqli_query($conex, $sql);
    
                if($rslistCuriosidade = mysqli_fetch_assoc($selectCuriosidades)){
                    
                    $titulo = $rslistCuriosidade['titulo'];
                    $imagem = $rslistCuriosidade['imagem'];
                    $texto = $rslistCuriosidade['texto'];
    
                    $action = "../db/updateCuriosidades.php?modo=atualizar&id=".$rslistCuriosidade['idCuriosidade']."&imagem=".$rslistCuriosidade['imagem'];
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

                <form name="frmfoto" id="frmFoto" action="../db/uploadImagemCuriosidade.php" method="post" enctype="multipart/form-data">
                    <div class="linha_titulo_container">Página Curiosidades</div>
                    <div class="linha">
                        <div class="linha_titulo">Imagem</div>
                        <div class="linha_entrada_dados alinhar">
                            <input id="foto" type="file" name="fleImagem" accept="image/jpeg, image/png, image/jpg" required>
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
                        <input class="btnSalvar" name="btnEnviarCuriosidade" type="submit" value="Salvar">
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
                    
                        $sql = "select * from tblcuriosidades";

                        $selectCuriosidades = mysqli_query($conex, $sql);

                        while($rsCuriosidade = mysqli_fetch_assoc($selectCuriosidades))
                        {
                    ?>

                    <tr>
                        <td><?=$rsCuriosidade['titulo']?></td>
                        <td><?=$rsCuriosidade['texto']?></td>
                        <td>
                            <img src="../db/arquivos/<?=$rsCuriosidade['imagem']?>" class="imagem">
                        </td>
                        <td>
                            <div class="container_img">

                                <a onclick="return confirm('Deseja realmente excluir essa curiosidade?');" 
                                    href="../db/deleteCuriosidade.php?modo=excluirCuriosidade&idCuriosidade=
                                    <?=$rsCuriosidade['idCuriosidade']?>&imagem=<?=$rsCuriosidade['imagem']?>">
                                    <div class="excluir"></div>
                                </a>        

                                <a href="cmsCuriosidades.php?modo=consutaEditar&id=<?=$rsCuriosidade['idCuriosidade']?>">
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