<?php

    if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'atualizar')
        {
            require_once('conexao.php');
            $conex = conexaoMysql();
            if(isset($_POST['btnEnviarCuriosidade']))
            {
                $titulo = $_POST['txtTitulo'];
                $texto = $_POST['txtTexto'];
                $id = $_GET['id'];
                session_start();
                $foto = $_SESSION['nomeFoto'];  
                $nomeAntigo = $_GET['imagem'];
                $sql = "update tblcuriosidades set
                        titulo = '".$titulo."',
                        imagem = '".$foto."',
                        texto = '".$texto."'
                        where idCuriosidade = " .$id;
                // echo($sql);
                if(mysqli_query($conex,$sql)){
                    if($nomeAntigo != $foto){
                        unlink('arquivos/'.$nomeAntigo);
                    }
                    echo("<script>
                    alert('Curiosidade atualizado com sucesso!') ;
                    location.href = '../cms/cmsCuriosidades.php';
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