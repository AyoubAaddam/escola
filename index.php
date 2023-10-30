<?php 

session_start();

// Se incluye el enrutador y las rutas
require 'src/router.php';
require 'src/routes.php';
require 'src/db.php';

//$db=connect($dsn,$dbuser,$dbpass);
//die;

if(!isset($_SESSION['lang'])){
    $_SESSION['lang']='es';
    $_SESSION['home'] = 'Pagina Principal';
}


try {
    // Obtenemos la ruta
    $controller = getRoute($routes);

    // En caso de que la ruta esté vacía, se asigna el controlador por defecto (home)
    // En caso de que la ruta esté definida, se asigna el controlador correspondiente
    // Si la ruta no existe, se lanza una excepción y se muestra la página de error
    $controller == null ? $controller = 'home' : $controller;

    // Se incluye el controlador correspondiente
    require 'controllers/' . $controller . 'Controller.php';
} catch (Exception $e) {
    $_SESSION['error'] = $e->getMessage();
    require 'public/error.php';
}



?>