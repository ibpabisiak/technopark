<?php

class Functions {
	
	public static function GetUserSession() {
		$user_session = unserialize($_SESSION[USER_SESSION]);
		return $user_session;
	}
	
	public static function IsLogged() {
		$result = false;
		
		if(null != $_SESSION[USER_SESSION]) {
			$result = self::GetUserSession()->IsLogged();
		}
		
		return $result;
	}
}




