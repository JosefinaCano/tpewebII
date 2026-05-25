<?php
require_once 'app/models/userModel.php';

class userController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    public function loginForm() {
        require 'templates/loginView.phtml';
    }

   public function login() {

    session_regenerate_id(true);

    $nombre = $_POST['nombre'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';

    $usuario = $this->model->getUserByNombre($nombre);

    if ($usuario && password_verify($contraseña, $usuario->contraseña)) {

        $_SESSION['USER_ID'] = $usuario->id;
        $_SESSION['NOMBRE'] = $usuario->nombre;
        $_SESSION['ROL']= $usuario->rol;

        if ($usuario->rol === 'admin') {
            header('Location: ' . BASE_URL . 'admin');
            exit;
        }else{
            header('Location: ' . BASE_URL . 'home');
            exit;
        }

        header('Location: ' . BASE_URL . 'home');
        exit;
    } else {

        $error = "Usuario o contraseña incorrectos";

        require 'templates/loginView.phtml';
    }
}

public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . 'login');
    }

}
