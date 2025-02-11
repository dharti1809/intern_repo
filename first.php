<?php
// echo'prime number between 1 to 100 are:</br>';
// for($i=1;$i<=100;$i++)
//     {      
//         $b=0;
//         for($j=1;$j<=$i;$j++)
//         {
//             if($i%$j==0)
//             {
//                 $b=$b+1;
//             }
//         }
//         if($b==2)
//         {
//             echo ' '.$i;
//         }
//     }


// PHP Program to Generate 
// Fibonacci Series
// $n = 10;

// // Initialize the first two terms of the Fibonacci series
// $first = 0;
// $second = 1;

// // Print the first two terms
// echo $first . " " . $second . " ";

// // Generate and print the rest of the series
// for ($i = 3; $i <= $n; $i++) {
//     $next = $first + $second;
//     echo $next . " ";
//     $first = $second;
//     $second = $next;
// }



// $string = "Hello, World!";
// $reversed = "";

// // Find the length of the string manually
// $length = 0;
// while (isset($string[$length])) {
//     $length++;
// }

// // Reverse the string
// for ($i = $length - 1; $i >= 0; $i--) {
//     $reversed .= $string[$i];
// }

// // Output the reversed string
// echo $reversed;



// $rows = 3;

// // Generate the tree
// for ($i = 1; $i <= $rows; $i++) {
//     // Print spaces
//     for ($j = $rows - $i; $j > 0; $j--) {
//         echo "&nbsp;"; // Use non-breaking space for alignment
//     }
//     // Print stars
//     for ($k = 1; $k <= (2 * $i - 1); $k++) {
//         echo "*";
//     }
//     // Move to the next line
//     echo "<br>";
// }



// for($i=0;$i<=5;$i++){  
// for($j=1;$j<=$i;$j++){  
// echo $j;  
// }  
// echo "<br>";  
// }  



// $rows = 3;

// // Generate the tree with numbers
// for ($i = 1; $i <= $rows; $i++) {
//     // Print spaces
//     for ($j = $rows - $i; $j > 0; $j--) {
//         echo "&nbsp;"; // Use non-breaking space for alignment
//     }
//     // Print numbers
//     for ($k = 1; $k <= (2 * $i - 1); $k++) {
//         echo $k; // Print the current number
//     }
//     // Move to the next line
//     echo "<br>";
// }
?>