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
		    <h2 class="page-title"> Admin Registration </h2>
		</div>
		<div class="col-sm-2 text-right">
			<button type="button" class="btn btn-success" name="addButton">Add</button>
		</div>
	</div>
<?php
if(isset($_POST['update_admin'])){
	$update_admin = $_POST['update_admin'];
	$sql = "SELECT * FROM admin_registration WHERE admin_id ='$update_admin'";

	$admin = $conn->query($sql);

		$admin_data = $admin->fetch_assoc()
?>

<div class="row mt-3">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<form id="adminForm" method="POST" enctype="multipart/form-data" action="controller/admin_controller.php">
					<h4 class="form-header text-uppercase"> Admin Update </h4>
					<div class="form-group row">
						<div class="col-sm-6">
							<label> Name: </label>
							<input type="text" name="admin_name" class="form-control" id="admin_name" placeholder="Enter Your Name" value="<?php echo $admin_data['admin_name']; ?>">
						</div>
						<div class="col-sm-6">
							<label>Email_id</label>
							<input type="text" name="email_id" class="form-control" id="email_id" placeholder="Enter Your Email id" value="<?php echo $admin_data['email_id']; ?>">
						</div>
						<div class="col-sm-6">
							<label>Country Code</label>
							<select class="form-control" name="country_code" id="country_code">
								<option value="" >Select</option>
								<option value="+91" <?php echo ($admin_data['country_code'] == "+91") ? "selected" : "" ?> >+91</option>
								<option value="+92" <?php echo ($admin_data['country_code'] == "+92") ? "selected" : "" ?>>+92</option>
								<option value="+93" <?php echo ($admin_data['country_code'] == "+93") ? "selected" : "" ?> >+93</option>
								<option value="+94" <?php echo ($admin_data['country_code'] == "+94") ? "selected" : "" ?>>+94</option>
								<option value="+95" <?php echo ($admin_data['country_code'] == "+95") ? "selected" : "" ?>>+95</option>
							</select>
						</div>
						<div class="col-sm-6">
							<label>Mobile No</label>
							<input type="text" name="mobile_no" class="form-control onlyNumber" id="mobile_no" placeholder="Enter your Mobile No" value="<?php echo $admin_data['mobile_no']; ?>">
						</div>
						<div class="col-sm-6">
							<label>Password</label>
							<input type="password" name="password" id="password" placeholder="Enter Your password" class="form-control" value="<?php echo $admin_data['password']; ?>">
						</div>
						<div class="col-sm-6">
							<label>Gender</label>
							<div class="form-group check">
								<input type="radio" name="gender" id="gender" value="male" <?php echo ($admin_data['gender'] == "male") ? "checked" : "" ?> class="form-check-input">
								<label>Male</label>
							</div>
							<div class="form-group check">
								<input type="radio" name="gender" id="gender" value="female" <?php echo ($admin_data['gender'] == "female") ? "checked" : "" ?> class="form-check-input">
								<label>Female</label>
							</div>
						</div>
						<div class="col-sm-6">
							<label>Address</label>
							<!-- <input type="text" name="address" class="form-control" id="address" placeholder="enter your address"> -->
							<textarea class="form-control" id="address" name="address"><?php echo $admin_data['address']; ?></textarea>
						</div>
						<div class="form-footer text-center"> 
							<input type="hidden" name="admin_update" value="admin_update">
							<input type="hidden" name="edit_admin" value="<?php echo $admin_data['admin_id']; ?>">
							<button type="submit" class="btn btn-success mt-2 ">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php

}else{

?>
<div class="row mt-3">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<form id="adminForm" method="POST" enctype="multipart/form-data" action="controller/admin_controller.php">
					<h4 class="form-header text-uppercase"> Admin Added </h4>
					<div class="form-group row">
						<div class="col-sm-6">
							<label> Name: </label>
							<input type="text" name="admin_name" class="form-control" id="admin_name" placeholder="Enter Your Name" value="">
						</div>
						<div class="col-sm-6">
							<label>Email_id</label>
							<input type="text" name="email_id" class="form-control" id="email_id" placeholder="Enter Your Email id" value="">
						</div>
						<div class="col-sm-6">
							<label>Country Code</label>
							<select class="form-control" name="country_code" id="country_code">
								<option value="+91">+91</option>
								<option value="+92">+92</option>
								<option value="+93">+93</option>
								<option value="+94">+94</option>
								<option value="+95">+95</option>
							</select>
						</div>
						<div class="col-sm-6">
							<label>Mobile No</label>
							<input type="text" name="mobile_no" class="form-control" id="mobile_no" placeholder="Enter your Mobile No">
						</div>
						<div class="col-sm-6">
							<label>Password</label>
							<input type="password" name="password" id="password" placeholder="Enter Your password" class="form-control">
						</div>
						<div class="col-sm-6">
							<label>Gender</label>
							<div class="form-group check">
								<input type="radio" name="gender" id="gender" value="male" class="form-check-input">
								<label>Male</label>
							</div>
							<div class="form-group check">
								<input type="radio" name="gender" id="gender" value="female" class="form-check-input">
								<label>Female</label>
							</div>
						</div>
						<div class="col-sm-6">
							<label>Address</label>
							<!-- <input type="text" name="address" class="form-control" id="address" placeholder="enter your address"> -->
							<textarea class="form-control" id="address" name="address"></textarea>
						</div>
						<div class="form-footer text-center">
							<input type="hidden" name="admin_add" value="admin_add">
							<button type="submit" class="btn btn-success mt-2 ">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php } ?>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
