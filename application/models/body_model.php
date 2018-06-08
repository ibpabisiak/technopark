<?php
class BodyModel {

	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function add_new_body($lydka,$udo,$biodra,$talia,$klatka,$kark,$biceps,$przedramie,$waga,$pas) {
		
		$user_id = Functions::GetUserSession()->GetUniqueID();
		
		$query = "INSERT INTO `body_measurements`(`user_id`, `lydka`, `udo`, `biodra`, `talia`, `klatka`, `kark`, `biceps`, `przedramie`, `waga`, `pas`) 
					VALUES ('".$user_id."', '".$lydka."','".$udo."','".$biodra."','".$talia."','".$klatka."','".$kark."','".$biceps."','".$przedramie."','".$waga."','".$pas."')";
		
		$this->db->query($query);
	}
	
	public function load_body_list() {
		
		$result = "";
		$user_id = Functions::GetUserSession()->GetUniqueID();
		$query = "SELECT * FROM `body_measurements` WHERE `user_id` = '".$user_id."'";
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
	
	public function load_body_list_into_chart() {
		$result = "";
		$user_id = Functions::GetUserSession()->GetUniqueID();
		$query = "SELECT * FROM `body_measurements` WHERE `user_id` = '".$user_id."'";
		$dbh = $this->db->query($query);
		
		$lydka_arr = array();
		$udo_arr = array();
		$biodra_arr = array();
		$talia_arr = array();
		$klatka_arr = array();
		$kark_arr = array();
		$biceps_arr = array();
		$przedramie_arr = array();
		$waga_arr = array();
		$pas_arr = array();

		$labels = array();
		
		while($row = $dbh->fetch(PDO::FETCH_ASSOC)) {

				array_push($labels, "\"\"");
				array_push($lydka_arr, $row['lydka']);
				array_push($udo_arr,$row['udo']);
				array_push($biodra_arr,$row['biodra']);
				array_push($talia_arr,$row['talia']);
				array_push($klatka_arr,$row['klatka']);
				array_push($kark_arr,$row['kark']);
				array_push($biceps_arr,$row['biceps']);
				array_push($przedramie_arr,$row['przedramie']);
				array_push($waga_arr,$row['waga']);
				array_push($pas_arr,$row['pas']);
			
		}


		$result .= '
		
					<script>
						new Chart(document.getElementById("myChart"), {
								"type":"line",
								"data":{
									labels: ['.join(", ", $labels).' ],
									"datasets":[
									
									
						{
						"label":"Lydka",
						"data":['.join(', ', $lydka_arr).'],
						"fill":false,
						"borderColor":"rgb(125, 92, 92)",
						"lineTension":0.1},{
						"label":"Udo",
						"data":['.join(', ', $udo_arr).'],
						"fill":false,
						"borderColor":"rgb(125, 9, 92)",
						"lineTension":0.1},{
						"label":"Biodra",
						"data":['.join(', ', $biodra_arr).'],
						"fill":false,
						"borderColor":"rgb(15, 92, 92)",
						"lineTension":0.1},{
						"label":"Talia",
						"data":['.join(', ', $talia_arr).'],
						"fill":false,
						"borderColor":"rgb(190, 2, 92)",
						"lineTension":0.1},{
						"label":"Klatka",
						"data":['.join(', ', $klatka_arr).'],
						"fill":false,
						"borderColor":"rgb(125, 62, 32)",
						"lineTension":0.1},{
						"label":"Kark",
						"data":['.join(', ', $kark_arr).'],
						"fill":false,
						"borderColor":"rgb(55, 192, 92)",
						"lineTension":0.1},{
						"label":"Biceps",
						"data":['.join(', ', $biceps_arr).'],
						"fill":false,
						"borderColor":"rgb(125, 192, 52)",
						"lineTension":0.1},{
						"label":"Przedramie",
						"data":['.join(', ', $przedramie_arr).'],
						"fill":false,
						"borderColor":"rgb(125, 92, 192)",
						"lineTension":0.1},{
						"label":"Waga",
						"data":['.join(', ', $waga_arr).'],
						"fill":false,
						"borderColor":"rgb(125, 192, 92)",
						"lineTension":0.1},{
						"label":"Pas",
						"data":['.join(', ', $pas_arr).'],
						"fill":false,
						"borderColor":"rgb(25, 92, 92)",
						"lineTension":0.1}									
									
									]},
									"options":{
									}});	
					</script>			
		
		';
		
		
		return $result;
	}
	
	
	
}
