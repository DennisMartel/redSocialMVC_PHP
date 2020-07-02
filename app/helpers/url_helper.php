<?php

function redirect($url)
{
    header('Location:' . RUTA_PROJECT . $url);
}