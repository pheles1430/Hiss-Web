<?php 

class Member {
	
    //Global Var to input member info in database 
    
	public $username;
	public $email;
	public $telephone;
	public $address;
	public $password;
	
    
     //Global Var to input member info in database 
    
    public $dogname;
	public $dogage;
	public $dograce;
	public $doggender;
	public $dogweight;
	
    
	public function __construct($object) 
	{
		
		foreach($object as $property=>$value) {
			
			if($property == 'telephone' && ($value == '' || $value == null)) {
				
				$value = null;
				
			}
			
			$this->$property = $value;
			
		}
		
	}
	
	public function insertNewMember($object) {
		
		session_start();
		include('../connection.php');
		
		$q = "SELECT * FROM tbl_users WHERE user_email = '$object->email' or user_name = '$object->username'";
		$r = mysqli_query($dbc, $q);

		if(mysqli_num_rows($r) >= 1) {
			
			echo "Email or Username already exists";

		} else {
			
			$q = "INSERT INTO tbl_users (user_name, user_email, user_password, telephone, address, joining_date) values ('$object->username', '$object->email', '$object->password', $object->telephone, '$object->address', current_date())";
			mysqli_query($dbc, $q);
			
		}
		
	}
    
    
    public function insertNewPet($object) {
		
            session_start();
		    include('../connection.php');
			
			$q = "INSERT INTO tbl_pets (petname, petage, petrace, petgender, petweight, joining_date) values ('$object->dogname', '$object->dogage', '$object->dograce','$object->doggender', $object->dogweight, current_date())";
			mysqli_query($dbc, $q);
			
		}
	
}

?>