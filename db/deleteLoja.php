<?php

    if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'excluirLoja')
        
        require_once('conexao.php');
        $conex = conexaoMysql();

        if(isset($_GET['idLoja']))
        {
            $id = $_GET['idLoja'];
            $sql = "delete from tblLojas where idLoja = ". $id;
            echo($sql);
            if(mysqli_query($conex, $sql)){
                unlink('arquivos/'.$_GET['imagem']);

                header('location:../cms/cmsLojas.php');
            }
        }
    }
?>