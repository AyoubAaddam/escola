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
            'Configuración'=>'Configuración de idioma y fondo',
            'Idioma'=> 'Idioma',
            'Español'=>'Español',
            'Ingles'=> 'Inglés',
            'Fondo_'=> 'Fondo Oscuro:',
            'texto_fondo'=> 'Activar fondo oscuro',
            'enviar'=> 'ENVIAR DATOS',
            'mensaje'=>'necesitas aceptar las cookies para poder acceder a todas las opciones'
        );
    }elseif($_SESSION['lang']=='en'){
      $lang = array(
        'Titulo' => 'Ayoub School',
        'ajustes' => 'Settings',
        'perfil' => 'Profile',
        'Configuración' => 'Language and Background Settings',
        'Idioma' => 'Language',
        'Español' => 'Spanish',
        'Ingles' => 'English',
        'Fondo_' => 'Dark Mode:',
        'texto_fondo' => 'Enable dark mode',
        'enviar' => 'SEND DATA',
        'mensaje'=>'you need to accept cookies to be able to access all the options'
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

    <h1><?php echo $lang['Configuración'];?></h1>
        
<?php 
$cookie=filter_input(INPUT_COOKIE,"Aceptar_cookies");
if($cookie==true){

?>

<form action="?url=idioma" method="POST">
<!-- hacemos este select para que el cliente eliga el idioma que desea -->
        <label for="idioma"><?php echo $lang['Idioma'];?>:</label>
        <select id="idioma" name="idioma">
            <option value="es"><?php echo $lang['Español'];?></option>
            <option value="en"><?php echo $lang['Ingles'];?></option>
        </select>
        
        <br>
        <!-- por si el cliente quiere tener la pagina con un modo oscuro aqui le ayudamos y cambiamos el fondo -->
        <label for="fondo"><?php echo $lang['Fondo'];?></label>
        <input type="checkbox" id="fondo" name="fondo"><?php echo $lang['texto_fondo'];?></input>

        <button class="submit-buton" type="submit"><?php echo $lang['enviar'];?></button>
</form>
    
<?php }else{
  echo "<h1>".$lang['mensaje']."</h1>";
} ?>    
        <?php include_once 'partials/footer.tpl.php';?>
</body>
</html>