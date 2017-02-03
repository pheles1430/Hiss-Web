<?php

    class PetSectionController {
		
		public function index() {

			$conf = new Configure;
            
			return $conf->View();

		}
		
		public function getList() {
			
			$conf = new Configure;
			
			$pets = new Pets;
			
			$pets->GetPetsList();
			
			//echo json_encode($pets);
            
			return false;
			
		}
		
	}

?>