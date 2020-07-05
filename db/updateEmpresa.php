<?php

    if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'atualizar')
        {
            require_once('conexao.php');
            $conex = conexaoMysql();
            if(isset($_POST['btnEnviarEmpresa']))
            {
                $titulo = $_POST['txtTitulo'];
                $texto = $_POST['txtTexto'];
                $id = $_GET['id'];
                session_start();
                $foto = $_SESSION['nomeFoto'];                
                $nomeAntigo = $_GET['imagem'];
                $sql = "update tblempresa set
                        titulo = '".$titulo."',
                        texto = '".$texto."',
                        imagem = '".$foto."'
                        where idEmpresa = " .$id;
                // echo($sql);
                if(mysqli_query($conex,$sql)){
                    if($nomeAntigo != $foto){
                        unlink('arquivos/'.$nomeAntigo);
                    }
                    echo("<script>
                    alert('Curiosidade atualizado com sucesso!') ;
                    location.href = '../cms/cmsEmpresa.php';
                </script>");      
                }

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