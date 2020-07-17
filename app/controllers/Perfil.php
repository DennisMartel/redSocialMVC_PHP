<?php

class Perfil extends Controller
{
    public function __construct()
    {
        $this->usuario = $this->model('Usuario');
        $this->publicar = $this->model('Publicar');
        $this->perfil = $this->model('PerfilM');
    }

    public function index($usuario)
    {
        if(isset($_SESSION['logueado'])) {
            $datosUsuario = $this->usuario->getUsuario($usuario);
            $datosPerfil = $this->usuario->getPerfil($datosUsuario->idUsuario);
            $misNotificaciones = $this->publicar->getNotificaciones($_SESSION['logueado']);
            $misMensajes = $this->publicar->getMensajes($_SESSION['logueado']);

            $datos = [
                'usuario' => $datosUsuario,
                'perfil' => $datosPerfil,
                'notificaciones' => $misNotificaciones,
                'mensajes' => $misMensajes
            ];
            $this->view('pages/perfil/perfil', $datos);
        }
    }
}
