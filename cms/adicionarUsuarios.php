<?php

    require_once('../db/conexao.php');
    $conex = conexaoMysql();

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Padoka Hill Valley</title>
        <link rel="stylesheet" href="cms_css/admUsuarios.css">
        <link rel="stylesheet" href="cms_css/adicionarUsuario.css">
    </head>
    <body>
        <div class="container_formulario">
            <form name="formulario_inserir_usuario" action="../db/inserirUsuario.php?modo=inserir" method="post">
                <div class="formulario_usuario">
                    <div class="form_titulo">
                        <h1>Adicionar Usuário</h1>
                    </div>
                    <div class="linha">
                        <div class="linha_titulo">Nome</div>
                        <div class="linha_dados">
                            <input class="caixa" type="text" name="txtNome">
                        </div>
                    </div>

                    <div class="linha">
                        <div class="linha_titulo">Celular</div>
                        <div class="linha_dados">
                            <input class="caixa" type="text" name="txtCelular">
                        </div>
                    </div>

                    <div class="linha">
                        <div class="linha_titulo">Email</div>
                        <div class="linha_dados">
                            <input class="caixa" type="text" name="txtEmail">
                        </div>
                    </div>

                    <div class="linhaNP">
                        <div class="linha_tituloNP">Nome de Login</div>
                        <div class="linha_dados">
                            <input class="caixaNP" type="text" name="txtNomeLogin">
                        </div>
                    </div>

                    <div class="linha">
                        <div class="linha_titulo">Senha</div>
                        <div class="linha_dados">
                            <input class="caixa" type="text" name="txtSenha">
                        </div>
                    </div>

                    <div class="linhaNP">
                        <div class="linha_tituloNP">Nível de Permissão</div>
                        <div class="linha_dados">
                            <select class="slt" name="sltPermissao">
                                <option value="" selected>Selecione o Nível de Permissão</option>
                                <?php
                                
                                $sql = "select * from tblpermissoes order by nome;";

                                $selectNivelPermissao = mysqli_query($conex, $sql);
                                

                                while( $rsNivelPermissao = mysqli_fetch_assoc($selectNivelPermissao))
                                {
                                ?>
                                <option value="<?=$rsNivelPermissao['idPermissao']?>">
                                    <?=$rsNivelPermissao['nome']?>
                                </option>                            
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="linha_botao">
                        <input class="btn" type="submit" value="Salvar" name="btnEnviarUsuario">
                    </div>
                </div>
            </form>
        
            <div id="usuarios">
                <table>
                    <tr>
                        <td colspan="5" class="tituloUsuario">Usuários</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>Celular</td>
                        <td>Email</td>
                        <td>Nivel</td>
                        <td>Opções</td>
                    </tr>

                    <?php
                    
                        $sql = "select idUsuario,tblusuarios.nome as nomeUsuario, tblusuarios.celular, 
                        tblusuarios.email, tblpermissoes.nome as nivel from tblusuarios, tblpermissoes 
                        where tblpermissoes.idPermissao = tblusuarios.idPermissao
                        order by tblusuarios.idUsuario desc";

                        $selectUsuario = mysqli_query($conex, $sql);

                        while($rsUsuario = mysqli_fetch_assoc($selectUsuario))
                        {
                    ?>
                    <tr>
                        <td><?=$rsUsuario['nomeUsuario']?></td>
                        <td><?=$rsUsuario['celular']?></td>
                        <td><?=$rsUsuario['email']?></td>
                        <td><?=$rsUsuario['nivel']?></td>
                        <td>
                            <div class="container_img">

                                <a onclick="return confirm('Deseja realmente excluir esse usuário?');" 
                                    href="../db/deleteUsuario.php?modo=excluirUsuario&idUsuario=<?=$rsUsuario['idUsuario']?>">
                                    <div class="excluir"></div>
                                </a>        

                                <a href="adicionarPermissoes.php?modo=consutaEditar&id=<?=$rsPermissoes['idPermissao']?>">
                                    <div class="editar"></div>
                                </a>

                                <div class="visualizar"></div>
                                
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