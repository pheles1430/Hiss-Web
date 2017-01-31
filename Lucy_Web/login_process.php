<?php
	session_start();
	require_once 'connect.php';

	if(isset($_POST['btn-login']))
	{
		//$user_name = $_POST['user_name'];
		$UserName = trim($_POST['UserName']);
		$UserPassword = trim($_POST['UserPassword']);
		
		$password = md5($UserPassword);
		
		try
		{	
		
			$stmt = $db_con->prepare("SELECT * FROM user_profil_tbl WHERE UserName=:UserName");
			$stmt->execute(array(":UserName"=>$user_email));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$count = $stmt->rowCount();
			
			if($row['user_password']==$password){
				
				echo "ok"; // log in
				$_SESSION['user_session'] = $row['user_id'];
			}
			else{
				
				echo "email or password does not exist."; // wrong details 
			}
				
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>