<?php

    $idUsuario = 0;
    $idPermissao = 0;
    $nome = null;
    $celular = null;
    $email = null;
    $nomeLogin = null;
    $senha = null;
    $nivel = null;
    $estadoConta = null;

    $action = "../db/inserirUsuario.php?modo=inserir";
    
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

                $sql = "select tblusuarios.*, tblpermissoes.nome as nivel 
                from tblusuarios, tblpermissoes 
                where tblPermissoes.idPermissao = tblusuarios.idPermissao 
                and tblusuarios.idUsuario = " . $id;

                $selectDados = mysqli_query($conex, $sql);

                if($rsListUsuario = mysqli_fetch_assoc($selectDados)){

                    // $idUsuario = 0;
                    $idUsuario = $rsListUsuario['idUsuario'];
                    $idPermissao = $rsListUsuario['idPermissao'];
                    $nome = $rsListUsuario['nome'];
                    $celular = $rsListUsuario['celular'];
                    $email = $rsListUsuario['email'];
                    $nomeLogin = $rsListUsuario['nomeLogin'];
                    $senha = $rsListUsuario['senha'];
                    $nivel = $rsListUsuario['nivel'];
                    $estadoConta = $rsListUsuario['estadoConta'];

                    $action = "../db/updateUsuario.php?modo=atualizar&id=".$rsListUsuario['idUsuario'];
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
        <link rel="stylesheet" href="cms_css/style.css">
        <link rel="stylesheet" href="cms_css/admUsuarios.css">
        <link rel="stylesheet" href="cms_css/adicionarUsuario.css">
        <link rel="shortcut icon" href="../imagens/LogoOficial.png">
        <script src="../js/jquery2.js"></script>
        <script defer src="../js/masks.js" type="module"></script>

        <script>
            $(document).ready(function(){
                // alert("ok");
                $('.visualizar').click(function(){
                    $('#modal').fadeIn(1000);
                });

                $('.rdoEstadoConta').click()
            });

            function visualizarUsuario (idUsuario)
            {
                $.ajax({
                    type: "POST",
                    url: "../db/visualizarUsuario.php",
                    data: {modo:'visualizar',id:idUsuario},
                    success: function(dados) {
                        $('#modalConteudo').html(dados);
                    }
                });
            }

            function updateEstadoConta(idUsuario,estadoConta){
                $.ajax({
                    type: "POST",
                    url:"../db/updateEstadoConta.php",
                    data:{id:idUsuario, estado:estadoConta}
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
            <a href="admUsuarios.php">
                <div class="flecha">
                    🡨
                </div>
            </a>
            <form id="form" name="formulario_inserir_usuario" action="<?=$action?>" method="post">
                <div class="formulario_usuario">
                    <div class="form_titulo">
                        <h1>Adicionar Usuário</h1>
                    </div>
                    <div class="linha">
                        <div class="linha_titulo">Nome</div>
                        <div class="linha_dados">
                            <input class="caixa" type="text" name="txtNome" value="<?=$nome?>" required data-type="text">
                        </div>
                    </div>

                    <div class="linha">
                        <div class="linha_titulo">Celular</div>
                        <div class="linha_dados">
                            <input class="caixa" type="text" name="txtCelular" value="<?=$celular?>" required data-type="cellphone"
                            maxlength="14">
                        </div>
                    </div>

                    <div class="linha">
                        <div class="linha_titulo">Email</div>
                        <div class="linha_dados">
                            <input class="caixa" type="text" name="txtEmail" value="<?=$email?>">
                        </div>
                    </div>

                    <div class="linhaNP">
                        <div class="linha_tituloNP">Nome de Login</div>
                        <div class="linha_dadosNP">
                            <input class="caixaNP" type="text" name="txtNomeLogin" value="<?=$nomeLogin?>">
                        </div>
                    </div>

                    <div class="linha">
                        <div class="linha_titulo">Senha</div>
                        <div class="linha_dados">
                            <input class="caixa" type="text" name="txtSenha" value="<?=$senha?>">
                        </div>
                    </div>

                    <div class="linhaNP">
                        <div class="linha_tituloNP">Nível de Permissão</div>
                        <div class="linha_dadosNP">
                            <select class="slt" name="sltPermissao">

                                <?php

                                    if(isset($_GET['modo']))
                                    {
                                        if($_GET['modo'] == 'consutaEditar')
                                        {
                                            ?>
                                            <option value="<?=$idPermissao?>" selected><?=$nivel?></option>
                                            <?php
                                        }
                                    } else{

                                    ?>
                                    <option value="" selected>Selecione o Nível de Permissão</option>
                                <?php
                                    }
                                $sql = "select * from tblpermissoes 
                                        where idPermissao <>".$idPermissao."
                                        order by nome;";

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

                    <div class="linhaNP">
                        <div class="linha_tituloNP">Estado da conta</div>
                        <div class="linha_dadosNP rdo">
                            <input class="rdoEstadoConta" type="radio" name="rdoEstadoConta" value="1" <?php if($estadoConta == '1') echo('checked')?> >Ativada
                            <input class="rdoEstadoConta" type="radio" name="rdoEstadoConta" value="0" <?php if($estadoConta == '0') echo('checked')?> >Desativada
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
                        <td colspan="6" class="tituloUsuario">Usuários</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>Celular</td>
                        <td>Email</td>
                        <td>Nivel</td>
                        <td>Modo</td>
                        <td>Opções</td>
                    </tr>

                    <?php
                    
                        $sql = "select idUsuario,tblusuarios.nome as nomeUsuario, tblusuarios.celular, tblusuarios.estadoConta, 
                        tblusuarios.email, tblpermissoes.nome as nivel from tblusuarios, tblpermissoes 
                        where tblpermissoes.idPermissao = tblusuarios.idPermissao
                        order by nomeUsuario";

                        $selectUsuario = mysqli_query($conex, $sql);

                        while($rsUsuario = mysqli_fetch_assoc($selectUsuario))
                        {
                            $estado = $rsUsuario['estadoConta'];
                    ?>
                    <tr>
                        <td><?=$rsUsuario['nomeUsuario']?></td>
                        <td><?=$rsUsuario['celular']?></td>
                        <td><?=$rsUsuario['email']?></td>
                        <td><?=$rsUsuario['nivel']?></td>
                        
                        <td>
                            <form class="estadoContas" method="POST" onclick="updateEstadoConta(<?=$rsUsuario['idUsuario']?>,<?=$rsUsuario['estadoConta']?>);">
                                <input class="estadoConta" type="radio" name="rdoEstado" value="1"
                                 <?php if($estado == '1') echo('checked')?> >Ativada   
                                <input class="estadoConta" type="radio" name="rdoEstado" value="0"
                                <?php if($estado == '0') echo('checked')?> >Desativada
                            </form>
                        </td>

                        <td>
                            <div class="container_img">

                                <a onclick="return confirm('Deseja realmente excluir esse usuário?');" 
                                    href="../db/deleteUsuario.php?modo=excluirUsuario&idUsuario=<?=$rsUsuario['idUsuario']?>">
                                    <div class="excluir"></div>
                                </a>        

                                <a href="adicionarUsuarios.php?modo=consutaEditar&id=<?=$rsUsuario['idUsuario']?>">
                                    <div class="editar"></div>
                                </a>

                                <div class="visualizar" onclick="visualizarUsuario(<?=$rsUsuario['idUsuario']?>);"></div>
                                
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