<?php

class RegisterModel { 
	
	private $db;

	function __construct($db) {
		$this->db = $db;
	}

	public function register($name, $surname, $email, $password) {
		$query = "	INSERT INTO `users`(`group_id`, `name`, `surname`, `email`, `password`) 
					VALUES (1, '".$name."', '".$surname."', '".$email."', '".hash(PASSWORDS_HASH, $password)."')";
					
		$dbh = $this->db->prepare($query);
		$dbh->execute();
		
		
	}
}
