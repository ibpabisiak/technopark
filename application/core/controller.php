<?php
require_once 'application/core/controller_interface.php';

abstract class Controller implements ControllerInterface {
    protected $db = null;
	protected $view = null;
	
    function __construct() {
        $this->connecToDatabase(); 
		$this->view = new View();
    }

	private function connecToDatabase() {
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);
    }

    public function loadModuleModel($model_name) {
        require 'application/models/'.strtolower($model_name).'.php';
		$model_name = str_replace('_', '', $model_name);
        return new $model_name($this->db);
    }

}


