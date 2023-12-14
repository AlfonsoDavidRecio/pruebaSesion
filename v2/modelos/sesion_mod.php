<?php

require_once __DIR__ . '\..\config\configHost.php';

class Sesion_Mod{

    private $conexion;

    /**
     * Constructor de la clase Powerup_Mod.
     */
    public function __construct()
    {
        $this->conexion = new mysqli(DB_HOST_V2,DB_USER_V2,DB_PASSWORD_V2,DB_NAME_V2);
    }

    /**
     * Inserta un nuevo usuario
     */
    /*public function registrar($correo,$pw,$nombre,$perfil){
        $sql = 'INSERT INTO us_Admin (correo, pw, nombre, perfil) VALUES ("'.$correo.'", "'.$pw.'", "'.$nombre.'", "'.$perfil.'")';

        $this->conexion->query($sql);
    }*/

    /**
     * Hace el select del usuario para ver si esta en la base de datos
     */
    public function login($nombre,$pw){
        $sql = "SELECT id, correo, nombre, perfil, pw FROM admins WHERE nombre = ?";
    
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        $consulta = array(); // Inicializar el array antes de su uso

        $row = $result->fetch_assoc();

        if ($row && password_verify($pw, $row['pw'])) {
            // La contraseña es válida
            unset($row['pw']); // No incluir la contraseña en los resultados finales
            $consulta[] = $row;
        }
        
        $stmt->close();
        
        return $consulta;
    }
}