<?php
include "../../dbconnect.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['admin_add'])){


	$admin_name = $_POST['admin_name'];
 	$email_id = $_POST['email_id'];
 	$country_code = $_POST['country_code'];
 	$mobile_no = $_POST['mobile_no'];
 	$password = $_POST['password'];
 	$gender = $_POST['gender'];
 	$address = $_POST['address'];

 	$sql = "INSERT INTO admin_registration (admin_name,email_id,country_code,mobile_no,password,gender,address) VALUES ('$admin_name','$email_id','$country_code','$mobile_no','$password','$gender','$address')";

 	if($conn->query($sql) == TRUE){
 		echo "New Record Added Successfully";
 		header("location: ../admin_registration.php");
 	}else{
 		echo "Something wants wrong";
 		header("location: ../admin_registration.php");
 	}
}

elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['admin_update'])) {
	// print_r($_POST);
	// exit();
	$admin_name = $_POST['admin_name'];
 	$email_id = $_POST['email_id'];
 	$country_code = $_POST['country_code'];
 	$mobile_no = $_POST['mobile_no'];
 	$password = $_POST['password'];
 	$gender = $_POST['gender'];
 	$address = $_POST['address'];
 	$edit_admin = $_POST['edit_admin'];

 	$sql_edit = "UPDATE admin_registration SET admin_name = '$admin_name',email_id = '$email_id',country_code = '$country_code',mobile_no = '$mobile_no',password = '$password',gender='$gender',address='$address' WHERE admin_id = '$edit_admin'";

 	if($conn->query($sql_edit) == TRUE){
 		echo "Updated Successfully";
 		header("location: ../admin_registration.php");
 	}else{
 		echo "Something wants wrong";
 		header("location: ../admin_registration.php");
 	}
}

elseif($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete_admin'])){

	$delete_data = $_POST['delete_data'];

	$sql2 = "DELETE FROM admin_registration WHERE admin_id = $delete_data";

	if($conn->query($sql2) == TRUE){
		echo "Deleted Successfully";
 		header("location: ../admin_registration.php");
	}else{
 		echo "Something wants wrong";
 		header("location: ../admin_registration.php");
 	}

}

?>