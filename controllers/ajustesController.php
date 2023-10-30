<?php

require 'src/render.php';

//actualizamos la sesion de ubicacion actual para en el breadcrumbs se actualiza y les de un buen fedback
//primero preguntamos si existe la variable de idioma y ahi establecemos las sessiones en el idoma adecuado

if(isset($_SESSION['lang'])){

    if($_SESSION['lang']=='es'){
        $_SESSION['ubicacion_actual']='ajustes';
    }else{
        $_SESSION['ubicacion_actual']='Settings';
    }
    
}



    echo render('ajustes');



