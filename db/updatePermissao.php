<?php

    if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'atualizar')
        {
            
            require_once('conexao.php');
            $conex = conexaoMysql();

            if(isset($_POST['btnEnviarPermissoes']))
            {
                $id = $_GET['id'];
                $nome = $_POST['txtNome'];
                $conteudo = $_POST['rdoConteudo'];
                $faleConosco = $_POST['rdoFaleConosco'];
                $usuario = $_POST['rdoUsuario'];
                $produto = $_POST['rdoProduto'];
                $descricao = $_POST['txtDesc'];

                $sql = "update tblpermissoes set
                            
                            nome = '".$nome."',
                            acessoConteudo = '".$conteudo."',
                            acessoFaleConosco = '".$faleConosco."',
                            acessoUsuarios = '".$usuario."',
                            acessoProdutos = '".$produto."',
                            descricao = '".$descricao."'

                            where idPermissao = " . $id;

                            

                if(mysqli_query($conex, $sql))
                echo("<script>
                            alert('Permissão atualizada com sucesso!') ;
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