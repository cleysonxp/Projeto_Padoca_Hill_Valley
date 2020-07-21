<?php

    require_once('funcoes/topo.php');
    require_once('funcoes/menu.php');
    require_once('funcoes/rodape.php');
    require_once('../db/conexao.php');
    include('../db/verificaLogin.php');

    $conex = conexaoMysql();

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Padoka Hill Valley</title>
        <link rel="stylesheet" href="cms_css/style.css">
        <link rel="stylesheet" href="cms_css/admFaleConosco.css">
        <link rel="shortcut icon" href="../imagens/LogoOficial.png">
        <script src="../js/jquery2.js"></script>

        <script>
            $(document).ready(function(){
                // alert("ok");
                $('.visualizar').click(function(){
                    $('#modal').fadeIn(1000);
                });
            });

            function visualizarCliente (idCliente)
            {
                $.ajax({
                    type: "POST",
                    url: "../db/visualizarCliente.php",
                    data: {modo:'visualizar',id:idCliente},
                    success: function(dados) {
                        $('#modalConteudo').html(dados);
                    }
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
        

        <div class="container_corpo_titulo">Adm Fale Conosco</div>
        <div class="filtro">
            <form action="admFaleConosco.php?modo=filtrar" method="post">
                <select class="select" name="sltTipoMensagem">
                    <option class="letra" value="" selected>Selecione o tipo da mensagem</option>
                    <?php
                    
                        $sql = "select * from tbltipomensagem order by tipo_mensagem";

                        $selectTipoMensagem = mysqli_query($conex, $sql);
                                

                        while( $rsTipoMensagem = mysqli_fetch_assoc($selectTipoMensagem))
                        {
                        ?>
                        <option class="letra" value="<?=$rsTipoMensagem['idTipoMensagem']?>">
                            <?=$rsTipoMensagem['tipo_mensagem']?>
                        </option>                            
                        <?php
                        }
                        ?>
                </select>
                <input class="btnFiltrar" type="submit" name="btnFiltro" value="Filtrar">
            </form>
        </div>
        <div id="container_consulta">
            <table>
                <tr>
                    <td colspan="6"><h1>Consulta de clientes</h1></td>
                </tr>
                <tr>
                    <td>Nome</td>
                    <td>Celular</td>
                    <td>Email</td>
                    <td>Profissão</td>
                    <td>Tipo de Mensagem</td>
                    <td>Opções</td>
                </tr>

                <?php
                if(isset($_GET['modo']))
                {
                    if($_GET['modo'] == 'filtrar')
                    {
                        // require_once('../conexao.php');
            
                        $conex = conexaoMysql();
            
                        if(isset($_POST['btnFiltro']))
            
                        $tipoMensagem = $_POST['sltTipoMensagem'];
            
                        $sql = "select tblclientes.idCliente, tblclientes.nome as nomeCliente, tblclientes.celular, tblclientes.email,
                        tblclientes.profissao, tbltipomensagem.tipo_mensagem from tblclientes, tbltipomensagem
                        where tbltipomensagem.idTipoMensagem = tblclientes.idTipoMensagem and tbltipomensagem.idTipoMensagem = " .$tipoMensagem. " order by nomeCliente asc";
            
                        // mysqli_fetch_assoc($conex, $sql);
                    }
                }else{

                
                
                    $sql = "
                        select tblclientes.idCliente, tblclientes.nome as nomeCliente, tblclientes.celular, tblclientes.email,
                        tblclientes.profissao, tbltipomensagem.tipo_mensagem from tblclientes, tbltipomensagem
                        where tbltipomensagem.idTipoMensagem = tblclientes.idTipoMensagem 
                        order by tblclientes.nome asc
                    ";
                    }

                    $selectClientes = mysqli_query($conex, $sql);

                    while ($rsClientes = mysqli_fetch_assoc($selectClientes))
                    {
                
                ?>

                <tr>
                    <td><?=$rsClientes['nomeCliente']?></td>
                    <td><?=$rsClientes['celular']?></td>
                    <td><?=$rsClientes['email']?></td>
                    <td><?=$rsClientes['profissao']?></td>
                    <td><?=$rsClientes['tipo_mensagem']?></td>
                    <td>
                        <div class="tblImagem">

                            <a onclick="return confirm('Deseja realmente excluir o registro?');" 
                            href="../db/deleteCliente.php?modo=excluir&id=<?=$rsClientes['idCliente']?>">
                                <div class="excluir"></div>
                            </a>                            
                            
                            <div class="visualizar" onclick="visualizarCliente(<?=$rsClientes['idCliente']?>);"></div>
                        </div>
                    </td>                    
                </tr>
                <?php
                }?>

            </table>
        </div>
        

    </div>

    <?php rodape()?>
    
</body>
</html>