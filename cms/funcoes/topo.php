<?php

    function topo (){
        echo('
        
                <header>

                <!-- Area do cabecario -->
                <div class="container_topo">

                    <div class="container_titulo">
                        <span class="cms">CMS</span> - Sistema de Gerenciamento de Site 
                    </div>

                    <div class="conatiner_image">
                        
                    </div>
                    
                </div>

                <!-- AREA DO MENU -->
                <nav class="container_menu">
                    
                    <!-- AREA DE OPÇÕES DO MENU -->
                    <div class="container_menu_icone">

                        <div class="menu_icone">
                            
                        </div>
                        <p>
                            Adm. Conteúdo
                        </p>

                    </div>

                    <div class="container_menu_icone">

                        <a href="admFaleConosco.php">
                            <div class="menu_icone">
                                
                            </div>
                            <p>
                                Adm. Fale Conosco
                            </p>
                        </a>
                    </div>

                    <div class="container_menu_icone">
                        <a href="admUsuarios.php">
                            <div class="menu_icone">
                                
                            </div>
                            <p>
                                Adm. Usuários
                            </p>
                        </a>
                    </div>

                    <div class="container_bemvindo">
                        <p>Bem Vindo: [xxxxx xxxx].</p>

                        <p id="logout">Logout</p>
                    </div>

                </nav>
            </header>
        
        
        ');
    };

?>