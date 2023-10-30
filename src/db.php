
<?php
// Función para conectar a una base de datos SQLite
function connectSqlite(string $dbname){
    try {
        // Crea una conexión a la base de datos SQLite
        $db = new PDO('sqlite:'.__DIR__.'/database/'.$dbname.'.sqlite');

        // Configura el modo de manejo de errores para que las excepciones sean lanzadas
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Configura el modo predeterminado para obtener resultados como arreglos asociativos
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        // Si ocurre un error en la conexión, muestra el mensaje de error y termina el script
        die($e->getMessage());
    }

    // Devuelve la instancia de conexión a la base de datos
    return $db;
}

// Función para conectar a una base de datos MySQL
function connectMysql(string $dsn, string $userdb, string $passdb){
    try {
        // Crea una conexión a la base de datos MySQL
        $db = new PDO($dsn, $userdb, $passdb);

        // Configura el modo de manejo de errores para que las excepciones sean lanzadas
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Configura el modo predeterminado para obtener resultados como arreglos asociativos
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        // Si ocurre un error en la conexión, muestra el mensaje de error y termina el script
        die($e->getMessage());
    }

    // Devuelve la instancia de conexión a la base de datos
    return $db;
}
?>