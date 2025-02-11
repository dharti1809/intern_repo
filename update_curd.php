<?php
include 'dbconnect.php';

// $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$user = null;

if ($id > 0) {
    // Fetch user details
    $sql = "SELECT name, email, mobile_no FROM users WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name =  $_POST['name'];
    $email = $_POST['email'];
    $mobile_no = $_POST['mobile_no'];
    $id = intval($_POST['id']);

    $sql = "UPDATE users SET name='$name', email='$email', mobile_no='$mobile_no' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully!";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Edit User</title>
</head>
<body>
    <div class="row">
        <div class="col-sm-12 m-3 text-center">
            <h4 class="page-title">Edit User</h4>
        </div>
    </div>
    <div class="container">
        <form method="post">
            <input type="hidden" name="id" value="<?= $id ?>">

            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="<?= $user['name']; ?>" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" value="<?= $user['email']; ?>" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Mobile No:</label> 
                <div class="col-sm-10">
                    <input type="number" name="mobile_no" class="form-control" value="<?= $user['mobile_no']; ?>" required>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update User</button>
            </div>
        </form>
    </div>
</body>
</html>
