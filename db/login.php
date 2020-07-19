<?php
session_start();
include_once('conexao.php');

if(empty($_POST['txtUsuario']) || empty($_POST['txtSenha'])){
    header('Location: ../index.php');
    exit();
}

$usuario = $_POST['txtUsuario'];
$senha = $_POST['txtSenha'];

$conex = conexaoMysql();

$sql = "select nomeLogin, senha from tblusuarios 
            where nomeLogin = '".$usuario."' and senha = '".$senha."' ";

$result = mysqli_query($conex, $sql);

$row = mysqli_num_rows($result);

if($row == 1){
    $_SESSION['nomeLogin'] = $usuario;
    $_SESSION['senha'] = $senha;
    header('Location: ../cms/index.php');
    exit();
} else{
        header('Location: ../index.php');
    exit();
}

