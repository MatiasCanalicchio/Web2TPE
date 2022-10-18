<?php

use LDAP\Result;

require_once './model/PeleadoresModel.php';
require_once './view/PeleadoresView.php';
require_once 'view\CategoriasView.php';
require_once 'model\Categoriasmodel.php';
require_once 'view\HomeView.php';
require_once 'controller\UsuarioController.php';


class PeleadoresController{
    private $modelp;
    private $viewp;
    private $modelc;
    private $viewc;
    private $viewh;
    private $ctrlu;

    function __construct(){
        $this -> modelp = new PeleadoresModel();
        $this -> viewp = new PeleadoresView();
        $this -> modelc = new CategoriasModel();
        $this -> viewc = new CategoriasView();
        $this -> viewh = new HomeView();
        $this -> ctrlu = new UsuariosController();
    }

    function showHome(){
        $categorias = $this -> modelc -> getCategorias();
        $peleadores = $this -> modelp -> getPeleadores();
        $loggeado = $this -> ctrlu -> checkLoggedIn();
        foreach ($categorias as $categoria) {
            $categoriasNombres[$categoria -> id] = $categoria -> nombre;
        }
        $this -> viewh -> renderHome($categorias,$peleadores,$categoriasNombres,null,$loggeado);
    }

    function showPeleadores(){
        $categorias = $this -> modelc -> getCategorias();
        $peleadores = $this -> modelp -> getPeleadores();
        foreach ($categorias as $categoria) {
            $categoriasNombres[$categoria -> id] = $categoria -> nombre;
        }
        $this -> viewp -> renderPeleadores($peleadores,$categoriasNombres);
    }

    function showEditarCategoria($id){
        $loggeado = $this -> ctrlu -> checkLoggedIn();
        if ($loggeado == true){
            $this -> viewc -> renderEditar($id);
        }else{
            $this -> ctrlu -> showLogin();
        }
    }

    function updateCategoria($id){
        $loggeado = $this -> ctrlu -> checkLoggedIn();
        if ($loggeado == true){
            $nombre = $_POST['nombre'];
            $peso = $_POST['peso'];
            if (!empty($nombre) && !empty($peso)) {
                $this -> modelc -> updateCategoria($nombre,$peso,$id);
            }
            $this -> viewh -> relocateHome();
        }else{
            $this -> ctrlu -> showLogin();
        }
    }
    
    function showCategorias(){
        $categorias = $this -> modelc -> getCategorias();
        $this -> viewc -> renderCategorias($categorias);
    }
    
    function deleteCategoria($id){
        $loggeado = $this -> ctrlu -> checkLoggedIn();
        if ($loggeado == true){
            try {
                $this -> modelc -> deleteCategoria($id);
                $this -> viewh -> relocateHome();
            } catch (Exception $e) {
                $categorias = $this -> modelc -> getCategorias();
                $peleadores = $this -> modelp -> getPeleadores();
                foreach ($categorias as $categoria) {
                    $categoriasNombres[$categoria -> id] = $categoria -> nombre;
                }
                $this -> viewh -> renderHome($categorias,$peleadores,$categoriasNombres,"no se puede eliminar la categoria",$loggeado);
            }
        }else{
            $this -> ctrlu -> showLogin();
        }
    }
    
    function addCategoria(){
        $loggeado = $this -> ctrlu -> checkLoggedIn();
        if ($loggeado == true){
            $nombre = $_POST['nombre'];
            $peso = $_POST['peso'];
            if (!empty($nombre) && !empty($peso)){
                $this -> modelc -> insertCategoria($nombre, $peso);
            }
            $this -> viewh -> relocateHome();
        }else{
            $this -> ctrlu -> showLogin();
        }
    }

    function deletPeleador($id){
        $loggeado = $this -> ctrlu -> checkLoggedIn();
        if ($loggeado == true){
            try {
                $this -> modelp -> deletePeleador($id);
                $this -> viewh -> relocateHome();
            } catch (Exception $e) {
                $categorias = $this -> modelc -> getCategorias();
                $peleadores = $this -> modelp -> getPeleadores();
                foreach ($categorias as $categoria) {
                    $categoriasNombres[$categoria -> id] = $categoria -> nombre;
                }
                $this -> viewh -> renderHome($categorias,$peleadores,$categoriasNombres,"no se puede eliminar al peleador",$loggeado);
            }
        }else{
            $this -> ctrlu -> showLogin();
        }
    }

    function addPeleador(){
        $loggeado = $this -> ctrlu -> checkLoggedIn();
        if ($loggeado == true){
            $nombre = $_POST['nombre'];
            $peso = $_POST['peso'];
            $nacionalidad = $_POST['nacionalidad'];
            $id_Categoria = $_POST['categoria'];
            if (!empty($nombre) && !empty($peso) && !empty($nacionalidad) && !empty($id_Categoria)){
            $this -> modelp -> addPeleador($nombre, $peso, $nacionalidad, $id_Categoria);
        }
            $this -> viewh -> relocateHome();
        }else{
            $this -> ctrlu -> showLogin();
        }
   }

    function showEditarPeleador($id){
        $loggeado = $this -> ctrlu -> checkLoggedIn();
        if ($loggeado == true){
            $categorias = $this -> modelc -> getCategorias();
            $this -> viewp -> renderEditar($id,$categorias);
        }else{
            $this -> ctrlu -> showLogin();
        }
   }

    function updatePeleador($id){
        $loggeado = $this -> ctrlu -> checkLoggedIn();
        if ($loggeado == true){
            $nombre = $_POST['nombre'];
            $peso = $_POST['peso'];
            $nacionalidad = $_POST['nacionalidad'];
            $id_Categoria = $_POST['categoria'];
            if (!empty($nombre) && !empty($peso) && !empty($nacionalidad) && !empty($id_Categoria)){
                $this -> modelp -> updatePeleador($nombre,$peso,$nacionalidad,$id_Categoria,$id);
            }
            $this -> viewh -> relocateHome();
        }else{
            $this -> ctrlu -> showLogin();
        }
    }
    
    function showPeleador($id){
        $peleador = $this -> modelp -> getPeleador($id);
        $categoria = $this -> modelc -> getCategoria($peleador->id_categoria);
        $this->viewp->renderPeleador($peleador,$categoria);
    }

    function showCategoria($id){
        $categoria = $this -> modelc -> getCategoria($id);
        $peleadores = $this -> modelp -> getPeleadorCategoria($id);
        $this->viewc->renderCategoria($peleadores,$categoria);
    }
}