<?php

class AddTrainingPlan extends Controller {

	public function index() {


		require 'application/views/_common/header.tpl.php';
        require 'application/views/add_training_plan.tpl.php';
        require 'application/views/_common/footer.tpl.php';
	}
	
	public function add_plan() {
		$model = $this->loadModuleModel('add_training_plan_model');
		$model->add_plan($_POST['title']);
	}
}


