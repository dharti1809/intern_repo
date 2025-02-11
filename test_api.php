<?php
include '../dbconnect.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
 
	if($_POST['manage'] === 'get_user'){

		if($_POST['user_id']){

		}else{
			$response["message"] = "Only POST method allowed with 'manage' tag";
        	$response["status"] = 201;
		}

	}else{
		$response["message"] = "Only POST method allowed with 'manage' tag";
        $response["status"] = 201;
	}

}else{
	$response["message"] = "Only POST method allowed with 'manage' tag";
    $response["status"] = 201;
}

?>