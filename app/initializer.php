<?php

//llamando a config/global.php
require_once 'config/global.php';

//llamando a helpers/url_helper.php
require_once 'helpers/url_helper.php';

//cargando las librerias
spl_autoload_register(function($class) {
    //llamamos las librerias
    require_once 'libs/' . $class . '.php';
});