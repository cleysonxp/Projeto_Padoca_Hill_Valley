<?php

    if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'excluirPermissao')
        
        require_once('conexao.php');

        $conex = conexaoMysql();

        if(isset($_GET['idPermissao']))
        {
            $id = $_GET['idPermissao'];

            $sql = "delete from tblpermissoes where idPermissao = ". $id;
            // echo($sql);
            if(mysqli_query($conex, $sql))

            header('Location: ../cms/adicionarPermissoes.php');
        }
    }
?>