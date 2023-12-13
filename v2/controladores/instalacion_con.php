<?php

require_once 'C:\xampp\htdocs\pruebaSesion\v2\modelos\instalacion_mod.php';

class Instalacion_Con{
    
    
    public $vista;

    public $objeto;

    public function __construct()
    {
        $this->vista = 'instalacion';
        $this->objeto = new Instalacion_Mod();
    }


    /**
     * Método encargado del proceso de instalación
     */
    public function porcesoInstalacion(){

    }
}