<?php

require_once('funcoes/cabecalho.php');
require_once('funcoes/rodape.php');
require_once('funcoes/menuMobile.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Padoka Hill Valley</title>
        <link rel="stylesheet" href="css/style2.css">
        <link rel="stylesheet" href="css/cabecario.css">
        <script src="js/jquery.js"></script>
        <script src="js/script.js"></script>
        <?php menuMobile();?>
        
    </head>

    
    <body>  
        
    <?php cabecalho();?>

        <div class="slideShow" id="slideShow">
            <div class="sliderShowArea">
                <div class="slide" id="slide1"></div>
                <div class="slide" id="slide2"></div>
                <div class="slide" id="slide3"></div>
                <div class="slide" id="slide4"></div>
                <div class="slide" id="slide5"></div>
            </div>
            <div class="sliders-pointers">
                <div class="pointer" onclick="mudarSlide(0)"></div>
                <div class="pointer" onclick="mudarSlide(1)"></div>
                <div class="pointer" onclick="mudarSlide(2)"></div>
                <div class="pointer" onclick="mudarSlide(3)"></div>
                <div class="pointer" onclick="mudarSlide(4)"></div>
            </div>
        </div>

        <div id="container">

        <div id="redesSociais">
                <div class="redesSociais">
                    <img src="imagens/facebook.png" alt="facebook" >
                </div>

                <div class="redesSociais">
                    <img src="imagens/instagram.png" alt="instagram">
                </div>

                <div class="redesSociais">
                    <img src="imagens/twitter.png" alt="twitter">
                </div>
            </div>

            <div id="containerProdutos" >

                <div id="menuProdutos">
                    <div class="menuProdutosItem">
                        Item 1
                    </div>
                    <div class="menuProdutosItem">
                        Item 2
                    </div>
                    <div class="menuProdutosItem">
                        Item 3
                    </div>
                    <div class="menuProdutosItem">
                        Item 4
                    </div>
                    <div class="menuProdutosItem">
                        Item 5
                    </div>
                    <div class="menuProdutosItem">
                        Item 6
                    </div>
                </div>

                <div id="conatinerItens">

                <div class="cardProdutos">
                        <div class="produtoImagem">
                            <img class="responsivo" src="imagens/paoDeQueijo.jpg" alt="" >
                        </div>
                        <p>
                            Nome: 
                        </p>
                        <p>
                            Descrição: 
                        </p>
                        <p>
                            Preço:
                        </p>

                        <p class="detalhe">
                            Detalhes
                        </p>
                    </div>
                    
                    <div class="cardProdutos">
                        <div class="produtoImagem">
                            <img class="responsivo" src="imagens/paoDeQueijo.jpg" alt="" >
                        </div>
                        <p>
                            Nome: 
                        </p>
                        <p>
                            Descrição: 
                        </p>
                        <p>
                            Preço:
                        </p>

                        <p class="detalhe">
                            Detalhes
                        </p>
                    </div>

                    <div class="cardProdutos">
                        <div class="produtoImagem">
                            <img class="responsivo" src="imagens/paoDeQueijo.jpg" alt="" >
                        </div>
                        <p>
                            Nome: 
                        </p>
                        <p>
                            Descrição: 
                        </p>
                        <p>
                            Preço:
                        </p>

                        <p class="detalhe">
                            Detalhes
                        </p>
                    </div>
                    
                    <div class="cardProdutos">
                        <div class="produtoImagem">
                            <img class="responsivo" src="imagens/paoDeQueijo.jpg" alt="" >
                        </div>
                        <p>
                            Nome: 
                        </p>
                        <p>
                            Descrição: 
                        </p>
                        <p>
                            Preço:
                        </p>

                        <p class="detalhe">
                            Detalhes
                        </p>
                    </div>
                    <div class="cardProdutos">
                        <div class="produtoImagem">
                            <img class="responsivo" src="imagens/paoDeQueijo.jpg" alt="" > 
                        </div>
                        <p>
                            Nome: 
                        </p>
                        <p>
                            Descrição: 
                        </p>
                        <p>
                            Preço:
                        </p>

                        <p class="detalhe">
                            Detalhes
                        </p>
                    </div>
                    
                    <div class="cardProdutos">
                        <div class="produtoImagem">
                            <img class="responsivo" src="imagens/paoDeQueijo.jpg" alt="" >
                        </div>
                        <p>
                            Nome: 
                        </p>
                        <p>
                            Descrição: 
                        </p>
                        <p>
                            Preço:
                        </p>

                        <p class="detalhe">
                            Detalhes
                        </p>
                    </div>

                    
                

                
                </div>
            </div>
            
            
            
        </div>
        
        <?php rodape();?>
        
        
    </body>
</html>