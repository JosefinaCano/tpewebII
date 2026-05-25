<?php
include_once 'app/views/adminView.php';
include_once 'app/models/discoModel.php';

class AdminController {

    private $view;

    private $model;

    function __construct(){
        $this->view = new adminView();
        $this->model = new DiscoModel();
    }

    function showAdminView(){
        $this->view->showAdminView();
    }

    function listDiscos(){
        $discos = $this->model->getDiscos();
        $this->view->listDiscos($discos);
    }

    function listArtistas(){
        $artistas = $this->model->getArtistas();
        $this->view->listArtistas($artistas);
    }

     function listGeneros(){
        $generos = $this->model->getGeneros();
        $this->view->listGeneros($generos);
    }

   public function showAddDisco() {
        $artistas = $this->model->getArtistas();
        $generos = $this->model->getGeneros();

        $this->view->showAddDisco($artistas, $generos);
    }

        public function showAddArtista() {
        $this->view->showAddArtista();
    }


    public function showAddGenero() {
        $this->view->showAddGenero();
    }

    public function showEditDisco($id) {

    $disco = $this->model->getDiscoById($id);
    $artistas = $this->model->getArtistas();
    $generos = $this->model->getGeneros();

    $this->view->showEditDisco($disco, $artistas, $generos);
}

    
    public function addDisco() {
      
        $titulo = $_POST['titulo'] ?? null;
        $fecha_lanzamiento = $_POST['fecha_lanzamiento'] ?? null;
        $id_artista = $_POST['id_artista'] ?? null;
        $id_genero = $_POST['id_genero'] ?? null;

        if (!$titulo || !$fecha_lanzamiento || !$id_artista || !$id_genero) {
            die("Faltan datos");
        }

        $this->model->addDisco(
            $titulo,
            $fecha_lanzamiento,
            $id_artista,
            $id_genero
        );

        header("Location: " . BASE_URL . "admin/listDiscos");
        exit;
}

    public function addArtista() {
        $nombre = $_POST['nombre'] ?? null;
        $pais = $_POST['pais'] ?? null;
        $descripcion = $_POST['descripcion'] ?? null;

        if (!$nombre) {
            die("Faltan datos");
        }

        $this->model->addArtista($nombre, $pais, $descripcion);

        header("Location: " . BASE_URL . "admin/listArtistas");
        exit;
    }

    public function addGenero() {
        $nombre = $_POST['nombre'] ?? null;

        if (!$nombre) {
            die("Faltan datos");
        }

        $this->model->addGenero($nombre);

        header("Location: " . BASE_URL . "admin/listGeneros");
        exit;
    }

    public function updateDisco($id) {

    $titulo = $_POST['titulo'] ?? null;
    $id_artista = $_POST['id_artista'] ?? null;
    $fecha_lanzamiento = $_POST['fecha_lanzamiento'] ?? null;
    $id_genero = $_POST['id_genero'] ?? null;
    $temas = $_POST['temas'] ?? null;

    if (!$titulo || !$id_artista || !$fecha_lanzamiento || !$id_genero) {
        die("Faltan datos");
    }

    $this->model->updateDisco(
        $id,
        $titulo,
        $id_artista,
        $fecha_lanzamiento,
        $id_genero,
        $temas
    );

    header("Location: " . BASE_URL . "admin/listDiscos");
 }



    public function deleteDisco($id) {
    require_once 'app/models/discoModel.php';
    $discoModel = new DiscoModel();

    $discoModel->deleteDisco($id);

    foreach (glob("images/{$id}.*") as $file) {
        if (file_exists($file)) {
            unlink($file);
        }
    }
     header("Location: " . BASE_URL . "admin/listDiscos");
        exit;

    }

    public function deleteArtista($id) {
        require_once 'app/models/discoModel.php';
        $discoModel = new DiscoModel();

        $discoModel->deleteArtista($id);

        header("Location: " . BASE_URL . "admin/listArtistas");
        exit;
    }

    public function deleteGenero($id) {
        require_once 'app/models/discoModel.php';
        $discoModel = new DiscoModel();

        $discoModel->deleteGenero($id);

        header("Location: " . BASE_URL . "admin/listGeneros");
        exit;
    }
    
}