<?php

class Permissions {
	
	private $permissions;
	private $exploded_perms;
	
	/**
	* @group_permissions - string from database, not parsed
	*/
	function __construct($group_permissions) {
		
		$this->exploded_perms = explode(":", $group_permissions);
		
		$this->permissions = array 
							( 
								PERMISSIONS_WRITE_IDX => array( 	
															"login" => $this->GetWrite(0),
															"attendance" => $this->GetWrite(1), 
															"documents" => $this->GetWrite(2), 
															"equipment" => $this->GetWrite(3), 
															"invoices" => $this->GetWrite(4), 
															"invoicescatalog" => $this->GetWrite(5), 
															"licenses" => $this->GetWrite(6)
														),
								PERMISSIONS_READ_IDX => array( 	
															"login" => $this->GetRead(0),
															"attendance" => $this->GetRead(1), 
															"documents" => $this->GetRead(2), 
															"equipment" => $this->GetRead(3), 
															"invoices" => $this->GetRead(4), 
															"invoicescatalog" => $this->GetRead(5), 
															"licenses" => $this->GetRead(6)
														),
							);
	}
	
	public function CheckPermissions($module, $action) {
		$result = false;
		
		switch($action) {
			case PERMISSIONS_WRITE_IDX: $result = $this->permissions[PERMISSIONS_WRITE_IDX][$module];
				break;
			case PERMISSIONS_READ_IDX: $result = $this->permissions[PERMISSIONS_READ_IDX][$module];
				break;
			default: exit("wrong permissions type");
				break;
		}
		
		return $result;
	}
	
	private function GetWrite($idx) {
		return (str_split($this->exploded_perms[$idx])[PERMISSIONS_WRITE_IDX] == "1");
	}
	
	private function GetRead($idx) {
		return (str_split($this->exploded_perms[$idx])[PERMISSIONS_READ_IDX] == "1");
	}
	
}



