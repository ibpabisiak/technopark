<?php

class RegisterModel { 
	
	private $db;

	function __construct($db) {
		$this->db = $db;
	}

	public function register($name, $surname, $email, $password, $height) {
		$query = "	INSERT INTO `users`(`group_id`, `name`, `surname`, `email`, `password`, `height`) 
					VALUES (1, '".$name."', '".$surname."', '".$email."', '".hash(PASSWORDS_HASH, $password)."', '".$height."')";
					
		$dbh = $this->db->prepare($query);
		$dbh->execute();
		
		
	}
}
