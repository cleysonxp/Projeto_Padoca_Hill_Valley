<?php

// session_start();
    function menu (){
        
        $nome = $_SESSION['nomeLogin'];
        $senha = $_SESSION['senha'];

        require_once('../db/conexao.php');

        $conex = conexaoMysql();


        $sql = "select tblusuarios.nomeLogin as nomeLogin, tblusuarios.senha as senha, tblusuarios.estadoConta, 
                    tblpermissoes.nome as nivel from tblusuarios, tblpermissoes 
                     where tblpermissoes.idPermissao = tblusuarios.idPermissao
                    and nomeLogin = '".$nome."' and senha = '".$senha."' ";

        $select =  mysqli_query($conex,$sql);

        $rsSelect = mysqli_fetch_assoc($select);

        if($rsSelect)

        if($rsSelect['nivel'] == 1){
            echo('

        <!-- AREA DO MENU -->
        <nav class="container_menu">
            
            <!-- AREA DE OPÇÕES DO MENU -->
            <div class="container_menu_icone">
            <a href="admConteudo.php">
                    <div class="menu_icone">
                        <img class="imgIcone" src="../icones/conteudo.png" alt="">
                    </div>
                    <p>
                        Adm. Conteúdo
                    </p>
                </a>
            </div>

            <div class="container_menu_icone">

                <a href="admFaleConosco.php">
                    <div class="menu_icone">
                    <img class="imgIcone" src="../icones/faleConosco.png" alt="">
                    </div>
                    <p>
                        Adm. Fale Conosco
                    </p>
                </a>
            </div>

            <div class="container_menu_icone">
                <a href="admUsuarios.php">
                    <div class="menu_icone">
                        <img class="imgIcone" src="../icones/usuarios.png" alt="">
                    </div>
                    <p>
                        Adm. Usuários
                    </p>
                </a>
            </div>

            <div class="container_bemvindo">
                <p>Bem Vindo ' 
                    .$nome.'
                </p>

                <p id="logout">
                    <a href="../db/logout.php">
                        Logout
                    </a>
                </p>
            </div>

        </nav>

        ');
        }

        elseif($rsSelect['nivel'] == 2){
            echo('
                <nav class="container_menu">
                    <div class="container_menu_icone">
                        <a href="admConteudo.php">
                            <div class="menu_icone">
                                <img class="imgIcone" src="../icones/conteudo.png" alt="">
                            </div>
                            <p>
                                Adm. Conteúdo
                            </p>
                        </a>
                    </div>

                    <div class="container_bemvindo">
                <p>Bem Vindo ' 
                    .$nome.'
                </p>

                <p id="logout">
                    <a href="../db/logout.php">
                        Logout
                    </a>
                </p>
            </div>

                </nav>
            
            ');
        }
        elseif($rsSelect['nivel'] == 5){
            echo('
            <nav class="container_menu">
            
            <!-- AREA DE OPÇÕES DO MENU -->
            <div class="container_menu_icone">
            <a href="admConteudo.php">
                    <div class="menu_icone">
                        <img class="imgIcone" src="../icones/conteudo.png" alt="">
                    </div>
                    <p>
                        Adm. Conteúdo
                    </p>
                </a>
            </div>

            <div class="container_menu_icone">

                <a href="admFaleConosco.php">
                    <div class="menu_icone">
                    <img class="imgIcone" src="../icones/faleConosco.png" alt="">
                    </div>
                    <p>
                        Adm. Fale Conosco
                    </p>
                </a>
            </div>

            <div class="container_bemvindo">
                <p>Bem Vindo ' 
                    .$nome.'
                </p>

                <p id="logout">
                    <a href="../db/logout.php">
                        Logout
                    </a>
                </p>
            </div>

        </nav>
            ');
        }









        
    }