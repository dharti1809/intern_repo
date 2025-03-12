<?php
	
	class properties{
		//variable define - public, private, protected

		public $name = "dharti solanki";
		function getname(){
			return $this->name;
		}

		// function updatename(){
		// 	return $this->name = "swati solanki";
		// }

		function updatename($names){
			return $this->name=$names;
		}
	}

	$p1 = new properties();

	// echo $p1->name;
	echo $p1->getname();
	// echo $p1->updatename();
	echo $p1->updatename("swati");

?>