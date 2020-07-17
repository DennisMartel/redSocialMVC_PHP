<?php

class Notificacion
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function getAllNotifications($idUsuario)
    {
        $this->db->query('SELECT N.idNotificacion , T.nombreNotificacion , U.usuario FROM notificaciones N
        INNER JOIN usuarios U ON U.idUsuario = N.idUsuarioAccion 
        INNER JOIN tiponotificaciones T ON T.idTipoNotificacion = N.idTipoNotificacion
        WHERE N.idUsuario = :idUsuario');
        $this->db->bind(':idUsuario' , $idUsuario);
        return $this->db->registers();
    }

    public function deleteNotificacion($id)
    {
        $this->db->query("DELETE FROM notificaciones WHERE idNotificacion = :idNotificacion");
        $this->db->bind(':idNotificacion', $id);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}