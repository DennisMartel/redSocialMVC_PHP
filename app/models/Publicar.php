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
        $this->db->query('SELECT P.idPublicacion , P.descripcion , P.foto ,P.num_likes , P.registrado , U.idUsuario , Per.fotoPerfil, Per.nombreCompleto  FROM publicaciones P
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
        $this->db->query("INSERT INTO publicaciones (idUsuario, descripcion, foto, num_likes) VALUES(:idUsuario, :descripcion, :foto, 0)");
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

    public function rowLikes($datos)
    {
        $this->db->query("SELECT * FROM likes WHERE idUsuario = :idUsuario AND idPublicacion = :idPublicacion");
        $this->db->bind(':idUsuario' , $datos['idUsuario']);
        $this->db->bind(':idPublicacion' , $datos['idPublicacion']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function agregarLike($datos) 
    {
        $this->db->query("INSERT INTO likes (idUsuario, idPublicacion) VALUES(:idUsuario, :idPublicacion)");
        $this->db->bind(':idUsuario', $datos['idUsuario']);
        $this->db->bind(':idPublicacion', $datos['idPublicacion']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteLike($datos)
    {
        $this->db->query("DELETE FROM likes WHERE idUsuario = :idUsuario AND idPublicacion = :idPublicacion");
        $this->db->bind(':idUsuario' , $datos['idUsuario']);
        $this->db->bind(':idPublicacion' , $datos['idPublicacion']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function addLikeCount($datos)
    {
        $this->db->query("UPDATE publicaciones SET num_likes = :countLike WHERE idPublicacion = :idPublicacion");
        $this->db->bind(':countLike', ($datos->num_likes + 1));
        $this->db->bind(':idPublicacion', $datos->idPublicacion);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteLikeCount($datos)
    {
        $this->db->query("UPDATE publicaciones SET num_likes = :countLike WHERE idPublicacion = :idPublicacion");
        $this->db->bind(':countLike', ($datos->num_likes - 1));
        $this->db->bind(':idPublicacion', $datos->idPublicacion);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function misLikes($idUsuario) 
    {
        $this->db->query("SELECT * FROM likes WHERE idUsuario = :idUsuario");
        $this->db->bind(':idUsuario', $idUsuario);
        return $this->db->registers();   
    }

    public function agregarComentario($datos)
    {
        $this->db->query("INSERT INTO comentarios (idUsuario, idPublicacion, comentario) VALUES(:idUsuario, :idPublicacion, :comentario)");
        $this->db->bind(':idUsuario', $datos['idUsuario']);
        $this->db->bind(':idPublicacion', $datos['idPublicacion']);
        $this->db->bind(':comentario', $datos['comentario']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getComentarios()
    {
        $this->db->query('SELECT C.idPublicacion , C.idUsuario , C.idComentario , C.comentario , C.registrado , P.fotoPerfil , U.usuario FROM comentarios C
        INNER JOIN perfil P ON P.idUsuario = C.idusuario
        INNER JOIN usuarios U ON U.idusuario = C.idusuario');
        return $this->db->registers();
 
    }

    public function getComentario($idComentario)
    {
        $this->db->query("SELECT * FROM comentarios WHERE idComentario = :idComentario");
        $this->db->bind(':idComentario', $idComentario);
        return $this->db->register();
    }

    public function deleteComentario($comentario)
    {
        $this->db->query("DELETE FROM comentarios WHERE idComentario = :idComentario");
        $this->db->bind(':idComentario', $comentario->idComentario);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}