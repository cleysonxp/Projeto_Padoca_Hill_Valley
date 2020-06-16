<?php

    require_once('funcoes/topo.php');
    require_once('funcoes/rodape.php');
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
        <link rel="stylesheet" href="cms_css/style.css">
        <link rel="stylesheet" href="cms_css/admFaleConosco.css">
</head>
<body>

    <?php topo()?>

    <div class="container_corpo">

        <div class="container_corpo_titulo">Adm Fale Conosco</div>

        <div id="container_consulta">
            <table id="tblConsulta">
                <tr class="linha_titulo">
                    <td colspan="6"><h1>Consulta de clientes</h1></td>
                </tr>
                <tr class="linha">
                    <td class="coluna">Nome</td>
                    <td class="coluna">Celular</td>
                    <td class="coluna">Email</td>
                    <!-- <td class="coluna">Profissão</td> -->
                    <td class="coluna">Tipo de Mensagem</td>
                    <td class="coluna">Opções</td>
                </tr>

                <?php
                
                    $sql = "
                        select tblclientes.idCliente, tblclientes.nome as nomeCliente, tblclientes.celular, tblclientes.email,
                        tbltipomensagem.tipo_mensagem from tblclientes, tbltipomensagem
                        where tbltipomensagem.idTipoMensagem = tblclientes.idTipoMensagem 
                        order by tblclientes.idCliente desc
                    ";

                    $selectClientes = mysqli_query($conex, $sql);

                    while ($rsClientes = mysqli_fetch_assoc($selectClientes))
                    {
                ?>

                <tr class="linha">
                    <td class="coluna"><?=$rsClientes['nomeCliente']?></td>
                    <td class="coluna"><?=$rsClientes['celular']?></td>
                    <td class="coluna"><?=$rsClientes['email']?></td>
                    <td class="coluna"><?=$rsClientes['tipo_mensagem']?></td>
                    <td class="coluna">
                        <div class="tblImagem">

                            <a onclick="return confirm('Deseja realmente excluir o registro?');" 
                            href="../db/deleteCliente.php?modo=excluir&id=<?=$rsClientes['idCliente']?>">
                                <div class="excluir"></div>
                            </a>                            
                            
                            <div class="editar"></div>
                        </div>
                    </td>                    
                </tr>
                <?php
                }?>
                <tr class="linha">
                    <td class="coluna"></td>
                    <!-- <td class="coluna"></td> -->
                    <td class="coluna"></td>
                    <td class="coluna"></td>
                    <td class="coluna"></td>
                    <td class="coluna"></td>
                </tr>

            </table>
        </div>
        

    </div>

    <?php rodape()?>
    
</body>
</html>