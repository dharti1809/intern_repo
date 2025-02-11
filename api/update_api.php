<?php
include "../dbconnect.php";

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['hiiupdate'])) {
        if (isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['id'], $_POST['mobile_no'])) {

       
            $id = $_POST['id'];

            $sql = "SELECT * FROM MyGuests WHERE id='$id'";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {

                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $mobile_no = $_POST['mobile_no'];

                $update_sql = "UPDATE MyGuests SET firstname='$firstname', lastname='$lastname', email='$email',mobile_no='$mobile_no' WHERE id='$id'";

                if (mysqli_query($conn, $update_sql)) {
                    $response["message"] = "Data updated successfully";
                    $response["status"] = 200;
                } else {
                    $response["message"] = "Error updating record: " . mysqli_error($conn);
                    $response["status"] = 201;
                }

            } else {
                $response["message"] = "User not found";
                $response["status"] = 201;
            }
        } else {
            $response["message"] = "Required fields missing";
            $response["status"] = 201;
        }
    } else {
        $response["message"] = "Invalid Tag";
        $response["status"] = 201;
    }
} else {
    $response["message"] = "Only POST Method Allowed";
    $response["status"] = 201;
}

// Return response in JSON format
echo json_encode($response);
mysqli_close($conn);
?>
