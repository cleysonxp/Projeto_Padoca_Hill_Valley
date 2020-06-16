<?php

    if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'inserir')
        {
            require_once('conexao.php');

            $conex = conexaoMysql();

            if(isset($_POST['btnEnviarPermissoes']))
            {
                $nome = $_POST['txtNome'];
                $conteudo = $_POST['rdoConteudo'];
                $faleConosco = $_POST['rdoFaleConosco'];
                $usuario = $_POST['rdoUsuario'];
                $produto = $_POST['rdoProduto'];
                $descricao = $_POST['txtDesc'];


                $sql = "insert into tblpermissoes (nome, acessoConteudo, acessoFaleConosco, acessoUsuarios, acessoProdutos, descricao) 
                values ('".$nome."','".$conteudo."','".$faleConosco."','".$usuario."','".$produto."','".$descricao."')";

                // echo($sql);

                if(mysqli_query($conex, $sql))
                echo("<script> alert('Registro inserido com sucesso!') ;
                            location.href = '../cms/adicionarPermissoes.php';
                        </script>");
            else
                echo("
                    <script> 
                        alert('Erro ao executar o script!') ;
                        // location.href = '../index.php';
                        // Permite voltar a pagina anterior sem perder
                        // os dados digitados no formulario
                        window.history.back();
                    </script>
                    ");
            }
        }
    }

?>