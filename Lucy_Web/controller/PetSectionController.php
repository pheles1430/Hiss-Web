<?php

    class PetSectionController {
		
		public function index() {

			$conf = new Configure;
            
			return $conf->View();

		}
		
	}

?>