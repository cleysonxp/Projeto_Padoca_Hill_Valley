<?php

if(isset($_GET['modo']))
{
    if($_GET['modo'] == 'filtrar')
    {
        require_once('conexao.php');

        $conex = conexaoMysql();

        if(isset($_POST['btnFiltro']))

        $tipoMensagem = $_POST['sltTipoMensagem'];

        $sql = "select tblclientes.idCliente, tblclientes.nome as nomeCliente, tblclientes.celular, tblclientes.email,
        tblclientes.profissao, tbltipomensagem.tipo_mensagem from tblclientes, tbltipomensagem
        where tbltipomensagem.idTipoMensagem = tblclientes.idTipoMensagem and tbltipomensagem.idTipoMensagem = " .$tipoMensagem. " order by nomeCliente asc";

        // mysqli_fetch_assoc($conex, $sql);
    }
}


?>