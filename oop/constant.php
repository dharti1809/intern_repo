<?php  // do not need to create object while call constant variable
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class constant_demo {
	// const collegeName="Sal College";
	// private const collegeName="Sal College";
	protected const collegeName="Sal College";

	function getCollegeName(){
		echo self::collegeName;
		// echo constant_demo::collegeName;
		// echo $this->collegeName;  // this is not work for constant

	}
}

class child extends constant_demo{
	function getChildName(){
		echo self :: collegeName;
	}
}

// echo constant_demo::collegeName;  // for private that not run but using another function in that const its work
echo "<br>";
$c1 = new constant_demo();
$c1->getCollegeName();


$child1 = new child();

$child1->getChildName();
?>