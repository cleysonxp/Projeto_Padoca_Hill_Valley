<?php

    if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'inserir')
        {
            require_once('conexao.php');

            $conex = conexaoMysql();

            if(isset($_POST['btnEnviarLoja']))
            {

                $rua = $_POST['txtRua'];
                $numero = $_POST['txtNumero'];
                $bairro = $_POST['txtBairro'];
                $cep = $_POST['txtCep'];
                session_start();
                $imagem = $_SESSION['nomeFoto'];
                $modo = $_POST['rdoModo'];
                $horaAberto = $_POST['timeAberto'];
                $horaFechado = $_POST['timeFechado'];
                $numeroFilial = $_POST['txtFilial'];
                

                $sql = "insert into tbllojas (rua, numero, bairro, cep, imagem, modo, horaAberto, horaFechado, numeroFilial)
                        value ('".$rua."', '".$numero."', '".$bairro."', '".$cep."', '".$imagem."', '".$modo."',
                        '".$horaAberto."', '".$horaFechado."','".$numeroFilial."')";

                // echo($sql);

                if(mysqli_query($conex, $sql))
                echo("<script> alert('Registro inserido com sucesso!') ;
                            location.href = '../cms/cmsLojas.php';
                        </script>");
                        else
                echo("
                    <script> 
                        alert('Erro ao executar o script!') ;
                        location.href = '../cms/adicionarUsuarios.php';
                        // Permite voltar a pagina anterior
                        window.history.back();
                    </script>
                    "); 
            }
        }
    }

?>