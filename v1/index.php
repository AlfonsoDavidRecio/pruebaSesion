<?php

require_once 'config\configHost.php';

// Verificación de parámetro 'mensaje' en la URL para mostrar mensajes.
$mensaje = "";

if(isset($_GET['mensaje'])) {
    if ($_GET['mensaje'] === "false") {
        $mensaje = 'Valores Incorrectos';
    }
}

$nombreControl = constant("CONTROLADOR_DEFAULT");
$nombreMetodo = constant("METODO_DEFAULT");

if(isset($_GET["control"])) $nombreControl = $_GET["control"];
if(isset($_GET["metodo"])) $nombreMetodo = $_GET["metodo"];

$directorioControlador = 'controladores/'.$nombreControl.'.php';

// Comprobar si el controlador existe
if(!file_exists($directorioControlador))
    $directorioControlador = 'controladores/'.constant("CONTROLADOR_DEFAULT").'.php';

// Cargar controlador
require_once $directorioControlador;

// Poner la primera letra del nombre del controlador en mayúscula para referir a la clase y crear el objeto controlador
$nombreClase = ucfirst($nombreControl);
$controlador = new $nombreClase();

/* Ver si el método está definido */
$datosVista["datos"] = array();
if (method_exists($controlador, $nombreMetodo)) {
    if($nombreMetodo == "ajaxNivel" || $nombreMetodo == "ajaxMensajesNivel" || $nombreMetodo == "ajaxAnadirPartida" || $nombreMetodo == "ajaxPartida" || $nombreMetodo == "ajaxBasura" || $nombreMetodo == "ajaxPowerup"){
        echo $controlador->{$nombreMetodo}();
        return;
    } else {
        $datosVista["datos"] = $controlador->{$nombreMetodo}();
    }
}
   
/* Cargar vistas */

require_once 'vistas/'.$controlador->vista.'.php';
?>