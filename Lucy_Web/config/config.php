<?php
class Configure {

	public $ENCRYPTION_DATA = 'd0a7e7997b6d5fcd55f4b5c32611b87cd923e88837b63bf2941ef819dc8ca282';
	
	public function ActionResult($actionName, $controllerName = '', $values = '') {
		
		if(isset($values["action"])) {
			
			unset($values["action"]);
			
		}
		
		if(isset($values["controller"])) {
			
			unset($values["controller"]);
			
		}
		
		$values = $this->SecurityEncode($values);
		
		include('../model/global.php');
		
		if($controllerName == '') {
			
			include('../controller/'. $_SERVER["REFERRER"] .'Controller.php');
			
			$controllerName = $_SERVER["REFERRER"];
            
		} else {
			
			include('../controller/'. $controllerName .'Controller.php');
			
		}
		
		$_SERVER["REFERRER"] = $controllerName;
		
		$_SERVER["Action"] = $actionName;
		
		$controller = $controllerName.'Controller';
			
		$action = new $controller;

		if($values == '') {

			$result = $action->$actionName();

		} else {

			$result = $action->$actionName($values);

		}
		
		return $result;
		
	}

	public function View($object = '', $action = '', $controller = '') {
		
		if($action == '') {
		
			include('../views/'. $_SERVER["REFERRER"] .'/'. $_SERVER["Action"] .'.php');
			
		} elseif($controller == '') {
			
			include('../views/'. $_SERVER["REFERRER"] .'/'. $action .'.php');
			
		} else {
			
			include('../views/'. $controller .'/'. $action .'.php');
			
		}
		
		return $this->SecurityDecode($object);
		
	}
	
	public function Authentication($object) {
		
		session_start();
		include('../connection.php');
		
		if(!isset($_SESSION['USER'])) {
		
			$username = $object['username'];
			$password = $object['password'];

			$q = "SELECT * FROM tbl_users WHERE user_name = '$username' AND user_password = '$password'";
			$r = mysqli_query($dbc, $q);

			if(mysqli_num_rows($r) == 1) {

				$_SESSION['USER'] = $username;

				echo "Login Successful";

			} else {

				echo "Login Failed";

			}
			
		} else {
			
			unset($_SESSION['USER']);
			
		}
		
	}
	
	public function SecurityEncode($object) {
		
		if(is_array($object)) {
		
			foreach($object as $property => $value) {
				
				if(strpos($object[$property], '<script>') == true) {
					
					if(strpos($object[$property], 'javascript:') == true) {
					
						strip_tags($object[$property], '<p><h1><h2><h3><h4><h5><h6><br><span>');
						
					} else {
						
						strip_tags($object[$property], '<p><h1><h2><h3><h4><h5><h6><a><img><br><span>');
						
					}
					
				}

				$object[$property] = htmlentities(trim($value), ENT_QUOTES | ENT_IGNORE, "UTF-8");

			}
			
		} else {
			
			$object = htmlentities(trim($object), ENT_QUOTES | ENT_IGNORE, "UTF-8");
			
		}
		
		return $object;
		
	}
	
	public function SecurityDecode($object) {
		
		if(is_array($object)) {
		
			foreach($object as $property => $value) {
				
				$object[$property] = html_entity_decode(trim($value), ENT_QUOTES | ENT_IGNORE, "UTF-8");

			}
			
		} else {
			
			$object = html_entity_decode(trim($object), ENT_QUOTES | ENT_IGNORE, "UTF-8");
			
		}
		
		return $object;
		
	}
	
	// Encrypt Function
	function mc_encrypt($encrypt, $key=''){
		
		$conf = new Configure;
		$key = $conf->ENCRYPTION_DATA;
		
		$encrypt = serialize($encrypt);
		$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC), MCRYPT_DEV_URANDOM);
		$key = pack('H*', $key);
		$mac = hash_hmac('sha256', $encrypt, substr(bin2hex($key), -32));
		$passcrypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $encrypt.$mac, MCRYPT_MODE_CBC, $iv);
		$encoded = base64_encode($passcrypt).'|'.base64_encode($iv);
		
		return $encoded;
		
	}
	// Decrypt Function
	function mc_decrypt($decrypt, $key=''){
		
		$conf = new Configure;
		$key = $conf->ENCRYPTION_DATA;
		
		$temp = explode('|', $decrypt.'|');
		$decoded = base64_decode($temp[0]);
		$iv = base64_decode($temp[1]);
		
		if(strlen($iv)!==mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)){ 
			
			return $decrypt; 
		
		}
		
		$key = pack('H*', $key);
		$decrypted = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $decoded, MCRYPT_MODE_CBC, $iv));
		$mac = substr($decrypted, -64);
		$decrypted = substr($decrypted, 0, -64);
		$calcmac = hash_hmac('sha256', $decrypted, substr(bin2hex($key), -32));
		
		if($calcmac!==$mac){ 
			
			return $decrypt; 
		
		}
		
		$decrypted = unserialize($decrypted);
		
		return $decrypted;
	}

}

$_SERVER["REFERRER"] = 'Home';
$_SERVER["BODY"] = '';
$conf = new Configure;

if(isset($_POST["action"])) {
	
	$_POST["action"] = $conf->mc_decrypt($_POST["action"]);
	
	if(isset($_POST["controller"])) {
		
		$_POST["controller"] = $conf->mc_decrypt($_POST["controller"]);
		
	}
	
	if($_POST["action"] != 'login' && $_POST["action"] != 'check') {
	
		echo $conf->ActionResult($_POST["action"], $_POST["controller"] = '', $_POST);
		
	}  elseif($_POST["action"] == 'login') {
		
		if(isset($_POST['rememberMe'])) {
			
			$cookie_name = "username";
			$cookie_value = $_POST["username"];
			
			if(!isset($_COOKIE[$cookie_name])) {
				
				setcookie($cookie_name, $cookie_value, time() + (10 * 365 * 24 * 60 * 60), "/");
				
			}
			
		} else {
			
			if(isset($_COOKIE['username'])) {
			
				unset($_COOKIE['username']);
				setcookie('username', null, -1, '/');
				
			}
			
		}
	
		$conf->Authentication($conf->SecurityEncode($_POST));

	}
	
}

	
?>