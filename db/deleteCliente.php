<?php

if(isset($_GET['modo']))
{
    if($_GET['modo'] == 'excluir')
    
    require_once('conexao.php');

    $conex = conexaoMysql();

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $slq = "delete from tblclientes where idCliente = " .$id;
        // echo($slq);
        if(mysqli_query($conex, $slq))

        header('location:../cms/admFaleConosco.php');
    }
}
?>