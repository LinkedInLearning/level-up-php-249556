<?php
	class Person {
		private $name;
		private $dob;
		
		function __construct($name, $dob) {
			$this->name = $name;
			$this->dob = $dob;	
		}
		
		public function get_name() {
			return $this->name;
		}
		
		public function get_dob() {
			return $this->dob;
		}
		
		public function get_age() {
			//Calculate age
			$dob = new Datetime($this->dob);
			$today = new Datetime(date('Y-m-d'));
			$age = $today->diff($dob);
			
			//Return Age in Years
			return $age->y;
		}
	}