<?php

    if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'excluirUsuario')
        
        require_once('conexao.php');

        $conex = conexaoMysql();

        if(isset($_GET['idUsuario']))
        {
            $id = $_GET['idUsuario'];

            $sql = "delete from tblUsuarios where idUsuario = " .$id;
            echo($sql);
            if(mysqli_query($conex, $sql))

            header('location:../cms/adicionarUsuarios.php');
        }
    }
?>