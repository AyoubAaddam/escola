<?php

function getRoute($routes) {
    // Si se introduce una ruta por la URL, se comprueba que exista en el array de rutas
    if (isset($_REQUEST['url'])) {
        $url = $_REQUEST['url'];

        // Si la ruta existe, se devuelve
        // Si la ruta no existe, se lanza una excepción
        if (in_array($url, $routes)) {
            return $url;
        } else {
            throw new Exception('La ruta no existe');
        }
    }
    // Si no se introduce una ruta por la URL, se devuelve null
    return null;
}

?>