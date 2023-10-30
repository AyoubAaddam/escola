<?php 
include_once 'partials/header.tpl.php';




// establecemos el lenjuage de la pagina y añadimos las adecuadas para la pagina
if(isset($_SESSION['lang'])){

    if($_SESSION['lang']=='es'){
        $lang = array(

            'Titulo'=> 'Colegio Ayoub',
            'ajustes'=>'Ajustes',
            'perfil'=> 'Perfil',
            'Tit1'=>'Bienvenidos a Colegio Ayoub',
            'texto1'=> 'Somos un colegio comprometido con la educación de calidad y ofrecemos un curso de Desarrollo de Aplicaciones Web (DAW) para prepararte en el mundo de la programación web.',
            'Tit2'=>'Información del Colegio',
            'texto2'=> 'Nuestro colegio se dedica a brindar una educación integral de alta calidad. Aquí puedes obtener más información sobre nuestra historia, misión y visión.',
            'Tit3'=>'Curso de Desarrollo de Aplicaciones Web (DAW)',
            'texto3'=>'Nuestro curso de DAW te proporcionará las habilidades necesarias para desarrollar aplicaciones web modernas. Aprenderás programación, diseño web y más.',
            'Contacto'=>'Contacto',
            'Contacto_texto'=> 'Puedes contactarnos en:',
            'Contecto_addres'=> 'Dirección: Calle del medio Teléfono: 99999999999999 Correo electrónico: ayoub@gmail.com '
        );
    }elseif($_SESSION['lang']=='en'){
        $lang = array(
            'Titulo' => 'Ayoub School',
            'ajustes' => 'Settings',
            'perfil' => 'Profile',
            'Tit1' => 'Welcome to Ayoub School',
            'texto1' => 'We are a school committed to quality education and offer a Web Development (DAW) course to prepare you for the world of web programming.',
            'Tit2' => 'School Information',
            'texto2' => 'Our school is dedicated to providing high-quality comprehensive education. Here you can find more information about our history, mission, and vision.',
            'Tit3' => 'Web Development (DAW) Course',
            'texto3' => 'Our DAW course will equip you with the necessary skills to develop modern web applications. You will learn programming, web design, and more.',
            'Contacto' => 'Contact',
            'Contacto_texto' => 'You can reach us at:',
            'Contecto_addres'=> 'Address: Middle Street Phone: 99999999999999 Email: ayoub@gmail.com'
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
$home=$_SESSION['home'];
?>

<body>


<header>
    <!-- creamos un breadcrumb para darele un buen feddback al cliente y que en todo momento sepa donde esta -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><?php echo $home; ?></li>
  </ol>
</nav>

        <h1><?php echo $lang['Titulo'];?></h1>
        <nav>
            <ul>
                <li><a href="?url=ajustes"><?php echo $lang['ajustes'];?></a></li>
                <li><a href="?url=personal"><?php echo $lang['perfil'];?></a></li>
               
            </ul>
        </nav>
    </header>

    <!-- procedemos a acceder a las variables de $lang para acceder al texto que necesitamos dependiendo del idioma -->
    <section id="inicio">
        <h2><?php echo $lang['Tit1'];?></h2>

        <p><?php echo $lang['texto1'];?></p>
    </section>

    <section id="informacion">
        <h2><?php echo $lang['Tit2'];?></h2>
        <p><?php echo $lang['texto2'];?></p>
    </section>

    <section id="curso">
        <h2><?php echo $lang['Tit3'];?></h2>
        <p><?php echo $lang['texto3'];?></p>
    </section>

    <section id="contacto">
        <h2><?php echo $lang['Contacto'];?></h2>
        <p><?php echo $lang['Contacto_texto'];?></p>
        <address>
        <?php echo $lang['Contecto_addres'];?>
        </address>
    </section>
    
    <?php include_once 'partials/footer.tpl.php';?>
</body>
</html>