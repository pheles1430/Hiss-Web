<?php

	class HomeController {
		
		public function index() {

			$conf = new Configure;
			return $conf->View();

		}
		
		public function insertMember($object) {
			
			unset($object["password_confirm"]);
			
			$member = new Member($object);
			
			$member->insertNewMember($member);
			
			//$conf = new Configure;
			//return $conf->View(null, 'índex');
			
		}
		
	}

?>