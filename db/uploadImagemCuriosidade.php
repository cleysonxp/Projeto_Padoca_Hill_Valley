<?php

    if($_FILES['fleImagem']['size'] > 0 && $_FILES['fleImagem']['type'] != "")
    {
        $diretorioArquivo = "arquivos/";
        $arquivoSize = round($_FILES['fleImagem']['size']/1024);
        $arquivosPermitidos = array("image/jpeg", "image/jpg", "image/png");
        $arquivoType = $_FILES['fleImagem']['type'];
        if(in_array($arquivoType, $arquivosPermitidos))
        {
            if($arquivoSize <= 12000)
            {
                $nomeArquivo = pathinfo($_FILES['fleImagem']['name'],PATHINFO_FILENAME);
                $extensaoArquivo = pathinfo($_FILES['fleImagem']['name'], PATHINFO_EXTENSION);
                $nomeArquivoCripy = md5($nomeArquivo . uniqid(time()));
                $foto = $nomeArquivoCripy.".".$extensaoArquivo;
                $arquivoTemp = $_FILES['fleImagem']['tmp_name'];
                if(move_uploaded_file($arquivoTemp, $diretorioArquivo.$foto)){
                    session_start();
                    $_SESSION['nomeFoto'] = $foto;
                    echo("<img class='imagem2' src='../db/arquivos/".$foto."'>");
                }
            }
            else
            {
                echo("Não é permitido arquivos maiores do que 2MB!");
            }
        }
        else
        {
            echo("Extensão de arquivo selecionado não é permitido no sistema!");
        }
    }
    else
    {
        echo("arquivo inválido na escolha da imagem!");
    }
?>