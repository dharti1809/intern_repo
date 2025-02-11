<?php
function a(){
	$a = 2;
	$b = randomnumber();
	echo $b;
	if(($b%$a) == 0){
		echo "Hi";
	}else{
		echo "Bye";
	}
}
function randomnumber(){
	$x = rand(0,100);
	return $x;
}
a();
?>