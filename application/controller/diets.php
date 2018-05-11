<?php

class Diets extends Controller {

	public function index() {


		require 'application/views/_common/header.tpl.php';
        require 'application/views/diets.tpl.php';
        require 'application/views/_common/footer.tpl.php';
	}
}


