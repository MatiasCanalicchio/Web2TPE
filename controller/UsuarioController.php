<?php

require_once "view\UsuarioView.php";
require_once "model\UsuariosModel.php";

class UsuariosController{
    private $loginView;
    private $modelu;

    function __construct(){
        $this->loginView = new UsuariosView();
        $this->modelu = new UsuariosModel();
    } 

    function showLogin(){
        $this->loginView->renderLogin();
    }

    function addUsuario(){
        $mail = $_POST['mail'];
        $contrasenia = $_POST['contrasenia'];
        $clave_encriptada = password_hash ($contrasenia , PASSWORD_DEFAULT );
        if (!empty($mail) && !empty($clave_encriptada)){
            $this -> modelu-> insertUsuario($mail,$clave_encriptada);
        }
        $this->loginView->renderLogin();
    }

    function verificarUsuario(){
        $mail = $_POST['mail'];
        $contrasenia = $_POST['contrasenia'];
        $usuario = $this -> modelu -> getUsuario();
        if (!empty($mail) && !empty($contrasenia)){
            if(isset($usuario) && $usuario){
                if (password_verify($contrasenia, $usuario->contrasenia)){
                    session_start();
                    $_SESSION['mail'] = $usuario->mail;
                    header("Location:".BASE_URL."home");
                }else{
                    $this->loginView->renderLogin();
                }
            }
        }
    }

    function checkLoggedIn(){
        session_start();
        if (!isset($_SESSION['mail'])){
            return false;
        }else{
            return true;
        }
    }

    function logout(){
        session_start();        
        session_destroy();
        header("Location:".BASE_URL."login");
    }
}