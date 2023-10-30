<?php 
include_once 'partials/header.tpl.php';
if(isset($_SESSION['lang'])){
    if($_SESSION['lang']=='es'){
        $_SESSION['home']='Pagina Principal';
    }else{
        $_SESSION['home']='Home';
    }
}
$home=$_SESSION['home'];
?>
<body>


    <div class="container">
        <div class="image">
            <img src="src/views/logo.png" >
        </div>
        <div class="content">
            <h1><?php echo $home?></h1>
            <!-- links para acceder al login o ir a registrarte -->
            <a href="?url=login">Ir al login</a>
            <a href="?url=register">Ir al registro</a>
        </div>
    </div>
    <?php include_once 'partials/footer.tpl.php';?>

</body>
</html>