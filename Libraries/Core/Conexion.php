<?php 
class Conexion{
    private $conect;

    public function __construct(){
        $connectionString = "mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME.";charset=".DB_CHARSET;
        try{
            $this->conect = new PDO($connectionString, DB_USER, DB_PASSWORD);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            // En caso de error, el objeto de conexión es nulo.
            $this->conect = null;
            // Para depuración, puedes mostrar el error.
            error_log("ERROR: " . $e->getMessage());
        }
    }

    public function conect(){
        return $this->conect;
    }
}
?>