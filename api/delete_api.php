<?php
include "../dbconnect.php";

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['manage'])) {

    if ($_POST['manage'] === 'delete_user') {

        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            
            $sql = "DELETE FROM MyGuests WHERE id = '$id'";

            if (mysqli_query($conn, $sql)) {
                if ($conn > 0) {
                    $response["message"] = "User deleted successfully";
                    $response["status"] = 200;
                } else {
                    $response["message"] = "No user found with the given ID";
                    $response["status"] = 404;
                }
            } else {
                $response["message"] = "Error executing query: " . mysqli_error($conn);
                $response["status"] = 500;
            }
        } else {
            $response["message"] = "User ID is missing";
            $response["status"] = 400;
        }
    } else {
        $response["message"] = "Invalid tag value";
        $response["status"] = 400;
    }
} else {
    $response["message"] = "Only POST method allowed with 'manage' tag";
    $response["status"] = 405;
}

echo json_encode($response);
mysqli_close($conn);
?>
