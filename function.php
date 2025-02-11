<!DOCTYPE html>
<html>
<body>

<?php
function add_five(&$value) {
  $value += 5;
  // echo $value;
}

$num = 2;
add_five($num);
echo $num;
?>

</body>
</html>

<?php
	// function hii($a){
	// 	echo $a;
	// }
	// hii(4);


	// function marksSum($marksArry){
		
	// 	$sum = 0;
	// 	foreach ($marksArry as $value) {
	// 		$sum += $value;
	// 	}
	// 	return $sum;
	// }
	
	// function avgMarks($marksArray){
	// 	$sum = 0;
	// 	// $i = 1;
	// 	$i = 0;

	// 	foreach ($marksArray as $value){
	// 		$sum += $value;
	// 		$i++;
	// 	}
	// 	// return $sum / $i;
	// 	return $i > 0 ? $sum / $i : 0;
	// }

	// $rohan = [70,78,23,33,65,78];
	// // $rohanMarks = marksSum($rohan);
	// $rohanMarks = avgMarks($rohan);

	// $darshan = [78,98,67,76,56,78];
    // // $darshanMarks = marksSum($darshan);
    // $darshanMarks = avgMarks($darshan);

	// $dharti = [90,89,98,88,91,90];
	// // $dhartiMarks = marksSum($dharti);
	// $dhartiMarks = avgMarks($dharti);
	// echo "Total marks of Rohan is out of 600: $rohanMarks <br>";
	// echo "Total marks of Dharti is out of 600: $dhartiMarks <br>";
	// echo "Total marks of Darshan is out of 600: $darshanMarks <br>"

	




// $colors = ["red","blue","green","yellow"];

// function callback($item){
// 	return $item
// }

// $itemArray = array_map(callback, $colors);
// print_r($itemArray);


// function hello($fun){
// 	$a = 10;
// 	return $fun();
// }

// echo hello(function(){
// 	return 'hello world';
// });
?>