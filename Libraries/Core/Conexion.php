<?php 
class Conexion{
    private $conect;

    public function __construct(){
        // Forzar conexión TCP para evitar problemas con sockets Unix
        $connectionString = "mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME.";charset=".DB_CHARSET;
        
        // Si el host es localhost, forzar 127.0.0.1 para usar TCP
        if (DB_HOST === 'localhost') {
            $connectionString = "mysql:host=127.0.0.1;port=".DB_PORT.";dbname=".DB_NAME.";charset=".DB_CHARSET;
        }
        
        // Para debugging
        if (getenv("APP_DEBUG") === "true") {
            error_log("Intentando conectar con: " . $connectionString);
            error_log("Usuario: " . DB_USER);
        }
        
        try{
            // Opciones específicas para MySQL 8.0 con PHP 7.3
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_TIMEOUT => 30,
                PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
                PDO::MYSQL_ATTR_SSL_CA => false,
                // Intentar forzar el método de autenticación legacy
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET SESSION sql_mode=''"
            ];
            
            $this->conect = new PDO($connectionString, DB_USER, DB_PASSWORD, $options);
            
            // Ejecutar comando para compatibilidad
            $this->conect->exec("SET SESSION sql_mode=''");
            
            if (getenv("APP_DEBUG") === "true") {
                error_log("Conexión exitosa a la base de datos");
            }
            
        }catch(PDOException $e){
            // En caso de error, el objeto de conexión es nulo
            $this->conect = null;
            
            // Log detallado del error
            error_log("ERROR DE CONEXIÓN PDO: " . $e->getMessage());
            error_log("Código de error: " . $e->getCode());
            error_log("Connection string: " . $connectionString);
            error_log("Usuario: " . DB_USER);
            
            // En modo debug, mostrar más información
            if (getenv("APP_DEBUG") === "true") {
                echo "<h3>Error de conexión detallado:</h3>";
                echo "<p><strong>Mensaje:</strong> " . $e->getMessage() . "</p>";
                echo "<p><strong>Código:</strong> " . $e->getCode() . "</p>";
                echo "<p><strong>Host:</strong> " . DB_HOST . "</p>";
                echo "<p><strong>Puerto:</strong> " . DB_PORT . "</p>";
                echo "<p><strong>Base de datos:</strong> " . DB_NAME . "</p>";
                echo "<p><strong>Usuario:</strong> " . DB_USER . "</p>";
            }
        }
    }

    public function conect(){
        return $this->conect;
    }
    
    public function isConnected(){
        return $this->conect !== null;
    }
}
?>