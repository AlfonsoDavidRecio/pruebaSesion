<?php

require_once __DIR__ . '/../config/configHost.php';

class Instalacion_Mod{

    private $conexion;

    /**
     * Constructor de la clase Powerup_Mod.
     */
    public function __construct()
    {
        $this->conexion = new mysqli(DB_HOST_V2,DB_USER_V2,DB_PASSWORD_V2,DB_NAME_V2);
    }

    /**
     * Verifica si la tabla admins existe.
     */
    public function verificarTabla(){
        $sql = "SHOW TABLES LIKE 'admins'";
        $result = $this->conexion->query($sql);
        return $result->num_rows > 0;
    }

    /**
     * Crea la tabla admins.
     */
    public function crearTabla(){
        $sql = "
        CREATE TABLE admins (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(30) NOT NULL,
            pw VARCHAR(255) NOT NULL,
            correo VARCHAR(100) NOT NULL,
            perfil CHAR(1) NOT NULL
        ) ENGINE=InnoDB;";
    
        $this->conexion->query($sql);
    }

    /**
     * Inserta una fila en la tabla admins
     */
    public function inserccionInicial(){
        $sql = "INSERT INTO admins (nombre, pw, correo, perfil) VALUES (?, ?, ?, ?)";

        //Preparar consulta
        $consultaPreparada = $this->conexion->prepare($sql);

        $consultaPreparada->bind_param("ssss", $nombre, $pw, $correo, $perfil);

        //Dar valores a los parametros
        $nombre = 'superAdmin';
        $pw = password_hash('1234', PASSWORD_DEFAULT); //Encriptar contraseña
        $correo = 'adminEjemplo@gmail.com';
        $perfil = 's'; 

        $consultaPreparada->execute();

        $consultaPreparada->close();
    }
    
}