<?php 


require 'src/render.php';

   
    /*
     try {
        // Conectarse a la base de datos MySQL
        $dsn = 'mysql:host=localhost;dbname=ESCOLA';
        $userdb = 'escola';
        $passdb = 'escola';
        
        $db = connectMysql($dsn, $userdb, $passdb);
    
        // Datos que deseas insertar
    
    if(isset($_POST['email']) && isset($_POST['password'])) { 
    
        //recordarme 
    // Preparar la consulta SQL de inserción
    $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $db->prepare($query);
       
        $stmt->bindParam(':email', $_POST['email']);
    
        $stmt->execute();
    
    
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
       // var_dump($user);
        
       $email=$_POST['email'];
    $password=$_POST['password'];
    //generamos un array con los datos, por si el cliente le da a recordarme , tengamos los datos para futuros inicios
    $array=['email'=> $email, 'password'=>$password];

    //comprobamso que la contraseña del usuario es la misma, en la bd se gurda haseada entoces usamos el passwor_verifiy
        if(password_verify($password, $user[0]['passwd'])){
            
            //si le damos a recordarme, nos guardamos las cookies 
            if(isset($_POST['recordarme']) ){
                setcookie("recordarme","true",0,"/","localhost");
                setcookie("array",serialize($array),0,"/","localhost");
                setcookie("Aceptar_cookies","true",0,"/","localhost");
            }
            if(isset($_POST['Aceptar_cookies'])){
                setcookie("Aceptar_cookies","true",0,"/","localhost");
            }
//nos guardamos el email y la contraseña con sesiones para la navegacion
           $_SESSION['email']= $email;
           $_SESSION['password']= $password;
//configuramos la cookie para el breadcrumbs
if(isset($_SESSION['lang'])){
    if($_SESSION['lang']=='es'){
        $_SESSION['home']='Pagina Principal';
    }else{
        $_SESSION['home']='Home';
    }
   
}

           //lo enviamos a la pagina pricipal
           echo render ('principal') ;
        }
    
    }
    
        
        
    
       
        
    
        // Aquí puedes manejar el resultado si es necesario
        
        ?>
        <a href="?url=home">SALIR</a> <?php
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    */
    

// Función de autenticación
function authenticateUser($email, $password) {
    try {
        // Conectarse a la base de datos MySQL
      
        $dsn = 'mysql:host=localhost;dbname=ESCOLA';
        $userdb = 'escola';
        $passdb = 'escola';
        
        $db = connectMysql($dsn, $userdb, $passdb);

        // Preparar la consulta SQL para buscar un usuario por correo electrónico
$query = "SELECT * FROM users WHERE email = :email";

        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['passwd'])) {
            // Las credenciales son correctas
           
       //nos guardamos el email y la contraseña con sesiones para la navegacion
       $_SESSION['email']= $user['email'];
       $_SESSION['password']= $user['passwd'];
       $_SESSION['user_id']= $user['id'] ; 

            return true;
            
        } else {
            // Las credenciales son incorrectas
            
            return false;
        }
    } catch (PDOException $e) {
        // lanzamos el error 
        die($e->getMessage());
    }

}

function seting($user_id){
    // Accede a la tabla "settings" y configura las sesiones

try {
    $dsn = 'mysql:host=localhost;dbname=ESCOLA';
    $userdb = 'escola';
    $passdb = 'escola';

    $db = new PDO($dsn, $userdb, $passdb);

    // Consulta SQL para buscar la configuración del usuario por ID
    $query = "SELECT * FROM settings WHERE user_id = :user_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->execute();

    $settings = $stmt->fetch(PDO::FETCH_ASSOC);

    //$_SESSION['lang'] = $settings['idioma'];
    //$_SESSION['fondo'] = $settings['fondo'];
    if ($settings != null){
        return $settings;
    }
} catch (PDOException $e) {
    die($e->getMessage());
}
}




// Uso de la función para autenticar al usuario
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    $array=['email'=> $email, 'password'=>$password];

    if (authenticateUser($email, $password)) {
        // Si las credenciales son correctas, guarda cookies y realiza otras operaciones

        if(isset($_POST['recordarme']) ){
            setcookie("recordarme","true",0,"/","localhost");
            setcookie("array",serialize($array),0,"/","localhost");
            setcookie("Aceptar_cookies","true",0,"/","localhost");
        }
        if(isset($_POST['Aceptar_cookies'])){
            setcookie("Aceptar_cookies","true",0,"/","localhost");
        }

        $settings=seting($_SESSION['user_id']);
        if($settings!=null){
            $_SESSION['lang'] = $settings['idioma'];
    $_SESSION['fondo'] = $settings['fondo'];
            
        }

    } else {
        // Las credenciales son incorrectas, muestra un mensaje de error
        echo "Credenciales incorrectas";
    }
}



// Configura la sesión para el breadcrumb y redirige

echo render('principal');

?>
<a href="?url=home">SALIR</a>
 <?php





// Si el usuario existe en la base de datos, redirigir a la dashboard
// Si el usuario no existe en la base de datos, redirigir a la página de home

?>