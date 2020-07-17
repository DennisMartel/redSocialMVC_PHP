<?php

class Home extends Controller
{
    public function __construct()
    {
        $this->usuario = $this->model('Usuario');
        $this->publicar = $this->model('Publicar');
    }

    public function index()
    {
        if(isset($_SESSION['logueado'])) {
           $datosUsuario = $this->usuario->getUsuario($_SESSION['usuario']);
           $datosPerfil = $this->usuario->getPerfil($_SESSION['logueado']);
           $datosPublicacion = $this->publicar->getPublicaciones();
           $datosLike = $this->publicar->misLikes($_SESSION['logueado']);
           $datosComentarios = $this->publicar->getComentarios();
           $misNotificaciones = $this->publicar->getNotificaciones($_SESSION['logueado']);

            if($datosPerfil) {
                $datosRed = [
                    'usuario' => $datosUsuario,
                    'perfil' => $datosPerfil,
                    'publicaciones' => $datosPublicacion,
                    'likes' => $datosLike,
                    'comentarios' => $datosComentarios,
                    'notificaciones' => $misNotificaciones
                ];
                $this->view('pages/home', $datosRed);
            } else {
                $this->view('pages/perfil/completarPerfil', $_SESSION['logueado']);
            }
            
        } else {
            $this->view('pages/login-registro/login');
        }
    }

    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datosLogin = [
                'usuario' => trim($_POST['usuario']),
                'contrasena' => trim($_POST['contrasena'])
            ];

            $datosUsuario = $this->usuario->getUsuario($datosLogin['usuario']);
            
            if($this->usuario->verificarContrasena($datosUsuario, $datosLogin['contrasena'])) {
                $_SESSION['logueado'] = $datosUsuario->idUsuario;
                $_SESSION['usuario'] = $datosUsuario->usuario;
                redirect('/home');
            } else {
                $_SESSION['errorLogin'] = 'usuario o contraseña incorrectos';
                $this->view('pages/login-registro/login');
            }
            
        } else {
            if(isset($_SESSION['logueado'])) {
                redirect('/home');
            } else {
                $this->view('pages/login-registro/login');
            }
        }
    }

    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datosRegistro = [
                'usuario' => trim($_POST['usuario']),
                'email' => trim($_POST['email']),
                'contrasena' => password_hash(trim($_POST['contrasena']), PASSWORD_DEFAULT)
            ];
            
            if($this->usuario->insertarRegistro($datosRegistro)) {
                $_SESSION['registroCompleto'] = 'registrado exitosamente';
                redirect('/home');
            } else {
                $_SESSION['errorRegistro'] = 'algo salio mal';
                $this->view('pages/login-registro/registro');
            }
            
        } else {
            if(isset($_SESSION['logueado'])) {
                redirect('/home');
            } else {
                $this->view('pages/login-registro/registro');
            }
        }
    }

    public function logout()
    {
        session_start();

        $_SESSION[] = [];

        session_destroy();

        redirect('/home/login');
    }

    public function insertarRegistrosPerfil()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dir = 'C:/wamp64/www/redsocial/public/img/imgPerfil/';
            opendir($dir);
            $rutaImagen = 'img/imgPerfil/' . $_FILES['fotoPerfil']['name'];
            $ruta = $dir . $_FILES['fotoPerfil']['name'];
            copy($_FILES['fotoPerfil']['tmp_name'], $ruta);

            $datosPerfil = [
                'idUsuario' => trim($_POST['idUsuario']),
                'nombreCompleto' => trim($_POST['nombreCompleto']),
                'fotoPerfil' => $rutaImagen
            ];
            
            if($this->usuario->completarPerfil($datosPerfil)) {
                redirect('/home');
            } else {
                $_SESSION['errorPerfil'] = 'algo salio mal';
                $this->view('pages/login-registro/login');
            }
            
        } else {
            if(isset($_SESSION['logueado'])) {
                redirect('/home');
            } else {
                $this->view('pages/perfil/completarPerfil');
            }
        }
    }

    public function buscar()
    {
        if(isset($_SESSION['logueado'])) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $buscar = '%' . trim($_POST['buscar']) . '%';
                $busqueda = $this->usuario->buscar($buscar);

                $datosUsuario = $this->usuario->getUsuario($_SESSION['usuario']);
                $datosPerfil = $this->usuario->getPerfil($_SESSION['logueado']);
                $misNotificaciones = $this->publicar->getNotificaciones($_SESSION['logueado']);

                if($datosPerfil) {
                    $datos = [
                        'usuario' => $datosUsuario,
                        'perfil' => $datosPerfil,
                        'notificaciones' => $misNotificaciones,
                        'busqueda' => $busqueda
                    ];

                    $this->view('pages/busqueda/busqueda', $datos);
                } else {
                    redirect('/home');
                }
            } else {
                redirect('/home');
            }
        } else {
            redirect('/home');
        }
    }
}