<?php include "../dbconnect.php" ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="content-fluid">
	<div class="row">
		<div class="col-sm-9">
			<h2 class="page-title">Admin Data</h2>
		</div>

		<div class="col-sm-3">
			<a href="admin_add_update.php" class="btn btn-primary float-right">Add</a>
		</div>

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">Admin Table</div>
			<div class="card-body">
				<div class="table-responsive">

					<table id="admintable" class="table table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Email id</th>
								<th>Country Code</th>
								<th>Mobile No</th>
								<th>password</th>
								<th>Gender</th>
								<th>Address</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$sql1 = "SELECT * FROM admin_registration";

							$result = $conn->query($sql1);
							$i = 1;
							if($result->num_rows > 0){
								while($data = $result->fetch_assoc()){

							?>
							<td><?php echo $i++ ; ?></td>    
              <td><?php echo $data['admin_name']; ?></td>
              <td><?php echo $data['email_id']; ?></td>
              <td><?php echo $data['country_code']; ?></td>
              
              <td><?php echo $data['mobile_no']; ?></td>
              <td><?php echo $data['password']; ?> </td>
              <td><?php echo $data['gender']; ?></td>
              <td><?php echo $data['address']; ?></td>
              <td class="d-flex">
              	<form action="admin_add_update.php" method="post">
              		<input type="hidden" name="update_admin" value="<?php echo $data['admin_id']; ?> ">
              		<button type="submit" class="btn-sm btn btn-success">Update</button>
              	</form>
              	<form action="controller/admin_controller.php" method="post">
              		<input type="hidden" name="delete_admin" value="delete_admin">
              		<input type="hidden" name="delete_data" value="<?php echo $data['admin_id']; ?>">
              		<button type="submit" class="btn-sm btn btn-danger">Delete </button>
              	</form>
              </td>
						</tbody>
					<?php		
				} } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
