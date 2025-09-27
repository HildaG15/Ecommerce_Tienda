<?php 

class Controllers
{
    // ✅ Declaramos las propiedades
    protected $views;
    protected $model;

    public function __construct()
    {
        $this->views = new Views(); // Instancia de la clase Views
        $this->loadModel();         // Carga automática del modelo
    }

    public function loadModel()
    {
        // Ejemplo: Clientes -> ClientesModel.php
        $model = get_class($this)."Model";
        $routClass = "Models/".$model.".php";
        if(file_exists($routClass)){
            require_once($routClass);
            $this->model = new $model();
        }
    }
}

?>
