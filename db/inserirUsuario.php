<?php

    if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'inserir')
        {
            require_once('conexao.php');

            $conex = conexaoMysql();

            if(isset($_POST['btnEnviarUsuario']))
            {
                $nome = $_POST['txtNome'];
                $celular = $_POST['txtCelular'];
                $email = $_POST['txtEmail'];
                $nomeLogin = $_POST['txtNomeLogin'];
                $senha = $_POST['txtSenha'];
                $nivelpermissao = $_POST['sltPermissao'];
                $estadoConta = $_POST['rdoEstadoConta'];

                $sql = "insert into tblusuarios (nome, celular,email, nomeLogin, senha, idPermissao, estadoConta)
                value ('".$nome."', '".$celular."', '".$email."', '".$nomeLogin."', '".$senha."', '".$nivelpermissao."','".$estadoConta."')";

                // echo($sql);

                if(mysqli_query($conex, $sql))
                echo("<script> alert('Registro inserido com sucesso!') ;
                            location.href = '../cms/adicionarUsuarios.php';
                        </script>");
                        else
                echo("
                    <script> 
                        alert('Erro ao executar o script!') ;
                        location.href = '../cms/adicionarUsuarios.php';
                        // Permite voltar a pagina anterior
                        window.history.back();
                    </script>
                    "); 
            }
        }
    }

?>