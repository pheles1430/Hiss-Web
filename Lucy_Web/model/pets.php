<?php

class Pets {

	//Global Var to input member info in database 
    
    public $dogname;
	public $dogage;
	public $dograce;
	public $doggender;
	public $dogweight;
	
	public function __construct($object = null) 
	{
		if ($object) {
			
            foreach($object as $property=>$value) {
			
				$this->$property = $value;
			
			}
			
        } else {
			
            return false;
			
        }
		
	}
	
	public function insertNewPet($object) {
		
		session_start();
		include('../connection.php');

		$q = "INSERT INTO tbl_pets (petname, petage, petrace, petgender, petweight, joining_date) values ('$object->dogname', '$object->dogage', '$object->dograce','$object->doggender', $object->dogweight, current_date())";
		mysqli_query ($dbc, $q);
			
	}
	
	public function GetPetsList() {
		
		session_start();
		include('../connection.php');
		
		$pets = array();
		
		$pet = new Pets();
		
		$q = "SELECT * FROM tbl_pets";
		$r = mysqli_query($dbc, $q);

		if(mysqli_num_rows($r) >= 1) {
			
			while($row = $r->fetch_assoc()) {
				
				$pet->dogname = $row["petname"];
				$pet->dogage = $row["petage"];
				$pet->dograce = $row["petrace"];
				$pet->doggender = $row["petgender"];
				$pet->dogweight = $row["petweight"];
				
				$pets[] = $pet;
				
			}
			
		}
		
		echo json_encode($pets);
		
		return false;
		
	}
	
}

?>