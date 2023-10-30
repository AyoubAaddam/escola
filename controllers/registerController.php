<?php


require 'src/render.php';

if(isset($_SESSION['lang'])){
    if($_SESSION['lang']=='es'){
        $registro='Pagina Registro';
    }else{
        $registro='register-render';
    }
}



echo render('register', ['title' => $registro]);