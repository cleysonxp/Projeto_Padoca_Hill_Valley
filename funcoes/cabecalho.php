<?php

function cabecalho(){

echo('

<header>
    <div id="containerCabecario">
        <div id="containerItem">
            <div id="cabecarioContainerItem">
                <div id="logo">

                </div>

                <nav id="containerMenuMobile">

                    <div id="iconeMenu">

                    </div>

                    <div id="menuMobile">
                        <ul>
                            <li class="menu-item">
                                <a href="index.php">
                                     Home
                                </a>
                            </li>

                            <li class="menu-item">
                                <a href="promocoes.php">
                                    Promoções
                                </a>
                            </li>
                        
                            <li class="menu-item">
                                <a href="curiosidade.php">
                                    Curiosidade
                                </a>
                            </li>
                            
                            <li class="menu-item">
                                <a href="sobreEmpresa.php">
                                    Empresa
                                </a>
                            </li>
                            
                            <li class="menu-item">
                                <a href="produtoDoMes.php">
                                    Campeão
                                </a>
                            </li>
    
                            <li class="menu-item">
                                <a href="lojas.php">
                                    Lojas
                                </a>
                            </li>
                            
                            <li class="menu-item">
                                <a href="entreEmContato.php">
                                    Contato
                                </a>
                            </li>
                        </ul>
                    </div>

                </nav>

                <nav>
                    <ul id="containerMenu">

                        <a href="index.php">
                            <li class="menuItem">
                                 Home
                            </li>
                        </a>

                        <a href="promocoes.php">
                            <li class="menuItem">
                                Promoções
                            </li>
                        </a>                        
                    
                        <a href="curiosidade.php">
                            <li class="menuItem">
                                Curiosidade
                            </li>
                        </a>

                        <a href="sobreEmpresa.php">
                            <li class="menuItem">
                                Empresa
                            </li>
                        </a>

                        <a href="produtoDoMes.php">
                            <li class="menuItem">
                                Campeão
                            </li>
                        </a>

                        <a href="lojas.php">
                            <li class="menuItem">
                                Lojas
                            </li>
                        </a>

                        <a href="entreEmContato.php">
                            <li class="menuItem">
                                Contato    
                            </li>
                        </a>

                    </ul>
                </nav>
                <div id="containerAutenticacaoCMS">
                    <form name="autenticacaoCMS" method="post">
                        <div class="usuario" >
                            Usuario:
                            <input class="caixa" type="text" name="usuario"  >

                        </div>

                        <div class="senha">
                            Senha:
                            <input class="caixa" type="password" name="senha" >
                        </div>

                        <div id="botaoOk">
                            <button class="botaoOk" type="submit">Ok</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

');

}

?>