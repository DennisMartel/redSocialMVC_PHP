<?php

class Controller 
{
    //metodo para llamar a los modelos
    public function model($model)
    {
        //llamamos y devolvemos el modelo
        require_once '../app/models' . $model . '.php';
        return new $model();
    }

    //metodo para llamar a las vistas
    public function view($view, $data = [])
    {
        //si existe la vista la llamomos en caso contrario mostramos el mensaje
        if(file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            echo 'la vista no existe';
        }
    }
}