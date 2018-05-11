<?php

class Register extends Controller {

	public function index() {


		require 'application/views/_common/header.tpl.php';
        require 'application/views/register.tpl.php';
        require 'application/views/_common/footer.tpl.php';
	}
	
	public function register_submit() {
		$login_model = $this->loadModuleModel('register_model');
		
		$login_model->register($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['password']);
		header("Location: index.php");

	}
}


