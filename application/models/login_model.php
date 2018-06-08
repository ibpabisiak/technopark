<?php

class LoginModel { 
	
	private $db;

	function __construct($db) {
		$this->db = $db;
	}

	function login($user_email, $user_password) {
		$result = false;
		if(!empty($user_email) && !empty($user_password) && null == $_SESSION[USER_SESSION]) {
			$query = "	SELECT * FROM users 
						JOIN groups ON users.group_id = groups.group_id 
						WHERE users.email = '".$user_email."' AND users.password = '".hash(PASSWORDS_HASH, $user_password)."' LIMIT 1";
						
			$dbh = $this->db->prepare($query);
			$dbh->execute();
			
			if(1 == $dbh->rowCount()) {
				$user_row = $dbh->fetch(PDO::FETCH_ASSOC);
				$user = new User($user_row);
				$_SESSION[USER_SESSION] = serialize($user);
				$result = $user->IsLogged();
			}

		}
		
		return $result;
	}
	
	public function logout() {
		$_SESSION[USER_SESSION] = null;
	}

}
