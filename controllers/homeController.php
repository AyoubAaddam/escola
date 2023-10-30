<?php

require 'src/render.php';

//llevamos a la vista del home

if(isset($_SESSION['lang'])){
    if($_SESSION['lang']=='es'){
        $_SESSION['home']='Pagina Principal';
    }else{
        $_SESSION['home']='Home';
    }
}

$home=$_SESSION['home'];
echo render('home', ['title' => $home]);