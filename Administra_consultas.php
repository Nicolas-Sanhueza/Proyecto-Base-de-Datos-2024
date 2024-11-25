<?php
// Datos de conexión
$host = "localhost";
$port = "5432";                 // Puerto por defecto de PostgreSQL
$dbname = "nombre_de_la_BD";    // Nombre de la base de datos
$user = "postgres";             // Usuario por defecto en PostgreSQL
$password = "password";         // Contraseña de la base de datos

// Conectar a la base de datos
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Error de conexión: " . pg_last_error());
}

/**
 * Ejecuta una consulta SQL y devuelve los resultados.
 *
 * @param string $query La consulta SQL a ejecutar.
 * @return array|false Retorna un array de resultados o false en caso de error.
 */
function ejecutarConsulta($query) {
    global $conn;
    $result = pg_query($conn, $query);
    if (!$result) {
        echo "Error en la consulta: " . pg_last_error();
        return false;
    }
    return pg_fetch_all($result);
}

/**
 * Cierra la conexión a la base de datos.
 */
function cerrarConexion() {
    global $conn;
    pg_close($conn);
}
?>
