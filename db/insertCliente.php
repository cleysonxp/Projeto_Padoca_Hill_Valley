<?php

if(isset($_GET['modo']))
{
    
    if($_GET['modo'] == 'inserir')
    {

        require_once('conexao.php');

        $conex = conexaoMysql();

        if(isset($_POST['btnEnviar']))
        {

        
            $nome = $_POST['txtNome'];
            $telefone = $_POST['txtTelefone'];
            $celular = $_POST['txtCelular'];
            $email = $_POST['txtEmail'];
            $facebook = $_POST['txtFacebook'];
            $homePage = $_POST['txtHomePage'];
            $profissao = $_POST['txtProfissao'];
            $sexo = $_POST['rdoSexo'];
            $tipoMensage = $_POST['sltTipoMensagem'];
            $mensagem = $_POST['txtObs'];

            $sql = "insert into tblclientes ( nome, celular, email, home_page, 
                                            link_facebook, profissao, sexo, mensagem, idTipoMensagem, telefone)
                                values( '".$nome."', ".$celular.", '".$email."', '".$homePage."',
                                '".$facebook."', '".$profissao."', '".$sexo."', '".$mensagem."', ".$tipoMensage.", '".$telefone."'
                                
                                )";

            // echo($sql);

            if(mysqli_query($conex, $sql))
                echo("<script> alert('Registro inserido com sucesso!') ;
                            location.href = '../entreEmContato.php';
                        </script>");
            else
                echo("
                    <script> 
                        alert('Erro ao executar o script!') ;
                        // location.href = '../index.php';
                        // Permite voltar a pagina anterior sem perder
                        // os dados digitados no formulario
                        window.history.back();
                    </script>
                    ");  
        }

    }
}




?>