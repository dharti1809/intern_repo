<?php
include 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="row pt-2 pb-2 d-flex">
        <div class="col-sm-10">
             <h2>User List</h2>
        </div>
        <div class="col-sm-2">
            <a href="curd.php" class="btn btn-warning btn-sm pull-right">Add</a>
        </div>
    </div>
<div class="container mt-5">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Mobile No</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $result = $conn->query("SELECT * FROM users");

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['mobile_no']; ?></td>
                         <td>
                            <!-- <a href="update_curd.php?id=<?php echo $row['id']; ?>&action=update" class="btn btn-warning btn-sm">Edit</a> -->

                            <!-- <a href="update_curd.php?id=<?php echo $row['id']; ?>&action=delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a> -->

                            <form action="update_curd.php" method="post">
                                <input type="hidden" value="getUser" name="getUser">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                                <button class="btn btn-sm btn-success" type="submit">update</button>
                            </form></br> 

                            <form action="update_curd.php" method ="post">
                             <input type="hidden" value="deleteUser" name="deleteUser">
                             <input type="hidden" name="delete_id" value="<?php echo $row['id'] ?>">
                                <button type="delete" class="Deletedata btn btn-sm btn-danger" > <i class="fa fa-delete"> </i> Delete</button>
                            </form> 

                        </td>
                    </tr>
                <?php } 
            } else { ?>
                <tr>
                    <td colspan="4" class="text-center">No data found</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
