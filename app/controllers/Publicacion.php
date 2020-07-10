<?php

class Publicacion extends Controller
{
    public function __construct()
    {
        $this->publicar = $this->model('Publicar');
    }

    public function publicar()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dir = 'C:/wamp64/www/redsocial/public/img/imgPublicacion/';
            opendir($dir);
            $rutaImagen = 'img/imgPublicacion/' . $_FILES['foto']['name'];
            $ruta = $dir . $_FILES['foto']['name'];
            copy($_FILES['foto']['tmp_name'], $ruta);

            $datosPublicacion = [
                'idUsuario' => trim($_POST['idUsuario']),
                'descripcion' => trim($_POST['descripcion']),
                'foto' => $rutaImagen
            ];

            if($this->publicar->guardarPublicacion($datosPublicacion)) {
                redirect('/home');
            } else {
                echo 'algo salio mal';
            }

        } else {
            redirect('/home');
        }
    }

    public function eliminarPublicacion($idPublicacion)
    {
        $datosPublicacion = $this->publicar->getPublicacion($idPublicacion);
        
        if($this->publicar->deletePublicacion($datosPublicacion)) {
            unlink('C:/wamp64/www/redsocial/public/img/imgPublicacion/' . $datosPublicacion->foto);
            redirect('/home');
        } else {
            echo 'algo salio mal';
        }
    }

    public function megusta($idUsuario, $idPublicacion)
    {
        $datos = [
            'idUsuario' => $idUsuario,
            'idPublicacion' => $idPublicacion
        ];

        $datosPublicacion = $this->publicar->getPublicacion($idPublicacion);

        if($this->publicar->rowLikes($datos)) {
            if($this->publicar->deleteLike($datos)) {
                $this->publicar->deleteLikeCount($datosPublicacion);
                redirect('/home');
            }
        } else {
            if($this->publicar->agregarLike($datos)) {
                $this->publicar->addLikeCount($datosPublicacion);
                redirect('/home');
            }
        }
    }
}