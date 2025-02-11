<?php
include "../dbconnect.php";

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['hii'])) {

        // if (isset($_POST['firstname'], $_POST['lastname'], $_POST['email'])) {
         
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];

            $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')";

            if (mysqli_query($conn, $sql)) {
                $last_id = mysqli_insert_id($conn);
                $response["message"] = "Data inserted successfully";
                $response["status"] = 200;
                $response["last_inserted_id"] = $last_id;
            } else {
                $response["message"] = "Error executing query: " . mysqli_error($conn);
                $response["status"] = 201;
            }
        // } else {
        //     $response["message"] = "Missing required fields";
        //     $response["status"] = 400;
        // }
    } else {
        $response["message"] = "Invalid Tag";
        $response["status"] = 201;
    }
} else {
    $response["message"] = "Only POST Method Allowed";
    $response["status"] = 201;
}

// Return JSON response
echo json_encode($response);
mysqli_close($conn);
?>
