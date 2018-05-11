<?php

class User {
	private $name;
	private $surname;
	private $email;
	private $uid;
	private $group_id;
	private $group_title;
	private $permissions;
	private $is_logged;
	
	
	public function __construct($user_data) {
		$this->is_logged = true;
		$this->name = $user_data['name'];
		$this->password = $user_data['password'];
		$this->email = $user_data['email'];
		$this->uid = $user_data['id'];
		$this->group_id = $user_data['group_id'];
		$this->group_title = $user_data['title'];
		$this->permissions = new Permissions($user_data['permissions']);
	}
	
	public function IsEntitledToRead($module) {
		return $this->IsEntitled($module, PERMISSIONS_READ_IDX);
	}
	
	public function IsEntitledToWrite($module) {
		return $this->IsEntitled($module, PERMISSIONS_WRITE_IDX);
	}
	
	private function IsEntitled($module, $action) {
		return $this->permissions->checkPermissions($module, $action);
	}

	public function IsLogged() {
		return $this->is_logged;
	}
	
	public function GetName() {
		return $this->name;
	}
	
	public function GetSurname() {
		return $this->surname;
	}
	
	public function GetEmail() {
		return $this->email;
	}
	
	public function GetUniqueID() {
		return $this->uid;
	}
	
	public function GetGroupID() {
		return $this->group_id;
	}
}




