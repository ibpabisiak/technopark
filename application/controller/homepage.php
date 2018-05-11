<?php

class Homepage extends Controller {

	public function index() {


		require 'application/views/_common/header.tpl.php';
        require 'application/views/homepage.tpl.php';
        require 'application/views/_common/footer.tpl.php';
	}
}


