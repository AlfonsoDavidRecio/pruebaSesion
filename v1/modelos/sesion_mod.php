<?php

require_once __DIR__ . '\..\config\configHost.php';

class Sesion_Mod{

    private $conexion;

    /**
     * Constructor de la clase Powerup_Mod.
     */
    public function __construct()
    {
        $this->conexion = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    }


    /**
     * Hace el select del usuario para ver si esta en la base de datos
     */
    public function login($nombre,$pw){
        $sql = "SELECT idUsuario, correo, nombre, perfil FROM us_Admin WHERE nombre = ? AND pw = ?";
    
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ss", $nombre, $pw);
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        $consulta = array();
        while ($row = $result->fetch_assoc()) {
            $consulta[] = $row;
        }
    
        $stmt->close();
    
        return $consulta;
    }
}