<?php
//as we know we can call function when we use but constructor didnt need to call, it call automatically when class created

class constructorDemo{
	// function setname(){
	// 	return "hello";
	// }
	public $name;
	function __construct($names){
		echo "__construct CALLED";

		 return $this->name=$names;
	}
	function getcons(){
		echo $this->name;
	}
}

$cons = new constructorDemo("hello");
// echo $cons->setname();
$cons->getcons();
?>