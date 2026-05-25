<?php
require_once 'model.php';

class UserModel extends Model {

    public function getUserByNombre($nombre) {
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE nombre = ?");
        $query->execute([$nombre]);
        return $query->fetch(PDO::FETCH_OBJ) ?: null;
    }

}
