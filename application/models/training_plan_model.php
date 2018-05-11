<?php
class TrainingPlanModel {

	private $db;

	public function __construct($db) {
		$this->db = $db;
	}
	
	public function add_plan($title) {
		$query = "INSERT INTO `training_plans`(`title`) VALUES ('".$title."')";
		
		$this->db->query($query);
		
	}
	
	public function LoadTrainingPlans() {
		
		$query = "SELECT * FROM `training_plans` WHERE 1";
		$dbh = $this->db->query($query);
		
		$result = "<ul>";
		while($row = $dbh->fetch(PDO::FETCH_ASSOC)) {
			$result .= "<li><a href=\"index.php?module=trainingplan&page=show_plan&plan_id=".$row['plan_id']."\">".$row['title']."</a></li>";
		}
		$result .= "</ul>";
		
		return $result;
	}
	
	public function LoadTrainingPlanTitle($plan_id) {
		$result = "";
		
		$dbh = $this->db->query("SELECT * FROM `training_plans` WHERE `plan_id` = ".$plan_id." LIMIT 1");
		$row = $dbh->fetch(PDO::FETCH_ASSOC);
		return $row['title'];
	}
	
	public function LoadTrainingPlan($plan_id) {
		$result = "";

		$dbh = $this->db->query("SELECT * FROM `training_plans` WHERE `plan_id` = ".$plan_id." LIMIT 1");
		$row = $dbh->fetch(PDO::FETCH_ASSOC);
		
		$monday = explode(":", $row['monday']);
		$tuesday = explode(":", $row['tuesday']);
		$wednesday = explode(":", $row['wednesday']);
		$thurdsday = explode(":", $row['thursday']);
		$friday = explode(":", $row['friday']);
		$saturday = explode(":", $row['saturday']);
		$sunday = explode(":", $row['sunday']);
		
		$max_size = max(array(sizeof($monday), sizeof($tuesday), sizeof($wednesday), sizeof($thurdsday), sizeof($friday), sizeof($saturday), sizeof($sunday)));
		
		for($i = 1; $i<$max_size; $i++) {
			
			$result .= "					
								<tr>";
			$result .= "<td>".$i."</td>";
								

			if(sizeof($monday) > $i) {
				$result .= "<td>".$this->GetTrainingString($monday[$i])."</td>";
			} else {
				$result .= "<td></td>";
			}
			
			if(sizeof($tuesday) > $i) {
				$result .= "<td>".$this->GetTrainingString($tuesday[$i])."</td>";
			} else {
				$result .= "<td></td>";
			}
			
			if(sizeof($wednesday) > $i) {
				$result .= "<td>".$this->GetTrainingString($wednesday[$i])."</td>";
			} else {
				$result .= "<td></td>";
			}
			
			if(sizeof($thurdsday) > $i) {
				$result .= "<td>".$this->GetTrainingString($thurdsday[$i])."</td>";
			} else {
				$result .= "<td></td>";
			}
			
			if(sizeof($friday) > $i) {
				$result .= "<td>".$this->GetTrainingString($friday[$i])."</td>";
			} else {
				$result .= "<td></td>";
			}
			
			if(sizeof($saturday) > $i) {
				$result .= "<td>".$this->GetTrainingString($saturday[$i])."</td>";
			} else {
				$result .= "<td></td>";
			}
			
			if(sizeof($sunday) > $i) {
				$result .= "<td>".$this->GetTrainingString($sunday[$i])."</td>";
			} else {
				$result .= "<td></td>";
			}
			$result .= "					
								</tr>";					
		}

		
		return $result;
	}
	
	private function GetTrainingString($training_id) {
		$query = "SELECT * FROM `trainings` WHERE `training_id` = ".$training_id." LIMIT 1";
		$dbh = $this->db->query($query);
		$row = $dbh->fetch(PDO::FETCH_ASSOC);
		return "".$row['training_title']."<br />(S: ".$row['series'].", P: ".$row['repeats'].")";
		
	}
	
	public function add_training($plan_id, $title, $series, $repeats, $training_day) {
		$query = "INSERT INTO `trainings`(`training_title`, `series`, `repeats`) VALUES ('".$title."', '".$series."', '".$repeats."')";
		$dbh = $this->db->query($query);
		$training_id = $this->db->lastInsertId();
		
		$query = "SELECT * FROM `training_plans` WHERE plan_id = ".$plan_id." LIMIT 1";
		$dbh = $this->db->query($query);
		$row = $dbh->fetch(PDO::FETCH_ASSOC);
		
		switch($training_day) {
			case "monday":
					$new_string = $this->addTrainingToDay($training_id, $row['monday']);
					$query = "UPDATE `training_plans` SET `monday`='".$new_string."' WHERE `plan_id` = ".$plan_id." LIMIT 1";
				break;
			case "tuesday":
					$new_string = $this->addTrainingToDay($training_id, $row['tuesday']);
					$query = "UPDATE `training_plans` SET `tuesday`='".$new_string."' WHERE `plan_id` = ".$plan_id." LIMIT 1";
				break;
			case "wednesday":
					$new_string = $this->addTrainingToDay($training_id, $row['wednesday']);
					$query = "UPDATE `training_plans` SET `wednesday`='".$new_string."' WHERE `plan_id` = ".$plan_id." LIMIT 1";
				break;
			case "thursday":
					$new_string = $this->addTrainingToDay($training_id, $row['thursday']);
					$query = "UPDATE `training_plans` SET `thursday`='".$new_string."' WHERE `plan_id` = ".$plan_id." LIMIT 1";
				break;
			case "friday":
					$new_string = $this->addTrainingToDay($training_id, $row['friday']);
					$query = "UPDATE `training_plans` SET `friday`='".$new_string."' WHERE `plan_id` = ".$plan_id." LIMIT 1";
				break;
			case "saturday":
					$new_string = $this->addTrainingToDay($training_id, $row['saturday']);
					$query = "UPDATE `training_plans` SET `saturday`='".$new_string."' WHERE `plan_id` = ".$plan_id." LIMIT 1";
				break;
			case "sunday":
					$new_string = $this->addTrainingToDay($training_id, $row['sunday']);
					$query = "UPDATE `training_plans` SET `sunday`='".$new_string."' WHERE `plan_id` = ".$plan_id." LIMIT 1";
				break;
			default: 
				$query = null;
				break;
		}
		
		if(null != $query) {
			$dbh = $this->db->query($query);
		}
	}
	
	
	private function addTrainingToDay($new_training_id, $day_trainings) {
		$result = "";
		if($day_trainings == "-1") {
			$result = $new_training_id;
		} else {
			$result = $day_trainings.":".$new_training_id;
		}
		return $result;
	}
	
}
