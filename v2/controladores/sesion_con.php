<?php

require_once __DIR__ . '/../modelos/sesion_mod.php';

class Sesion_con{
    
    
    public $vista;

    public $objeto;

    public function __construct()
    {
        $this->vista = '/inicioSesion/login';
        $this->objeto = new Sesion_Mod();
    }

    /**
     * Al hacer un alta de un nuevo admin que administrará un minijuego
     */
    public function register(){
        $this->vista = '/inicioSesion/registrar';

        if(isset($_POST['correo']) && isset($_POST['pw']) && isset($_POST['nombre'])){
            $this->objeto->registrar($_POST['correo'], $_POST['pw'], $_POST['nombre'],"a");    
        }else{
            echo 'No hay datos para el registro';
        }
        
    }


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
                        header("Location: index.php?control=sesion_con&metodo=cambiarVistaRegistrar");
                        break;
                    case 'a':
                        header("Location: index.php?control=sesion_con&metodo=cambiarVistaMinijuego");
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
    public function cambiarVistaRegistrar(){
        $this->vista = '/inicioSesion/registrar';
    }

    /**
     * Metodo que cambia la vista por defecto a la vista de minijuegos
     */
    public function cambiarVistaMinijuego(){
        $this->vista = '/inicioSesion/minijuego';
    }

    public function cerrarSesion(){
        $this->vista = '/inicioSesion/login';

        //Inicia la sesion
        session_start();

        //Para despues destruirla
        session_destroy();
    }
}