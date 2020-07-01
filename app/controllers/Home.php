<?php

class Home extends Controller
{
    public function index()
    {
        $this->view('pages/main');
    }

    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datosLogin = [

            ];
        } else {
            $this->view('pages/login-registro/login');
        }
    }

    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

        } else {
            $this->view('pages/login-registro/login');
        }
    }
}