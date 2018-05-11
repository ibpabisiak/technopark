<?php

class TrainingPlan extends Controller {

	public function index() {

		$model = $this->loadModuleModel('training_plan_model');

		$plans_list = $model->LoadTrainingPlans();
		
		require 'application/views/_common/header.tpl.php';
        require 'application/views/training_plan_list.tpl.php';
        require 'application/views/_common/footer.tpl.php';
	}
	
	public function add_training_plan() {

		require 'application/views/_common/header.tpl.php';
        require 'application/views/add_training_plan.tpl.php';
        require 'application/views/_common/footer.tpl.php';
	}
	
	public function add_training_plan_submit() {
		$model = $this->loadModuleModel('training_plan_model');
		$model->add_plan($_POST['title']);
		header("Location: index.php?module=trainingplan");
		
	}
	
	public function add_training() {
		$model = $this->loadModuleModel('training_plan_model');
		$model->add_training($_POST['plan_id'], $_POST['training_title'], $_POST['series'], $_POST['repeats'], $_POST['training_day']);
		
		header("Location: index.php?module=trainingplan&page=show_plan&plan_id=".$_POST['plan_id']."");
	}
	
	public function show_plan() {
		$model = $this->loadModuleModel('training_plan_model');

		$plan_title = $model->LoadTrainingPlanTitle($_GET['plan_id']);
		$trainings_table = $model->LoadTrainingPlan($_GET['plan_id']);
		$plan_id = $_GET['plan_id'];
	
	
		require 'application/views/_common/header.tpl.php';
        require 'application/views/training_plan.tpl.php';
        require 'application/views/_common/footer.tpl.php';
		
	}
}



