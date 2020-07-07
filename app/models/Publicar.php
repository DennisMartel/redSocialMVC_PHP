<?php

class Publicar
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function getPublicaciones()
    {
        $this->db->query('SELECT P.idPublicacion , P.descripcion , P.foto , P.registrado , P.numLikes , U.idUsuario , Per.fotoPerfil, Per.nombreCompleto  FROM publicaciones P
        INNER JOIN usuarios U ON U.idUsuario = P.idUsuario 
        INNER JOIN perfil Per ON Per.idUsuario = P.idUsuario');
        return $this->db->registers();
    }

    public function getPublicacion($idPublicacion)
    {
        $this->db->query("SELECT * FROM publicaciones WHERE idPublicacion = :id");
        $this->db->bind(':id', $idPublicacion);
        return $this->db->register();
    }

    public function guardarPublicacion($datosPublicacion)
    {
        $this->db->query("INSERT INTO publicaciones(idUsuario, descripcion, foto, numLikes) VALUES(:idUsuario, :descripcion, :foto, 0)");
        $this->db->bind(':idUsuario', $datosPublicacion['idUsuario']);
        $this->db->bind(':descripcion', $datosPublicacion['descripcion']);
        $this->db->bind(':foto', $datosPublicacion['foto']);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePublicacion($publicacion)
    {
        $this->db->query("DELETE FROM publicaciones WHERE idPublicacion = :id");
        $this->db->bind(':id', $publicacion->idPublicacion);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}