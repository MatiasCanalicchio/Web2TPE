<?php

class UsuariosModel{
    private $db;

    function __construct(){
        $this -> db = new PDO('mysql:host=localhost;'.'dbname=db_peleadores;charset=utf8', 'root', '');
    }

    function insertUsuario($mail,$clave_encriptada){ 
        $sentence = $this-> db -> prepare("INSERT INTO `usuario`(mail, contrasenia) VALUES (?, ?)");
        $sentence -> execute([$mail,$clave_encriptada]);
    }

    function getUsuario(){
        $sentence = $this-> db -> prepare("SELECT * FROM usuario");
        $sentence -> execute();
        $usuario = $sentence -> fetch(PDO::FETCH_OBJ);
        return $usuario;
    }
}