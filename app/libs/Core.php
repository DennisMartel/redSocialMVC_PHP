<?php

class Core
{
    //controlador, metodo y parametro por defecto
    protected $controller = 'Home';
    protected $method     = 'index';
    protected $params     = [];

    public function __construct()
    {
        $url = $this->getUrl();

        if(!empty($url)) {
            if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                $this->controller = ucwords($url[0]);
                unset($url[0]);
            }
        }

        //llamamos e instanciamos el controlador
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //si existe la posicion 1 verificamos que el metodo exista y lo llamamos
        if(isset($url[1])) {
            if(method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    //metodo que obtiene la url que le pasamos en el navegador
    public function getUrl()
    {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url']);
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}