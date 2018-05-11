<?php
class BodyModel {

	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function add_new_body($lydka,$udo,$biodra,$talia,$klatka,$kark,$biceps,$przedramie,$waga,$pas) {
		
		$query = "INSERT INTO `body_measurements`(`lydka`, `udo`, `biodra`, `talia`, `klatka`, `kark`, `biceps`, `przedramie`, `waga`, `pas`) 
					VALUES ('".$lydka."','".$udo."','".$biodra."','".$talia."','".$klatka."','".$kark."','".$biceps."','".$przedramie."','".$waga."','".$pas."')";
		
		$this->db->query($query);
	}
	
	public function load_body_list() {
		$result = "";
		$query = "SELECT * FROM `body_measurements` WHERE 1";
		$dbh = $this->db->query($query);
		
		
		while($row = $dbh->fetch(PDO::FETCH_ASSOC)) {
			$result .= "
								<tr>
									<td>".$row['date']."</td>
									<td>".$row['lydka']."</td>
									<td>".$row['udo']."</td>
									<td>".$row['biodra']."</td>
									<td>".$row['talia']."</td>
									<td>".$row['klatka']."</td>
									<td>".$row['kark']."</td>
									<td>".$row['biceps']."</td>
									<td>".$row['przedramie']."</td>
									<td>".$row['waga']."</td>
									<td>".$row['pas']."</td>
								</tr>

			";
		}
		
		
		return $result;
	}
	
}
