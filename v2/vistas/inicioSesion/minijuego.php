<?php

//Inicio Sesion
session_start();

//Existe datos en $_SESSION
if(isset($_SESSION['nombre'])) {
    echo 'Bienvenido/a '.$_SESSION['nombre'].' esta es la vista de los minijuegos';
} else {
    //Si no hay datos en $_SESSION muestra mensaje
    echo "No se encontraron datos de sesión.";
}
?>