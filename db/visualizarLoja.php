<?php

    if(isset($_POST['modo']))
    {
        if($_POST['modo'] == 'visualizar')
        {
            if(isset($_POST['id']))
            {
                require_once('conexao.php');

                $conex = conexaoMysql();

                $id = $_POST['id'];

                $sql = " select * from tbllojas where idLoja  = ".$id;

                $selectLoja = mysqli_query($conex, $sql);

                if($rsLoja = mysqli_fetch_assoc($selectLoja))
                {
                    $numeroFilial = $rsLoja['numeroFilial'];
                    $rua = $rsLoja['rua'];
                    $numero = $rsLoja['numero'];
                    $bairro = $rsLoja['bairro'];
                    $cep = $rsLoja['cep'];
                    $horaAberto = $rsLoja['horaAberto'];
                    $horaFechado = $rsLoja['horaFechado'];
                    $modo = $rsLoja['modo'];
                    $imagem = $rsLoja['imagem'];
                }
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Padoka Hill Valley</title>
        <link rel="stylesheet" href="cms_css/style.css">
        <script src="../js/jquery2.js'"></script>
        <script>
            $(document).ready(function(){
                $('#fechar').click(function(){
                    $('#modal').fadeOut(500);
                });
            });
        </script>
         
    </head>
    <body>
        <div id="visualizar">
            <div id="fechar">
                <a href="#" id="fechar">
                    <div class="fechar">x</div>    
                </a>
            </div>
            
            <div class="visualizar_titulo" >visualizar dados das Lojas</div>
            <table>
                <tr>
                    <td>Filial</td>
                    <td><?=$numeroFilial?></td>
                </tr>
                <tr>
                    <td>Rua</td>
                    <td><?=$rua?></td>
                </tr>
                <tr>
                    <td>Numero</td>
                    <td><?=$numero?></td>
                </tr>
                <tr>
                    <td>Bairro</td>
                    <td><?=$bairro?></td>
                </tr>
                <tr>
                    <td>Cep</td>
                    <td><?=$cep?></td>
                </tr>                
                <tr>
                    <td>Hora de Abrir</td>
                    <td><?=$horaAberto?></td>
                </tr>
                <tr>
                    <td>Hora de Fechar</td>
                    <td><?=$horaFechado?></td>
                </tr>
                <tr>
                    <td>Modo</td>
                    <td><?=$modo?></td>
                </tr>
                <tr>
                    <td>Imagem</td>
                    <td>
                        <img class="imagemLoja" src="../db/arquivos/<?=$imagem?>" alt="">
                    </td>
                </tr>
                
            </table>
        </div>
    </body>
</html>