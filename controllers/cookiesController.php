<?php

if(isset($_POST['cookies'])){
$cookie=$_POST['cookies'];
    if($cookie==true){
        setcookie("COOKIE",$cookie,0,"/","localhost");
    }else{
        setcookie("COOKIE",$cookie,0,"/","localhost");
    }


    
}
require 'src/views/principal.tpl.php';