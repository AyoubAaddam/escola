<?php

require 'src/render.php';

try {
    // Conectarse a la base de datos MySQL
    $dsn = 'mysql:host=localhost;dbname=ESCOLA';
    $userdb = 'escola';
    $passdb = 'escola';
    
    $db = connectMysql($dsn, $userdb, $passdb);

    // Datos que deseas insertar
    $email = $_POST['email'];
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
$user_type = $_POST['user_type'];



if ($user_type === "students") { 

    $rol_id=1;
// Preparar la consulta SQL de inserción
$query = "INSERT INTO users (email,passwd,rol_id) VALUES (:email,:passwd,:rol_id)";
    $stmt = $db->prepare($query);

    // Asignar valores a los parámetros de la consulta
   
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':passwd', $password);
    $stmt->bindParam(':rol_id', $rol_id);

}else if($user_type === "teachers"){
    $rol_id=2;
    // Preparar la consulta SQL de inserción
    $query = "INSERT INTO users (email,passwd,rol_id) VALUES (:email,:passwd,:rol_id)";
        $stmt = $db->prepare($query);
    
        // Asignar valores a los parámetros de la consulta
        $stmt->bindParam(':email', $email);
    $stmt->bindParam(':passwd', $password);
    $stmt->bindParam(':rol_id', $rol_id);}

   /*  $id = 1;
    $user_id = 1;
    $parents_name = 'Ayoub@gmail.com';
    

    // Preparar la consulta SQL de inserción
    $query = "INSERT INTO users (id,user_id,parent_name) VALUES (:id, :user_id, :parents_name)";
    $stmt = $db->prepare($query);

    // Asignar valores a los parámetros de la consulta
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':parents_name', $parents_name); */

    // Ejecutar la consulta de inserción
    $stmt->execute();

    // Aquí puedes manejar el resultado si es necesario
    echo "Inserción exitosa.";
    ?>
    <a href="?url=login">Ir al login</a> <?php
} catch (PDOException $e) {
    die($e->getMessage());
}
