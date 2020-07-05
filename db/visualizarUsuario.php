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
                    select tblusuarios.nome as nomeUsuario,tblusuarios.celular,
                    tblusuarios.email, tblusuarios.nomeLogin, tblusuarios.senha,
                    tblusuarios.estadoConta,
                    tblpermissoes.nome as nivel 
                    from tblusuarios, tblpermissoes where tblpermissoes.idPermissao = tblusuarios.idPermissao
                    and tblusuarios.idUsuario = ".$id;

                $selectUsuario = mysqli_query($conex, $sql);

                if($rsUsuarios = mysqli_fetch_assoc($selectUsuario))
                {
                    $nome = $rsUsuarios['nomeUsuario'];
                    $celular = $rsUsuarios['celular'];
                    $email = $rsUsuarios['email'];
                    $nomeLogin = $rsUsuarios['nomeLogin'];
                    $senha = $rsUsuarios['senha'];
                    $permissao = $rsUsuarios['nivel'];
                    $estadoConta = $rsUsuarios['estadoConta'];
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
        <link rel="stylesheet" href="cms_css/adicionarUsuario.css">
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
            <div id="fechar">
                <a href="#" id="fechar">
                    <div class="fechar">x</div>    
                </a>
            </div>
            
            <div class="visualizar_titulo" >visualizar dados do usuário</div>
            <table>
                <tr>
                    <td>Nome</td>
                    <td><?=$nome?></td>
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
                    <td>Nome de Login</td>
                    <td><?=$nomeLogin?></td>
                </tr>
                <tr>
                    <td>Senha</td>
                    <td><?=$senha?></td>
                </tr>
                <tr>
                    <td>Nivel de Permissão</td>
                    <td><?=$permissao?></td>
                </tr>
                <tr>
                    <td>Estado da Conta</td>
                    <td><?=$estadoConta?></td>
                </tr>
            </table>
        </div>
    </body>
</html>