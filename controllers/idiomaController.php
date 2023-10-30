<?php
require 'src/render.php';
//cogemos el post de idioma y lo almacenamos en una variable
$idioma = $_POST['idioma'];

//preguntamos si existe la sesion lang, si existe entra al if, la session se crea la principo en el index.php
if(isset($_SESSION['lang'])){
//si en el select hemos elegido español configuramos la sesion como español
    if ($idioma == "es") {
        $_SESSION['lang']='es';
       //si en el select hemos elegido ingles configuramos la sesion como ingles
    } elseif ($idioma == "en") {
        $_SESSION['lang'] = 'en';
    }

}

//comprobamos el post de fondo y si es true entra y nos crea la sesion de fondo oscuro para poder cambiar el tema de la pagina
if(isset($_POST['fondo']) ){
    $_SESSION['fondo'] = 'oscuro';
}

//require_once "../../idiomas/" . $_SESSION['lang'] . ".php";
//var_dump($_SESSION['lang']);

echo render('principal');

?>
