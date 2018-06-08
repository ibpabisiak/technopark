<?php

class Body extends Controller {

	public function index() {

		$model = $this->loadModuleModel('body_model');
		
		$body_list = $model->load_body_list();
		$body_chart = $model->load_body_list_into_chart();
		
		require 'application/views/_common/header.tpl.php';
        require 'application/views/body.tpl.php';
        require 'application/views/_common/footer.tpl.php';
	}
	
	public function add_body() {
		$model = $this->loadModuleModel('body_model');
			
		
		$model->add_new_body($_POST['lydka'],$_POST['udo'],$_POST['biodra'],$_POST['talia'],$_POST['klatka'],$_POST['kark'],$_POST['biceps'],$_POST['przedramie'],$_POST['waga'],$_POST['pas']);
		header("Location: index.php?module=body");
	}
}



