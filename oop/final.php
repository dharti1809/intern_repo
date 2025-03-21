<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//we can not extends a final keyword class
// final class honda{

// }

// class cars extends honda{

// }

// $car = new cars();


class honda{  // we can not override final keyword functions
	final function companyName(){
		echo "This is honda company";
	}
}

class cars extends honda{
	function companyName(){
		echo "This is Toyota company";
	}
}

$car = new cars();
$car->companyName();
?>