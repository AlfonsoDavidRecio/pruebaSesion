<?php

require_once __DIR__ . '\..\modelos\sesion_mod.php';

class Sesion_Con{
    
    
    public $vista;

    public $objeto;

    public function __construct()
    {
        $this->vista = 'login';
        $this->objeto = new Sesion_Mod();
    }

    /**
     * Esta es la funcion correspondiente para iniciar sesion
     */
    public function iniciar(){
        if(isset($_POST['nombre']) && isset($_POST['pw'])){
    
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
                        header("Location: index.php?control=sesion_con&metodo=cambiarVista1");
                        break;
                    case 1:
                        header("Location: index.php?control=sesion_con&metodo=cambiarVista2");
                        break;
                    case 2:
                        header("Location: index.php?control=sesion_con&metodo=cambiarVista3");
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

    /**
     * Metodo que cambia la vista por defecto a la vista de registrar
     */
    public function cambiarVista1(){
        $this->vista = 'vistaEcocatch';
    }

    /**
     * Metodo que cambia la vista por defecto a la vista de minijuegos
     */
    public function cambiarVistaMinijueg2(){
        $this->vista = 'vistaCulturalChain';
    }

    public function cambiarVistaMinijueg3(){
        $this->vista = 'vistaTetris';
    }
}