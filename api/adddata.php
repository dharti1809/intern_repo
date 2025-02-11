<?php
include "../dbconnect.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST["addUser"])){

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$mobile_no = $_POST['mobile_no'];

		$sql = "INSERT INTO MyGuests (firstname, lastname, email, mobile_no) VALUES ('$firstname', '$lastname', '$email',$mobile_no)";

		 if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            $response["message"] = "Data inserted successfully";
            $response["status"] = 200;
            $response["last_inserted_id"] = $last_id;
        } else {
            $response["message"] = "Error executing query: " . mysqli_error($conn);
            $response["status"] = 201;
        }
	}else{
		$response["message"] = "Invalid tag";
		$response["status"] = "201";
	}

}else{
	$response["message"] = "Only POST Method Allowed";
	$response["status"] = "201";
}
echo json_encode($response);
mysqli_close($conn);
?>