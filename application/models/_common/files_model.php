<?php
class Files {

	private $db;

	private $unique_filename;
	private $original_filename;
	private $allowed_extensions;
	
	public function __construct($db) {
		$this->db = $db;
	}
	
	/**
	*	@return File ID in database
	**/
	public function AddFile($file, $file_category) {
		$result = -1;
		
		$this->LoadFileExtensionsFromDatabaseByCategoryId($file_category);
		if($this->UploadFile($file))
			$result = $this->SaveFileInDatabase($file_category, $this->original_filename, $this->unique_filename);
		
		return $result;
	}
	
	public function DeleteFile($file_id) {
		$query = "SELECT * FROM `files` WHERE `id` = ".$file_id." LIMIT 1";
		$dbh = $this->db->prepare($query);
		$dbh->execute();
		$row = $dbh->fetch(PDO::FETCH_ASSOC);
			
		unlink(FILES_TARGET_DIR.$row['unique_filename']);

		$query = "DELETE FROM `files` WHERE `id` = ".$file_id." LIMIT 1";
		$dbh = $this->db->prepare($query);
		$dbh->execute();
	}
	
	private function UploadFile($file) {
		$result = false;
		$this->original_filename = basename($file["name"]);
		$this->unique_filename = $this->PrepareUniqueFileName($this->original_filename);
		$target_file = FILES_TARGET_DIR . $this->unique_filename;

		// Check file size
		if ($file["size"] > MAX_FILESIZE) {
			exit("Sorry, your file is too large.");
		}
		
		$file_extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		// Allow certain file formats
		if(!in_array($file_extension, $this->allowed_extensions)) {
			
			$extensions = "";
			foreach($this->allowed_extensions as $ext)
				$extensions .= $ext.", ";
			
			exit( "Sorry, only ".$extensions." files are allowed.");
		}
		
		if (move_uploaded_file($file["tmp_name"],  $target_file)) {
			$result = true;
			echo "The file ". $this->original_filename. " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
		
		return $result;
	}
	
	private function PrepareUniqueFileName($current_filename) {
		
		$file_extension = strtolower(pathinfo($current_filename, PATHINFO_EXTENSION));
		$date = new DateTime();
		$timestamp = $date->getTimestamp();		
		$unique_filename = hash('md5', $timestamp.$file_extension.$current_filename).".".$file_extension; 

		while(file_exists(FILES_TARGET_DIR.$unique_filename)) {
			$date = new DateTime();
			$timestamp = $date->getTimestamp();		
			$unique_filename = hash('md5', $timestamp.$file_extension.$current_filename).".".$file_extension; 
		}		
		
		return $unique_filename;
	}
	
	private function LoadFileExtensionsFromDatabaseByCategoryId($files_category) {
		$query = "SELECT `extensions` FROM file_categories WHERE id = ".$files_category." LIMIT 1";
		$dbh = $this->db->prepare($query);
		$dbh->execute();
		
		$row = $dbh->fetch(PDO::FETCH_ASSOC);
		$this->allowed_extensions = explode(":", $row['extensions']);
	}

	private function SaveFileInDatabase($file_category, $original_filename, $unique_filename) {
		$result = -1;
		
		$query = "INSERT INTO `files`(`file_category_id`, `original_filename`, `unique_filename`) VALUES (".$file_category.", '".$original_filename."', '".$unique_filename."')";
		$dbh = $this->db->prepare($query);
		$dbh->execute();
		$result = $this->db->lastInsertId();
		
		return $result;
	}
}
