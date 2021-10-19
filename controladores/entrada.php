<?php

session_start(); //Crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST, o pasado mediante una cookie.

/*
isset() Determina si una variable está definida y no es null
$_SESSION[] es un array asociativo que contiene variables de sesión disponibles para el script actual. Es una superglobal o una variable automatic global.
*/
if(isset($_SESSION["usu"]) && isset($_SESSION["pass"])){
    require_once("modelos/validar.php");
    $validar = new Validar();
    $validar->validarDatos();

    include_once("vistas/principal.php");
}
else {
    if (isset($_SESSION["error"])) {
        echo "<p>Usuario y/o contraseña incorrecto</p>";
        unset($_SESSION["error"]);
    }
    include_once("vistas/login.php");
}