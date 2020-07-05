<?php

    if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'excluirCuriosidade')
        
        require_once('conexao.php');

        $conex = conexaoMysql();

        if(isset($_GET['idCuriosidade']))
        {
            $id = $_GET['idCuriosidade'];

            $sql = "delete from tblcuriosidades where idCuriosidade = ". $id;
            // echo($sql);
            if(mysqli_query($conex, $sql)){
                unlink('arquivos/'.$_GET['imagem']);

                header('location:../cms/cmsCuriosidades.php');
            }

            
        }
    }
?>