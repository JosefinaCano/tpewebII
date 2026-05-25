<?php

class adminView {

    function showAdminView(){
        require 'templates/adminView.phtml';
    }
    function listDiscos($discos){
        require 'templates/admin/listDiscosView.phtml';
    }

    function listArtistas($artistas){
        require 'templates/admin/listArtistasView.phtml';
    }

    function listGeneros($generos){
        require 'templates/admin/listGenerosView.phtml';
    }

    function showAddDisco($artistas, $generos){
        require 'templates/admin/addDiscoView.phtml';
    }

    function showAddArtista(){
        require 'templates/admin/addArtistaView.phtml';
    }

    function showAddGenero(){
        require 'templates/admin/addGeneroView.phtml';
    }
    function showEditDisco($disco, $artistas, $generos) {
    require_once 'templates/header.phtml';
    require_once 'templates/admin/editDiscoView.phtml';
}

}