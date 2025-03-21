<?php

class countrySale{
	static public $totalSale = 1000;

}

class citySale{
	static public $totalSale = 50;

	function getCitySale(){
		echo self::$totalSale;
	}
}

$city = new citySale();
$city->getCitySale();
?>