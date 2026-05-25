<?php

class discoView{
    function showDiscos($discos){
        require_once 'templates/header.phtml';
        require_once 'templates/discosView.phtml';
    }
        function showDisco($disco) {
        require_once 'templates/header.phtml';
        require_once 'templates/discoView.phtml';
    }

    function showGeneros($generos){
        require_once 'templates/header.phtml';
        require_once 'templates/generosView.phtml';
    }
     function showMiColeccion($discos){
        require_once 'templates/header.phtml';
        require_once 'templates/miColeccion.phtml';
    }
}