<?php

    if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'atualizar')
        {

            require_once('conexao.php');
            $conex = conexaoMysql();

            if(isset($_POST['btnEnviarUsuario']))
            {

                $id = $_GET['id'];
                $nome = $_POST['txtNome'];
                $celular = $_POST['txtCelular'];
                $email = $_POST['txtEmail'];
                $nomeLogin = $_POST['txtNomeLogin'];
                $senha = $_POST['txtSenha'];
                $idPermissao = $_POST['sltPermissao'];
                $estadoConta = $_POST['rdoEstadoConta'];

                $sql = " update tblusuarios set
                            nome = '".$nome."',
                            celular = '".$celular."',
                            email = '".$email."',
                            nomeLogin = '".$nomeLogin."',
                            senha = '".$senha."',
                            idPermissao = '".$idPermissao."',
                            estadoConta = '".$estadoConta."'

                            where idUsuario = " .$id;

                // echo($sql);
                if(mysqli_query($conex, $sql))
                echo("<script>
                            alert('Usuário atualizado com sucesso!') ;
                            location.href = '../cms/admUsuarios.php';
                        </script>");
                else
                    echo("
                    <script> 
                        alert('Erro ao executar o script!') ;
                        // location.href = '../cms/adicionarPermissoes';
                        // Permite voltar a pagina anterior sem perder
                        // os dados digitados no formulario
                        window.history.back();
                    </script>
                    ");
            }
        }
    }

?>