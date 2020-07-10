<?php

    if(isset($_POST['id']))
        {
            require_once('conexao.php');

            $conex = conexaoMysql();

            $id = $_POST['id'];

            $modo = $_POST['modo'];

            if($modo == 1){
                $sql = "update tblLojas set
                modo = 0 where idLoja = ". $id;
            }
            else{
                $sql = "update tblLojas set
                modo = 1 where idLoja = ". $id;
            }

            if(mysqli_query($conex, $sql));
        
        }