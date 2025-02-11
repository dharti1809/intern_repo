<?php

include "../dbconnect.php";
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['getSingleData']) && $_POST['getSingleData'] === 'getSingleData') {

        $sql = "SELECT * FROM MyGuests";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);

            $response["firstname"] = $row['firstname'];
            $response["lastname"] = $row['lastname'];
            $response["email"] = $row['email'];
            $response["reg_date"] = $row['reg_date'];

            $response["message"] = "User data fetched successfully";
            $response["status"] = 200;
        } else {
            $response["message"] = "No users found";
            $response["status"] = 201;
        }
    } else {
        $response["message"] = "Invalid tag value";
        $response["status"] = 201;
    }
} else {
    $response["message"] = "Only POST method allowed with 'getSingleData' tag";
    $response["status"] = 201;
}

// Return JSON response
echo json_encode($response);
mysqli_close($conn);
?>
