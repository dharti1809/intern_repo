<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

//by default public method called, it can be access anywhare 
//private method use within a class

	class Teachers{
		private function questionPepar(){
			// echo "This Test For Students";
			return "important";
		}

		function exam(){
			// $this->questionPepar();
			if ($this->questionPepar() == "important") {
				echo "do something";
			}else {
				echo "do else";
			}
		}


		protected function studentMarks(){
			echo "all student marks";
		}

		 function questionPepar1(){
			// echo "This Test For Students";
			// return "important";
			$this->studentMarks();
		}
	}

	class management extends Teachers{
		function reviewExam(){
			$this->studentMarks();
		}
	}

	$t1 = new Teachers();
	// $t1->questionPepar(); // private method do not use outside of class

	// $t1->exam();
	// $t1->studentMarks();
	$t1->questionPepar1();
	// $m1 = new management();
	// echo $m1->reviewExam();


?>