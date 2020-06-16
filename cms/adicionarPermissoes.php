<?php
    $idPermissao = null;
    $nome = null;
    $acessoConteudo = null;
    $descricao = null;
    $acessoProdutos = null;
    $acessoUsuarios = null;
    $acessoFaleConosco = null;
    
    

    $action = "../db/inserirPermissao.php?modo=inserir";


    require_once('../db/conexao.php');

    $conex = conexaoMysql();

    if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'consutaEditar')
        {
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                
                $sql = "select * from tblpermissoes";
                
                $selectDados = mysqli_query($conex, $sql);
                

                if($rsListPermissoes = mysqli_fetch_assoc($selectDados)){
                    
                    $idPermissao = $rsListPermissoes['idPermissao'];
                    $nome = $rsListPermissoes['nome'];
                    $acessoConteudo = $rsListPermissoes['acessoConteudo'];
                    $acessoFaleConosco = $rsListPermissoes['acessoFaleConosco'];
                    $acessoUsuarios = $rsListPermissoes['acessoUsuarios'];
                    $acessoProdutos = $rsListPermissoes['acessoProdutos'];
                    $descricao = $rsListPermissoes['descricao'];

                    $action = "../db/updatePermissao.php?modo=atualizar&id=".$rsListPermissoes['idPermissao'];
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Padoka Hill Valley</title>
        <link rel="stylesheet" href="cms_css/admUsuarios.css">
        <link rel="stylesheet" href="cms_css/adicionarPermissoes.css">
    </head>
    <body>

        <div class="container_formulario">
            
            <form name="formulario_inserir_permissoes" action="<?=$action?>" method="post">
                <div class="formulario_permissoes">
                    <div class="form_titulo">
                        <h1>Adicionar Novas Permissões</h1>
                    </div>
                    <div class="linha_formulario">
                        <div class="tituloInput">Nome da Permissão</div>
                        <div class="linha_input">
                            <input class="caixa" type="text" name="txtNome" value="<?=$nome?>">
                        </div>
                    </div>

                    <div class="linha_formulario">
                        <div class="tituloInput">Acesso ao Conteúdo</div>
                        <div class="linha_input radio">
                            <input type="radio" name="rdoConteudo" value="1" <?php if($acessoConteudo == '1') echo('checked')?>>Sim
                            <input type="radio" name="rdoConteudo" value="0" <?php if($acessoConteudo == '0') echo('checked')?>>Não
                        </div>
                    </div>
                    <div class="linha_formularioFC">
                        <div class="tituloInputFC">Acesso ao Fale Conosco</div>
                        <div class="linha_inputFC radio">
                            <input type="radio" name="rdoFaleConosco" value="1" <?php if($acessoFaleConosco == '1') echo('checked')?>>Sim
                            <input type="radio" name="rdoFaleConosco" value="0" <?php if($acessoFaleConosco == '0') echo('checked')?>>Não
                        </div>
                    </div>
                    <div class="linha_formulario">
                        <div class="tituloInput">Acesso ao Usuários</div>
                        <div class="linha_input radio">
                            <input type="radio" name="rdoUsuario" value="1" <?php if($acessoUsuarios == '1') echo('checked')?>>Sim
                            <input type="radio" name="rdoUsuario" value="0" <?php if($acessoUsuarios == '0') echo('checked')?>>Não
                        </div>
                    </div>
                    <div class="linha_formulario">
                        <div class="tituloInput">Acesso a Produtos</div>
                        <div class="linha_input radio">
                            <input type="radio" name="rdoProduto" value="1" <?php if($acessoProdutos == '1') echo('checked')?>>Sim
                            <input type="radio" name="rdoProduto" value="0" <?php if($acessoProdutos == '0') echo('checked')?>>Não
                        </div>
                    </div>
                    <div class="linha_formulario_desc">
                        <div class="descTitulo">Descrição</div>
                        <div class="linha_input_desc">
                            <textarea class="areaTexto" name="txtDesc" cols="50" rows="7" required><?=$descricao?></textarea>
                        </div>
                    </div>
                    <div class="linha_formulario btn">
                        <input class="botaoPermissoes" type="submit" value="Salvar" name="btnEnviarPermissoes">
                    </div>

                </div>
            </form>

            <div id="permissoes">
                <table>
                    <tr>
                        <td colspan="3" class="tituloPermissao">Permissões</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>Descrição</td>
                        <td>Opções</td>
                    </tr>

                    <?php

                        $sql = " select idPermissao, nome, descricao from tblpermissoes order by nome";

                        $selectPermissoes = mysqli_query($conex, $sql);

                        while ($rsPermissoes = mysqli_fetch_assoc($selectPermissoes) )
                        {
                    ?>

                    <tr>
                        <td><?=$rsPermissoes['nome']?></td>
                        <td><?=$rsPermissoes['descricao']?></td>
                        <td>
                            <div class="container_img">

                                <a onclick="return confirm('Deseja realmente excluir essa permissão');" 
                                    href="../db/deletePermissao.php?modo=excluirPermissao&idPermissao=<?=$rsPermissoes['idPermissao']?>">
                                    <div class="excluir"></div>
                                </a>                          
                                <a href="adicionarPermissoes.php?modo=consutaEditar&id=<?=$rsPermissoes['idPermissao']?>">
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
    
    </body>
</html>