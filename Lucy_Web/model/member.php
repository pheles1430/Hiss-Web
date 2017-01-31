<?php 

class Member {
	
	public $username;
	public $email;
	public $telephone;
	public $address;
	public $password;
	
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
			
			echo "Email already exists";

		} else {
			
			$q = "INSERT INTO tbl_users (user_name, user_email, user_password, telephone, address, joining_date) values ('$object->username', '$object->email', '$object->password', $object->telephone, '$object->address', current_date())";
			mysqli_query($dbc, $q);
			
		}
		
	}
	
}

?>