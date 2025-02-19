<?php
include 'dbconnect.php';
// $host = "localhost";
// $user = "chpl";
// $pass = "Chpl@321.";
// $dbname = "crud_db";

// $conn = new mysqli($host, $user, $pass, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addUser'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile_no = $_POST['mobile_no'];

    $sql = "INSERT INTO users (name, email, mobile_no) VALUES ('$name', '$email', '$mobile_no')";
    
    if ($conn->query($sql) === TRUE) {
        echo "User created successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>User Registration Form</title>
</head>
<body>
    <div class="row">
        <div class="col-sm-12 m-3 text-center">
            <h4 class="page-title">User Registration</h4>
        </div>
    </div>
    <div class="container">
        <form method="post">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Name:</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Mobile No:</label> 
            <div class="col-sm-10">
                <input type="number" name="mobile_no" class="form-control" required>
            </div>
        </div>

        <div class="text-center">
            <input type="hidden" name="addUser" value="addUser">
        <button type="submit" class="btn btn-primary">Create User</button>
        </div>
    </form>
    </div>
</body>
</html>
