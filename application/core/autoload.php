<?php
//start session

require_once 'application/config/config.php';
require_once 'application/core/permissions.php';
require_once 'application/core/user.php';

session_start();

//load application core
require_once 'application/core/global_functions.php';
require_once 'application/core/application.php';
require_once 'application/core/controller.php';
require_once 'application/core/view.php';

//load other files
require_once 'application/controller/homepage.php';
require_once 'application/controller/login.php';
require_once 'application/models/_common/files_model.php';

if(!isset($_SESSION[USER_SESSION])) {
	$_SESSION[USER_SESSION] = null;
}


