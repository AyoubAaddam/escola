<?php

require 'src/render.php';

//rescribimos la session para el breadcrumbs

//primero preguntamos si existe la variable de idioma y ahi establecemos las sessiones en el idoma adecuado
if(isset($_SESSION['lang'])){
    if($_SESSION['lang']=='es'){
        $_SESSION['ubicacion_actual']='personal';
    }else{
        $_SESSION['ubicacion_actual']='Profile';
    }
   
}




echo render('personal');
