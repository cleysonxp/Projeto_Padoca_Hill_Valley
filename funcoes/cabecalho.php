<?php

function cabecalho(){

echo('

<header>
    <div id="containerCabecario">
        <div id="containerItem">
            <div id="cabecarioContainerItem">
                <div id="logo">

                </div>
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