<?php
include_once 'app/models/discoModel.php';
include_once 'app/views/discoView.php';

class discoController {

    private $model;

    private $view;

    function __construct(){
        $this->model = new discoModel();
        $this->view = new discoView();
    }

    function showDiscos(){
        $discos = $this->model->getDiscos();
        $this->view->showDiscos($discos);
    }
    function showDisco($id) {
    $disco = $this->model->getDiscoById($id);

    if (!$disco) {
        echo "Disco no encontrado";
        return;
    }

    $this->view->showDisco($disco);
    }

    function showGeneros(){
        $generos = $this->model->getGeneros();
        $this->view->showGeneros($generos);
    }

    public function showDiscosByGenero($id_genero){

    $discos = $this->model->getDiscosByGenero($id_genero);
    

    $this->view->showDiscos($discos);
}
    
    function addColeccion(){

        $id_usuario = $_SESSION['USER_ID'];
        $id_disco = $_POST['id_disco'];

        $this->model->addColeccion($id_usuario, $id_disco);
        header("location: ".BASE_URL);
    }

    function showMiColeccion(){
        $id_usuario = $_SESSION['USER_ID'];
        $discos = $this->model->getColeccionbyUser($id_usuario);
        $this->view->showMiColeccion($discos);
    }





}