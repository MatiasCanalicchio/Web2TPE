
<?php
  require_once "controller/PeleadoresController.php";
  require_once "controller\UsuarioController.php";

  define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

  $peleadoresController = new PeleadoresController();
  $usuariosController = new UsuariosController();
  // leemos la accion que viene por parametro
  $action = 'login'; // acción por defecto

  if (!empty($_GET['action'])) { // si viene definida la reemplazamos
      $action = $_GET['action'];
  }

  // parsea la accion Ej: dev/juan --> ['dev', juan]
  $params = explode('/', $action);

  // determina que camino seguir según la acción
  switch ($params[0]) {
      case 'login':
      $usuariosController -> showLogin();
        break;
      case 'iniciarSesion':
        $usuariosController -> verificarUsuario();
        break;
      case 'cerrarSesion':
          $usuariosController -> logout();
          break;
      case 'registrar':
        $usuariosController -> addUsuario($params[1]);
        break;
      case 'verPeleador':
        $peleadoresController -> showPeleador($params[1]);
          break;
      case 'verCategoria':
        $peleadoresController -> showCategoria($params[1]);
        break;
      case 'peleadores':
        $peleadoresController -> showPeleadores();
        break;
      case 'categorias':
        $peleadoresController -> showCategorias();
        break;
      case 'home':
        $peleadoresController -> showHome();
        break;
      case 'finalizarCategoria':
        $peleadoresController -> updateCategoria($params[1]);
        break;
      case 'editarCategoria':
        $peleadoresController -> showEditarCategoria($params[1]);
        break;
      case 'borrarCategoria':
        $peleadoresController -> deleteCategoria($params[1]);
        break;
      case 'agregarCategoria':
        $peleadoresController -> addCategoria();
        break;
      case 'borrarPeleador':
          $peleadoresController -> deletPeleador($params[1]);
        break;
      case 'finalizarPeleador':
        $peleadoresController -> updatePeleador($params[1]);
      break;
      case 'editarPeleador':
        $peleadoresController -> showEditarPeleador($params[1]);
        break;
      case 'agregarPeleador':
        $peleadoresController -> addPeleador($params[1]);
        break;
      default:
          echo('404 Page not found');
          break;
  }
?>
