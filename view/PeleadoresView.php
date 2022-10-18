<?php

require_once './libs/Smarty.class.php';


class PeleadoresView{
    private $smarty;

    function __construct(){
        $this -> smarty = new Smarty();
    }

    function renderPeleadores($peleadores,$categoriasNombres){
        $this -> smarty -> assign("peleadores", $peleadores);
        $this -> smarty -> assign("categoriasNombres", $categoriasNombres);
        $this -> smarty -> display("./templates/peleadores.tpl");
    }

    function renderEditar($id,$categorias){
        $this -> smarty -> assign("id", $id);
        $this -> smarty -> assign("categorias", $categorias);
        $this -> smarty -> display("./templates/editarPeleador.tpl");
    }

    function renderPeleador($peleador,$categoria){
        $this -> smarty -> assign("peleador", $peleador);
        $this -> smarty -> assign("categoria", $categoria);
        $this -> smarty -> display("./templates/mostrarPeleador.tpl");
    }
}