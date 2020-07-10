<?php

    if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'excluirEmpresa')
        
        require_once('conexao.php');
        $conex = conexaoMysql();

        if(isset($_GET['idEmpresa']))
        {
            $id = $_GET['idEmpresa'];
            $sql = "delete from tblempresa where idEmpresa = ". $id;
            // echo($sql);
            if(mysqli_query($conex, $sql)){
                unlink('arquivos/'.$_GET['imagem']);

                header('location:../cms/cmsEmpresa.php');
            }
        }
    }
?>