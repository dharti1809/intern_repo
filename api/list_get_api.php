<?php

include "../dbconnect.php";
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['manage'])) {

    if ($_POST['manage'] === 'get_users') {

        $sql = "SELECT * FROM MyGuests";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $users = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $users[] = $row;
            }
            $response["message"] = "User list fetched successfully";
            $response["status"] = 200;
            $response["users"] = $users;
        } else {
            $response["message"] = "No users found";
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
