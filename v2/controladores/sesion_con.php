<?php

require_once __DIR__ . '\..\modelos\sesion_mod.php';

class Sesion_con{
    
    
    public $vista;

    public $objeto;

    public function __construct()
    {
        $this->vista = '/inicioSesion/login';
        $this->objeto = new Sesion_Mod();
    }

    /**
     * Al hacer un alta estas registrando un usuario nuevo
     */
    /*public function register(){
        $this->vista = 'login';
        if(isset($_POST['correo']) && isset($_POST['pw']) && isset($_POST['nombre']) && isset($_POST['perfil'])){
            $this->objeto->registrar($_POST['correo'], $_POST['pw'], $_POST['nombre'], $_POST['perfil']);    
        }else{
            echo 'No hay datos para el registro';
        }
        
    }*/

    /**
     * Esta es la funcion correspondiente para iniciar sesion
     */
    public function iniciar(){
        if(isset($_POST['nombre']) && isset($_POST['pw'])){
            
            $resultadoUsuario = $this->objeto->login($_POST['nombre'], $_POST['pw']);    
            //var_dump($resultadoUsuario);
            if($resultadoUsuario){
                //Inicio de Sesion
                session_start();

                $_SESSION['id'] = $resultadoUsuario[0]['id'];
                $_SESSION['nombre'] = $resultadoUsuario[0]['nombre'];
                $_SESSION['correo'] = $resultadoUsuario[0]['correo'];
                $_SESSION['perfil'] = $resultadoUsuario[0]['perfil'];
                
                switch($_SESSION['perfil']){
                    case 's':
                        header("Location: vistas/inicioSesion/registrar.php");
                        break;
                    case 'a':
                        header("Location: vistas/inicioSesion/minijuego.php");
                        break;
                    default:
                        header("Location: ./");
                }

                //Para asegurarse que la redireccion se ejecute correctamente
                exit();
            }else{
                header("Location: index.php?control=sesion_con&mensaje=false");
            }

        }else{
            header("Location: index.php?control=sesion_con&mensaje=false");
        }
    }
}