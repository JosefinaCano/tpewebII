<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'app/controllers/discoController.php';
require_once 'app/controllers/userController.php';
require_once 'app/controllers/adminController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');


$action = 'home';
if (!empty($_GET['action'])){
    $action = $_GET['action'];
}


$params = explode('/',$action);

switch ($params[0]){
    case 'miColeccion':
        if(!isset($_SESSION['USER_ID'])){
            header("location: ".BASE_URL. "login");
            exit;
        }
        $controller = new discoController();
        $viewContext = $params[0];
        $controller->showMiColeccion();
        break;
    case 'home':

    if (!isset($_SESSION['USER_ID'])) {
        header("location: ".BASE_URL."login");
        exit;
    }

    $sub = $params[1] ?? null;
    $id  = $params[2] ?? null;

    $controller = new discoController();

    if ($sub === 'genero' && $id) {
        $controller->showDiscosByGenero($id);
    } else {
        $controller->showDiscos(); 
        
    }

    break;
    case 'disco':

    $controller = new discoController();

    $id = $params[1] ?? null;

    if ($id) {
        $controller->showDisco($id);
    } else {
        echo "Disco no encontrado";
    }

    break;
    case 'generos':
        $controller = new DiscoController();
        $controller->showGeneros();
    break;
    case 'addColeccion':
        $controller = new discoController();
        $controller->addColeccion();
        break;
    case 'login':
        $controller = new userController();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $controller->login();
        } else {
            $controller->loginForm();
        }
        break;
    case 'logout':
        $controller = new userController();
        $controller->logout();
        break;

    case 'admin':

    $controller = new AdminController();

    $subaction = $params[1] ?? null;

    switch ($subaction) {
        case 'adminView':
            $controller->showAdminView();
            break;
        case 'listDiscos':
            $controller->listDiscos();
            break;
        case 'listArtistas':
            $controller->listArtistas();
            break;
        case 'listGeneros':
            $controller->listGeneros();
            break;
        case 'addArtista':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->addArtista();
            } else {
                $controller->showAddArtista();
            }
            break;
        case 'addDisco':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->addDisco();
            } else {
                $controller->showAddDisco();
            }
            break;
        case 'addGenero':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->addGenero();
            } else {
                $controller->showAddGenero();
            }
            break;
        case'deleteDisco':
            $id = $params[2] ?? null;
            if ($id) {
                $controller->deleteDisco($id);
            }
            break;
        case 'deleteArtista':
            $id = $params[2] ?? null;
            if ($id) {
                $controller->deleteArtista($id);
            }
            break;
        case 'deleteGenero':
            $id = $params[2] ?? null;
            if ($id) {
                $controller->deleteGenero($id);
            }
            break;
        case 'editDisco':
            $id = $params[2] ?? null;

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->updateDisco($id);
            } else {
                $controller->showEditDisco($id);
            }
          default:
        $controller->showAdminView();
        break;

    }
    break;
    case 'hash':
        require_once 'hash.php';
        break;
    default:
        echo('404 pagina no encontrada');
        break;
}