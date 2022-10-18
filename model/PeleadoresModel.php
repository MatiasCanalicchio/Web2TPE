<?php

class PeleadoresModel{
    private $db;

    function __construct(){
        $this -> db = new PDO('mysql:host=localhost;'.'dbname=db_peleadores;charset=utf8', 'root', '');
    }

    function getPeleadores(){
        $sentence = $this-> db -> prepare("SELECT * FROM peleador");
        $sentence -> execute();
        $peleadores = $sentence -> fetchAll(PDO::FETCH_OBJ);
        return $peleadores;
    }

    function getPeleador($id){
        $sentence = $this-> db -> prepare("SELECT * FROM peleador WHERE id = ?");
        $sentence -> execute([$id]);
        $peleador = $sentence -> fetch(PDO::FETCH_OBJ);
        return $peleador;
    }

    function getPeleadorCategoria($id){
        $sentence = $this-> db -> prepare("SELECT * FROM peleador WHERE id_categoria = ?");
        $sentence -> execute([$id]);
        $peleador = $sentence -> fetchAll(PDO::FETCH_OBJ);
        return $peleador;
    }

    function addPeleador($nombre, $peso, $nacionalidad, $id_categoria){
        $sentence = $this-> db -> prepare("INSERT INTO peleador(nombre, peso, nacionalidad, id_categoria) VALUES (?, ?, ?, ?)");
        $sentence -> execute([$nombre, $peso, $nacionalidad, $id_categoria]);
    }

    function updatePeleador($nombre, $peso, $nacionalidad, $id_categoria,$id){
        $sentence = $this-> db -> prepare("UPDATE peleador SET nombre = ?, peso = ?, nacionalidad = ?, id_categoria = ? WHERE id = ?");
        $sentence -> execute([$nombre, $peso, $nacionalidad, $id_categoria,$id]);
    }

    function deletePeleador($id){
        $sentence = $this-> db -> prepare("DELETE FROM `peleador` WHERE id = ?");
        $sentence -> execute([$id]);
    }
}