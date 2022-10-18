<?php

class CategoriasModel{
    private $db;

    function __construct(){
        $this -> db = new PDO('mysql:host=localhost;'.'dbname=db_peleadores;charset=utf8', 'root', '');
    }

    function getCategorias(){
        $sentence = $this-> db -> prepare("SELECT * FROM categoria");
        $sentence -> execute();
        $categorias = $sentence -> fetchAll(PDO::FETCH_OBJ);
        return $categorias;
    }

    function getCategoria($id){
        $sentence = $this-> db -> prepare("SELECT * FROM categoria WHERE id = ?");
        $sentence -> execute([$id]);
        return $sentence -> fetch(PDO::FETCH_OBJ);
    }

    function insertCategoria($nombre, $peso){ 
        $sentence = $this-> db -> prepare("INSERT INTO `categoria`(nombre, peso) VALUES (?, ?)");
        $sentence -> execute([$nombre, $peso]);
    }

    function updateCategoria($nombre, $peso,$id){
        $sentence = $this-> db -> prepare("UPDATE categoria SET nombre = ?, peso = ? WHERE id = ?");
        $sentence -> execute([$nombre, $peso,$id]);
    }

    function deleteCategoria($id){
        $sentence = $this-> db -> prepare("DELETE FROM `categoria` WHERE id = ?");
        $sentence -> execute([$id]);
    }
}