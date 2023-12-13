<?php

require_once 'C:\xampp\htdocs\pruebaSesion\v1\modelos\sesion_mod.php';

class Sesion_Con{
    
    
    public $vista;

    public $objeto;

    public function __construct()
    {
        $this->vista = 'login';
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
            echo $_POST['pw'];
            $resultadoUsuario = $this->objeto->login($_POST['nombre'], $_POST['pw']);    
            
            if($resultadoUsuario){
                //Inicio de Sesion
                session_start();

                $_SESSION['idUsuario'] = $resultadoUsuario[0]['idUsuario'];
                $_SESSION['nombre'] = $resultadoUsuario[0]['nombre'];
                $_SESSION['correo'] = $resultadoUsuario[0]['correo'];
                $_SESSION['perfil'] = $resultadoUsuario[0]['perfil'];
                
                switch($_SESSION['perfil']){
                    case 0:
                        header("Location: vistas/vistaEcocatch.php");
                        break;
                    case 1:
                        header("Location: vistas/vistaCulturalChain.php");
                        break;
                    case 2:
                        header("Location: vistas/vistaTetris.php");
                        break;
                    default:
                        header("Location: ./");
                }

                //Para asegurarse que la redireccion se ejecute correctamente
                exit();
            }else{
                echo 'Inicio de Sesion fallido';
            }

        }else{
            echo 'No hay datos para el inicio de sesion';
        }
    }
}