<?php
	
	class UserAuth{
		function login($userType){
			echo "$userType logged in ";
		}
	}

	class student extends UserAuth {
		// function login(){
		// 	echo "student loggeed in";
		// }

		function getname(){
			echo "dharti";
		}
	}

	class teacher extends UserAuth{
		// function login(){
		// 	echo "teacher loggeed in";
		// }
		function getSkills(){
			echo "skills: coding";
		}
	}

	$s1 = new student();
	$s1->login("student");
	$s1->getname();
echo "<br/>";
	
	$t1 = new teacher();
	$t1->login("teacher");
	$t1->getSkills();
?>