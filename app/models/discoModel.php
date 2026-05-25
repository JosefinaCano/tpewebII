<?php
require_once 'model.php';
class discoModel extends model {

    public function getDiscos() {
        $query = $this->db->prepare('SELECT discos.*, generos.nombre AS genero_nombre, artistas.nombre AS artista_nombre
        FROM discos
        LEFT JOIN generos ON discos.id_genero = generos.id
        LEFT JOIN artistas ON discos.id_artista = artistas.id ');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

public function getDiscoById($id) {

    $query = $this->db->prepare("
        SELECT discos.*,
               artistas.nombre AS artista_nombre,
               generos.nombre AS genero_nombre
        FROM discos
        LEFT JOIN artistas ON discos.id_artista = artistas.id
        LEFT JOIN generos ON discos.id_genero = generos.id
        WHERE discos.id = ?
    ");

    $query->execute([$id]);

    return $query->fetch(PDO::FETCH_OBJ);
}



 public function getDiscosByGenero($id_genero){

    $query = $this->db->prepare("
        SELECT discos.*, 
               generos.nombre AS genero_nombre, 
               artistas.nombre AS artista_nombre
        FROM discos
        LEFT JOIN generos ON discos.id_genero = generos.id
        LEFT JOIN artistas ON discos.id_artista = artistas.id
        WHERE discos.id_genero = ?
    ");

    $query->execute([$id_genero]);

    return $query->fetchAll(PDO::FETCH_OBJ);
}
    function addColeccion($id_usuario,$id_disco){

        $query = $this->db->prepare(
            'INSERT INTO coleccion_usuario (id_usuario, id_disco)
            VALUES (?,?)'
        );
        $query->execute([$id_usuario,$id_disco]);
    }

    function getColeccionbyUser($id_usuario){
        $query = $this->db->prepare(
            'SELECT discos.*, generos.nombre AS genero_nombre, artistas.nombre AS artista_nombre
            FROM discos
            LEFT JOIN generos ON discos.id_genero = generos.id
            LEFT JOIN artistas ON discos.id_artista = artistas.id
            INNER JOIN coleccion_usuario ON discos.id = coleccion_usuario.id_disco
            WHERE coleccion_usuario.id_usuario = ?'
        );
        $query->execute([$id_usuario]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getArtistas() {
        $query = $this->db->prepare("SELECT * FROM artistas");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getGeneros() {
        $query = $this->db->prepare("SELECT * FROM generos");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    

    public function addDisco($titulo, $fecha_lanzamiento,$id_artista, $id_genero) {

        $query = $this->db->prepare("
            INSERT INTO discos (titulo, fecha_lanzamiento, id_artista, id_genero)
            VALUES (?, ?, ?, ?)
        ");

        $query->execute([
            $titulo,
            $fecha_lanzamiento,
            $id_artista,
            $id_genero
        ]);
    }

    public function addArtista($nombre, $pais, $descripcion) {
        $query = $this->db->prepare("
            INSERT INTO artistas (nombre, pais, descripcion)
            VALUES (?, ?, ?)
        ");

        $query->execute([
            $nombre,
            $pais,
            $descripcion
        ]);
    }
    public function addGenero($nombre) {
        $query = $this->db->prepare("
            INSERT INTO generos (nombre)
            VALUES (?)
        ");

        $query->execute([
            $nombre
        ]);
    }
    public function deleteDisco($id) {
        $query = $this->db->prepare("DELETE FROM discos WHERE id = ?");
        $query->execute([$id]);
    }

    public function deleteArtista($id) {
        $query = $this->db->prepare("DELETE FROM artistas WHERE id = ?");
        $query->execute([$id]);
    }

    public function deleteGenero($id) {
        $query = $this->db->prepare("DELETE FROM generos WHERE id = ?");
        $query->execute([$id]);
    }

    public function updateDisco($id, $titulo, $id_artista, $fecha, $id_genero, $temas) {

    $query = $this->db->prepare("
        UPDATE discos
        SET titulo = ?,
            id_artista = ?,
            fecha_lanzamiento = ?,
            id_genero = ?,
            temas = ?
        WHERE id = ?
    ");

    $query->execute([
        $titulo,
        $id_artista,
        $fecha,
        $id_genero,
        $temas,
        $id
    ]);

}

}