<?php // this method use we can not create object directly call statis property
//same to same class no use varam var karvano hoy tyare static ma krvo


class Honda{

	static public $countryname = "India";
	static function companyName(){
		echo "Honda Company";
	}
}

// $honda = new Honda();
// $honda->companyName(); // do not need to that type of declaration

Honda::companyName();
echo Honda::$countryname;
?>