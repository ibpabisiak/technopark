<?php

class View {
	
	public function display($view) {
		require_once "application/views/_common/header.tpl.php";
        require_once "application/views/attendance/".$view.".tpl.php";
        require_once "application/views/_common/footer.tpl.php";			
	}
}



