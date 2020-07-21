<?php

// session_start();
    function menu (){
        
        $nome = $_SESSION['nomeLogin'];
        $senha = $_SESSION['senha'];

        require_once('../db/conexao.php');

        $conex = conexaoMysql();


        $sql = "select tblusuarios.nomeLogin as nomeLogin, tblusuarios.senha as senha, tblusuarios.estadoConta, 
                        tblpermissoes.nome as nivel, tblpermissoes.acessoConteudo,
                        tblpermissoes.acessoFaleConosco, tblpermissoes.acessoProdutos, 
                        tblpermissoes.acessoUsuarios
                        from tblusuarios, tblpermissoes 
                        where tblpermissoes.idPermissao = tblusuarios.idPermissao
                        and nomeLogin = '".$nome."' and senha = '".$senha."' ";

        $select =  mysqli_query($conex,$sql);

        $rsSelect = mysqli_fetch_assoc($select);


        if($rsSelect['estadoConta'] != 0){
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
            </header>
        
        ');

            echo('<nav class="container_menu">');

            if($rsSelect['acessoConteudo'] == 1){
            echo('
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
            ');
            }

        if($rsSelect['acessoFaleConosco'] == 1){
            echo('
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
            ');
        }

        if($rsSelect['acessoUsuarios'] == 1){
            echo('
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
            ');
        }

        echo('
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

        /*************************************************************************
         * 
         * 
         *  O MENU DE DE PRODUTOS SERÁ IMPLEMENTADO NA PROXIMA FASE DO PROJETO
         * 
         * 
         *************************************************************************/

        }

        else{
            echo("
                <script> 
                    alert('Esta conta está destivada!') ;
                    location.href = '../funcoes/erro.php';
                    // Permite voltar a pagina anterior
                    // window.history.back();
                </script>
            ");
        }

        
        
    }