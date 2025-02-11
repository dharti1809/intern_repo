<?php

include "../dbconnect.php";

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    if ($_POST['manage'] === 'get_user') {

        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            
            $sql = "SELECT * FROM MyGuests WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
                $response["message"] = "User fetched successfully";
                $response["status"] = 200;
                $response["user"] = $user;
            } else {
                $response["message"] = "User not found";
                $response["status"] = 201;
            }
        } else {
            $response["message"] = "User ID is required";
            $response["status"] = 201;
        }
    } else {
        $response["message"] = "Invalid tag value";
        $response["status"] = 201;
    }
} else {
    $response["message"] = "Only POST method allowed with 'manage' tag";
    $response["status"] = 201;
}

echo json_encode($response);
mysqli_close($conn);
?>
