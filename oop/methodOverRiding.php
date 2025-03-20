<?php  // child class execute thay parent class na thay jo same name hoy method(function) and aeni property nu to
class Teacher{

	public $city = "gujarat"; // property over riding
	function nextExam(){
		echo "next exam is maths";
	}

	function age(){  // method overriding
		echo "my age is 40";
	}

}

// $t1 = new Teacher();
// $t1->nextExam();

class Student extends Teacher{

	public $city = "banglore";
	function age(){
		echo "my age is 20";
	}
}

$s1 = new Student();
// $s1->nextExam();
$s1->age();

echo "<br>";
echo $s1->city;
?>