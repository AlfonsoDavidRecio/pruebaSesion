<?php

require_once 'C:\xampp\htdocs\pruebaSesion\v1\config\configHost.php';

class Instalacion_Mod{

    private $conexion;

    /**
     * Constructor de la clase Powerup_Mod.
     */
    public function __construct()
    {
        $this->conexion = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    }

    public function instalacion(){

    }
}