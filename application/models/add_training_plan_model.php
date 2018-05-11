<?php
class AddTrainingPlanModel {

	private $db;

	public function __construct($db) {
		$this->db = $db;
	}
	
	public function add_plan($title) {
		$query = "INSERT INTO `training_plans`(`title`) VALUES ('".$title."')";
		
		$this->db->query($query);
		
	}
	
	public function add_training($plan_id, $title, $series, $repeats) {
		$query = "INSERT INTO `training_plans`(`title`) VALUES ('".$title."')";
		
		$this->db->query($query);
		
	}
}
