<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escola <?= $title;?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <!-- hacemos un header general para incluirlo en todos los archivos y no tener que estar haciendo un heder cada vez que haces una pagina -->
    <?php
    

 //comprobamos si existe la sesion de fondo (que es si quiere el fondoo oscuro), entoce si existe le metemos los css del modo oscuro
    if(isset($_SESSION['fondo'])){
        
    ?>
    <link rel="stylesheet" href="/public/css/style_oscuro.css">
    <link rel="stylesheet" href="/public/css/principal_oscuro.css">
    <link rel="stylesheet" href="/public/css/login.css">
    <link rel="stylesheet" href="/public/css/home.css">
    <?php }else {?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-Yy4w/x1qB1tx0YjzO76dOrxlYO5pU8E9+KgoEzSO+IdJJHc/ZFPuTjDmiIM2ffuWg" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/login.css">
    <link rel="stylesheet" href="/public/css/home.css">
    <link rel="stylesheet" href="/public/css/principal.css">
    <?php }?>
</head>