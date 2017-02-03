<?php

    class CalenderController {
		
		public function index() {

			$conf = new Configure;
            
			return $conf->View();

		}
		
	}

?>