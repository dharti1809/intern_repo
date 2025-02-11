<?php

include "../dbconnect.php";
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['getData'])) {

    if ($_POST['getData'] === 'getData') {

        $sql = "SELECT * FROM MyGuests";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $users = array();

            while ($row = mysqli_fetch_assoc($result)) {

                $abc["firstname"] = $row['firstname'];
                $abc["lastname"] = $row['lastname'];
                $abc["email"] = $row['email'];
                $abc["reg_date"] = $row['reg_date'];
                // Add user to the users array
                // $users[] = $user;
                array_push($users, $abc);
            }
            $response["message"] = "User list fetched successfully";
            $response["status"] = 200;
            $response["users"] = $users;
        } else {
            $response["message"] = "No users found";
            $response["status"] = 404;
        }
    } else {
        $response["message"] = "Invalid tag value";
        $response["status"] = 400;
    }
} else {
    $response["message"] = "Only POST method allowed with 'getData' tag";
    $response["status"] = 405;
}

echo json_encode($response);
mysqli_close($conn);
?>
