<?php


if (isset($_SESSION['email']) && isset($_SESSION['password'])&& isset($_SESSION['user_id'])) {
    try {
        $dsn = 'mysql:host=localhost;dbname=ESCOLA';
        $userdb = 'escola';
        $passdb = 'escola';

        $db = new PDO($dsn, $userdb, $passdb);

        $fondo = $_SESSION['fondo'];
        $idioma = $_SESSION['lang'];
        $userId =$_SESSION['user_id']; // Reemplaza 1 con el ID del usuario al que pertenecen estos datos

        // Define una consulta SQL para insertar los datos de sesión en la tabla "settings"
        $query = "INSERT INTO settings (fondo, idioma, user_id) VALUES (:fondo, :idioma, :userId)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':fondo', $fondo);
        $stmt->bindParam(':idioma', $idioma);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    } catch (PDOException $e) {
        // Maneja cualquier error de base de datos aquí
        die($e->getMessage());
    }
}



session_destroy();
//destruimos la sesion y redirigimos al home 
require 'homeController.php';

