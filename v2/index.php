<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/config/configHost.php';

$mensaje = "";

if(isset($_GET['mensaje'])) {
    if ($_GET['mensaje'] === "false") {
        $mensaje = 'Valores Incorrectos';
    }
    if ($_GET['mensaje'] === "instalacionFallida") {
        $mensaje = 'La instalacion ya esta realizada';
    } 
}

$nombreControl = constant("CONTROLADOR_DEFAULT_V2");
$nombreMetodo = constant("METODO_DEFAULT_V2");

if(isset($_GET["control"])) $nombreControl = $_GET["control"];
if(isset($_GET["metodo"])) $nombreMetodo = $_GET["metodo"];

$directorioControlador = 'controladores/'.$nombreControl.'.php';

// Comprobar si el controlador existe
if(!file_exists($directorioControlador))
    $directorioControlador = 'controladores/'.constant("CONTROLADOR_DEFAULT_V2").'.php';

// Cargar controlador
require_once $directorioControlador;

// Poner la primera letra del nombre del controlador en mayúscula para referir a la clase y crear el objeto controlador
$nombreClase = ucfirst($nombreControl);
$controlador = new $nombreClase();

/* Ver si el método está definido */
$datosVista["datos"] = array();
if (method_exists($controlador, $nombreMetodo)) {
    $datosVista["datos"] = $controlador->{$nombreMetodo}();
}
   
/* Cargar vistas */

require_once 'vistas/'.$controlador->vista.'.php';
?>