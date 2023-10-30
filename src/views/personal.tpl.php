<?php 
include_once 'partials/header.tpl.php';

$ubicacion_actual=$_SESSION['ubicacion_actual'];
$home=$_SESSION['home'];
// establecemos el lenjuage de la pagina y añadimos las adecuadas para la pagina

if(isset($_SESSION['lang'])){

  if($_SESSION['lang']=='es'){
      $lang = array(
          'Titulo'=> 'Colegio Ayoub',
          'ajustes'=>'Ajustes',
          'perfil'=> 'Perfil',
          'Añadir_Datos'=>'Añadir Datos',
          'Salir'=> 'Salir de la Cuenta'
      );
  }elseif($_SESSION['lang']=='en'){
    $lang = array(
      'Titulo' => 'Ayoub School',
      'ajustes' => 'Settings',
      'perfil' => 'Profile',
      'Añadir_Datos' => 'Add Data',
      'Salir' => 'Log Out'
  );
  
  }
}

if(isset($_SESSION['lang'])){
  if($_SESSION['lang']=='es'){
      $_SESSION['home']='Pagina Principal';
  }else{
      $_SESSION['home']='Home';
  }
}

?>

<body>

<header>

<!-- creamos un breadcrumb para darele un buen feddback al cliente y que en todo momento sepa donde esta -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?url=principal"><?php echo $home;?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $ubicacion_actual;?></li>
  </ol>
</nav>
   <!-- procedemos a acceder a las variables de $lang para acceder al texto que necesitamos dependiendo del idioma -->
        <h1><?php echo $lang['Titulo'];?></h1>
        <nav>
            <ul>
                <li><a href="?url=ajustes"><?php echo $lang['ajustes'];?></a></li>
                <li><a href="?url=personal"><?php echo $lang['perfil'];?></a></li>
               
            </ul>
        </nav>
    </header>

    <h1><?php echo $lang['perfil'];?></h1>
        
   

        <form action="?url=Añadir" method="POST">
        <label for="fondo"><?php echo $lang['Añadir_Datos'];?></label>
        <input id="datos" name="datos" type="text" password />
        <button  type="submit"><?php echo $lang['Añadir_Datos'];?></button>
        </form>
        
        <br>
        
        
      

        <form action="?url=Salir" method="POST">
        <label for="salir"><?php echo $lang['Salir'];?></label>
        <button  type="submit"><?php echo $lang['Salir'];?></button>
        
        </form>




     
    
        <?php include_once 'partials/footer.tpl.php';?>
</body>
</html>