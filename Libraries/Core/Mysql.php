<?php 

class Mysql extends Conexion
{
	/**
 * @var PDO|null $conexion
 */
	private $conexion;
    private $strquery;
    private $arrValues; // Corregido: 'V' mayúscula

    function __construct()
    {
        $objConexion = new Conexion();
        $this->conexion = $objConexion->conect();

        if ($this->conexion === null) {
            die("Error de conexión a la base de datos. Por favor, revise la configuración.");
        }
    }

    // Insertar un registro
    public function insert(string $query, array $arrValues)
    {
        $this->strquery = $query;
        $this->arrValues = $arrValues; // Corregido: 'V' mayúscula
        $insert = $this->conexion->prepare($this->strquery);
        $resInsert = $insert->execute($this->arrValues); // Corregido: 'V' mayúscula
        if($resInsert)
        {
            $lastInsert = $this->conexion->lastInsertId();
        }else{
            $lastInsert = 0;
        }
        return $lastInsert; 
    }

    // Busca un registro
    public function select(string $query)
    {
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    // Devuelve todos los registros
    public function select_all(string $query)
    {
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        $data = $result->fetchall(PDO::FETCH_ASSOC);
        return $data;
    }

    // Actualiza registros
    public function update(string $query, array $arrValues)
    {
        $this->strquery = $query;
        $this->arrValues = $arrValues; // Corregido: 'V' mayúscula
        $update = $this->conexion->prepare($this->strquery);
        $resExecute = $update->execute($this->arrValues); // Corregido: 'V' mayúscula
        return $resExecute;
    }

    // Eliminar un registro
    public function delete(string $query)
    {
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $del = $result->execute();
        return $del;
    }
}