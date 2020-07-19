<?php
// session_start();
if(!$_SESSION['nomeLogin']){
    header('Location: ../index.php');
    exit();
}