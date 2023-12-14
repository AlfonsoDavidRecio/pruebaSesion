<?php

//Inicio Sesion
session_start();

//Existe datos en $_SESSION
if(isset($_SESSION['nombre'])) {
    echo $_SESSION['nombre'].' Bienvenido/a SUPER ADMIN, registra mas admins';
} else {
    //Si no hay datos en $_SESSION muestra mensaje
    echo "No se encontraron datos de sesión.";
}
?>