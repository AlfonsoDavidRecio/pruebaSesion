<?php

require_once __DIR__ . '\..\modelos\instalacion_mod.php';

class Instalacion_Con{
    
    
    public $vista;

    public $objeto;

    public function __construct()
    {
        $this->vista = '/instalacion/instalacion';
        $this->objeto = new Instalacion_Mod();
    }


    /**
     * Método encargado del proceso de instalación
     */
    public function procesoInstalacion()
    {
        /**
         * Verificar si la tabla existe. Si existe no hace nada. Si no existe crea la tabla e inserta una fila
         */
        if (!$this->objeto->verificarTabla()) {
            //No existe
            $this->objeto->crearTabla();

            $this->objeto->inserccionInicial();

            //Redireccionar al inicio de sesion
            header("Location: index.php?control=sesion_con");
        }else{
            header("Location: index.php?control=Instalacion_Con&mensaje=instalacionFallida");
        }
    }
}