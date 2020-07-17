<?php

class Usuario 
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function getUsuario($datosUsuario)
    {
        $this->db->query("SELECT * FROM usuarios WHERE usuario = :usuario");
        $this->db->bind(':usuario', $datosUsuario);
        return $this->db->register();
    }

    public function getUsuarios()
    {
        $this->db->query("SELECT * FROM usuarios");
        return $this->db->registers();
    }

    public function verificarContrasena($datosUsuario, $contrasena)
    {
        if(password_verify($contrasena, @$datosUsuario->contrasena)) {
            return true;
        } else {
            return false;
        }
    }

    public function insertarRegistro($datosUsuario)
    {
        $this->db->query("INSERT INTO usuarios(usuario, email, contrasena) VALUES(:usuario, :email, :contrasena)");
        $this->db->bind(':usuario', $datosUsuario['usuario']);
        $this->db->bind(':email', $datosUsuario['email']);
        $this->db->bind(':contrasena', $datosUsuario['contrasena']);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPerfil($idUsuario)
    {
        $this->db->query("SELECT * FROM perfil WHERE idUsuario = :id");
        $this->db->bind(':id', $idUsuario);
        return $this->db->register();
    }

    public function completarPerfil($datos)
    {
        $this->db->query("INSERT INTO perfil(idUsuario, nombreCompleto, fotoPerfil) VALUES(:idUser, :nombre, :foto)");
        $this->db->bind(':idUser', $datos['idUsuario']);
        $this->db->bind(':nombre', $datos['nombreCompleto']);
        $this->db->bind(':foto', $datos['fotoPerfil']);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function buscar($busqueda)
    {
        $this->db->query('SELECT U.usuario , P.fotoPerfil , P.nombreCompleto FROM usuarios U
        INNER JOIN perfil P ON P.idUsuario = U.idUsuario
        WHERE U.usuario LIKE :buscar ');
        $this->db->bind(':buscar' , $busqueda);
        return $this->db->registers();
    }
}