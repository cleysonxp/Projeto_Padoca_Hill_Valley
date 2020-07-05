<?php

    if(isset($_POST['modo']))
    {
        if($_POST['modo'] == 'visualizar')
        {
            if(isset($_POST['id']))
            {
                require_once('conexao.php');

                $conex = conexaoMysql();

                $id = $_POST['id'];

                $sql = "
                select tblclientes.nome as nomeCliente, tblclientes.telefone,
                tblclientes.celular, tblclientes.email,tblclientes.link_facebook,
                tblclientes.home_page, tblclientes.sexo, tblclientes.mensagem,
                tblclientes.profissao,tbltipomensagem.tipo_mensagem 
                from tblclientes, tbltipomensagem where
                tbltipomensagem.idTipoMensagem = tblclientes.idTipoMensagem
                and tblclientes.idCliente = ".$id;

                // echo($sql);

                $selectClientes = mysqli_query($conex, $sql);

                if($rsClientes = mysqli_fetch_assoc($selectClientes))
                {
                    $nome = $rsClientes['nomeCliente'];
                    $telefone = $rsClientes['telefone'];
                    $celular = $rsClientes['celular'];
                    $email = $rsClientes['email'];
                    $linkFacebook = $rsClientes['link_facebook'];
                    $homepage = $rsClientes['home_page'];
                    $profissao = $rsClientes['profissao'];
                    $sexo = $rsClientes['sexo'];
                    $tipoMensage = $rsClientes['tipo_mensagem'];
                    $mensagem = $rsClientes['mensagem'];
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
        <link rel="stylesheet" href="cms_css/admFaleConosco.css">
        <script src="../js/jquery2.js'"></script>
        <script>
            $(document).ready(function(){
                $('#fechar').click(function(){
                    $('#modal').fadeOut(500);
                });
            });
        </script>
         
    </head>
    <body>
        <div id="visualizar">
            <a href="#" id="fechar">
                <div class="fechar">x</div>    
            </a>
            <div class="visualizar_titulo" >visualizar Informações do Cliente</div>
            <table>
                <tr>
                    <td>Nome</td>
                    <td><?=$nome?></td>
                </tr>
                <tr>
                    <td>Telefone</td>
                    <td><?=$telefone?></td>
                </tr>
                <tr>
                    <td>Celular</td>
                    <td><?=$celular?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?=$email?></td>
                </tr>
                <tr>
                    <td>Link do Facebook</td>
                    <td><?=$linkFacebook?></td>
                </tr>
                <tr>
                    <td>Home Page</td>
                    <td><?=$homepage?></td>
                </tr>
                <tr>
                    <td>Profissão</td>
                    <td><?=$profissao?></td>
                </tr>
                <tr>
                    <td>Sexo</td>
                    <td><?=$sexo?></td>
                </tr>
                <tr>
                    <td>Tipo da Mensagem</td>
                    <td><?=$tipoMensage?></td>
                </tr>
                <tr>
                    <td>Mensagem</td>
                    <td><?=$mensagem?></td>
                </tr>
            </table>
        </div>
    </body>
</html>