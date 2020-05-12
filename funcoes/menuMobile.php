<?php

function menuMobile () {
    echo('
    <script>
    $(document).ready(function(){

        

        // Function para o click do menu Mobile
        $("#iconeMenu").click(function(){
            $("#menuMobile").fadeToggle(1000);
            

        });

        // function para fechar no item
        $(".itemMenu").click(function(){
            $("#menuMobile").fadeToggle();
        });

    });

    </script>
    ');
}

?>