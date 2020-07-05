<?php

    if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'inserir')
        {
            require_once('conexao.php');
            $conex = conexaoMysql();
            if(isset($_POST['btnEnviarEmpresa']))
            {
                $titulo = $_POST['txtTitulo'];
                $texto = $_POST['txtTexto'];
                session_start();
                $foto  = $_SESSION['nomeFoto'];
                $sql = "insert into tblempresa
                                    ( titulo,texto, imagem) 
                                    values ('".$titulo."', '".$texto."','".$foto."')";
                // echo($sql);
                if(mysqli_query($conex, $sql))
                    echo("<script>
                                alert('Registro inserido com sucesso!') ;
                                location.href = '../cms/cmsEmpresa.php';
                            </script>");
                else
                    echo("
                    <script> 
                        alert('Erro ao executar o script!') ;
                        window.history.back();
                    </script>
                    ");
            }
        }
    }
?>