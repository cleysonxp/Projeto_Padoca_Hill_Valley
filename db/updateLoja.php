<?php

    if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'atualizar')
        {
            require_once('conexao.php');
            $conex = conexaoMysql();
            if(isset($_POST['btnEnviarLoja']))
            {
                $id = $_GET['id'];
                $nomeAntigo = $_GET['imagem'];
                session_start();
                $imagem = $_SESSION['nomeFoto'];                    
                $rua = $_POST['txtRua'];
                $numero = $_POST['txtNumero'];
                $bairro = $_POST['txtBairro'];                    
                $cep = $_POST['txtCep'];
                $numeroFilial = $_POST['txtFilial'];
                $modo = $_POST['rdoModo'];                    
                $horaAberto = $_POST['timeAberto'];
                $horaFechado = $_POST['timeFechado'];
                $sql = "update tbllojas set
                        rua = '".$rua."',
                        numero = '".$numero."',
                        bairro = '".$bairro."',
                        cep = '".$cep."',                        
                        imagem = '".$imagem."',
                        modo = '".$modo."',
                        horaAberto = '".$horaAberto."',
                        horaFechado = '".$horaFechado."',
                        numeroFilial = '".$numeroFilial."'                        
                        where idLoja = " . $id;

                        // echo($sql);
                        if(mysqli_query($conex,$sql)){
                            if($nomeAntigo != $imagem){
                                unlink('../db/arquivos/'.$nomeAntigo);
                            }
                            echo("<script>
                            alert('Dados atualizado com sucesso!') ;
                            location.href = '../cms/cmsLojas.php';
                        </script>");      
                        }
        
                        else
                            echo("
                            <script> 
                                alert('Erro ao executar o script!') ;
                                window.history.back();
                            </script>
                            ");


            }
        }
    }


?>