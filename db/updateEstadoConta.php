<?php

    if(isset($_POST['id']))
    {
        require_once('conexao.php');

        $conex = conexaoMysql();

        $id = $_POST['id'];

        $estado = $_POST['estado'];

        if($estado == 1){
            $sql = "update tblusuarios set
            estadoConta = 0 where idUsuario = ". $id;
        }
        else{
            $sql = "update tblusuarios set
            estadoConta = 1 where idUsuario = ". $id;
        }

        if(mysqli_query($conex, $sql));
    
    }

?>