<?php
	//In object-oriented programming, a class is a blueprint for objects, while an object is an instance of that class
	//class name same as file name,in a class variable called as properties, function called as methods
	// one class defines in one file
	class MathOperations{

		// public $val = 30;

		// function sum(){
		// 	echo 10+20;
		// }

		// function sum(){
		// 	return 10+20;
		// }

		function sum($num1 , $num2){
			return $num1 + $num2;
			// return $num1 + $num2 + $this->val;
		}

		function multi($num1 , $num2){
			return $num1 * $num2;
		}

		function sub($num1 , $num2){
			return $num1 - $num2;
		}
	}


	$maths = new MathOperations();  //object
	// $maths1 = new MathOperations();  // we can create multiple objects

	// $maths->sum();
	// echo $maths->sum();

	echo $maths->sum(20,30);
	echo "<br/>";
	echo $maths->sum(100,200);
	echo "<br/>";
	echo $maths->multi(200,400);
	echo "<br/>";
	echo $maths->sub(100,50);

?>