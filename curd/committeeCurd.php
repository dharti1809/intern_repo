<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Committee Management</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" 
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" 
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
<?php 


  if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['addCommitteeData'])){
// print_r($_POST);
// print_r($_FILES);
// exit();
    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["committee_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
    
      $check = getimagesize($_FILES["committee_image"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
 

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["committee_image"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["committee_image"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["committee_image"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

    $committee_name = $_POST['committee_name'];
    $committee_designation = $_POST['committee_designation'];
    $committee_role = $_POST['committee_role'];
    $committee_year = $_POST['committee_year'];
    $committee_image = $_FILES["committee_image"]["name"];
    $added_date = date("Y-m-d H:i:s");

    $sql = "INSERT INTO committee_master (committee_name,committee_designation,committee_role,committee_year,committee_image ,added_date) VALUES ('$committee_name','$committee_designation','$committee_role','$committee_year','$committee_image','$added_date') ";

    if($conn->query($sql) == true ){
      echo "User created successfully!";
      header("location: committeeCurd.php");
    }else {
      echo "Error: " . $conn->error;
      header("location: committeeCurd.php");
    }
  }

elseif($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['updateCommittees'])){
  if(isset($_FILES["committee_image"]) && $_FILES["committee_image"]["error"] == 0) {
    $check = getimagesize($_FILES["committee_image"]["tmp_name"]);
    $committee_image = $_FILES["committee_image"]["name"];
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
 

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["committee_image"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["committee_image"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["committee_image"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
}else{
  $committee_image = $_POST['old_committee_image'];
}

    $committee_name = $_POST['committee_name'];
    $committee_designation = $_POST['committee_designation'];
    $committee_role = $_POST['committee_role'];
    $committee_year = $_POST['committee_year'];
    $committee_image = $committee_image;
    $committee_id = $_POST['updateCommittee1'];
    $updated_date = date("Y-m-d H:i:s");

    $sql1 = "UPDATE committee_master SET committee_name = '$committee_name',committee_designation = '$committee_designation',committee_role='$committee_role',committee_year='$committee_year',committee_image = '$committee_image',updated_date = '$updated_date' WHERE committee_id='$committee_id'";

    if($conn->query($sql1) == true){
      echo "Updated successfully!";
      header("location: committeeCurd.php");
    } else {
      echo "Error: " . $conn->error;
      header("location: committeeCurd.php");
    }

  }


elseif($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['deleteCommittee'])){
  $delete_id = isset($_POST['committee_id']);
  $sql = "DELETE FROM committee_master WHERE committee_id = '$delete_id'";
  if($conn->query($sql) == true){
    echo "User Deleted successfully";
    header("location: committeeCurd.php");
  }else{
    echo "Error: " . $conn->error;
    header("location: committeeCurd.php");
  }
}
?>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-9">
        <h4 class="page-title">Committee</h4>
      </div>
      <div class="col-sm-3 text-right">
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addCommittee">
          + Add Committee
        </button>
      </div>
    </div>   

    <div class="row mt-3">   
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                  <tr>  
                    <th>#</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Year</th>
                    <th>Designation</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                   $result = $conn->query("SELECT * FROM committee_master");
                   if ($result->num_rows > 0) {
                   $i = 1; 
                  while ($row = $result->fetch_assoc()) {
                  ?>
                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo htmlspecialchars($row['committee_name']); ?></td>
                      <td>
                        <?php echo ($row['committee_role'] == "0") ? "Office Bearers" : "Executive Committee"; ?>
                      </td>
                      <td><?php echo htmlspecialchars($row['committee_year']); ?></td>
                      <td><?php echo htmlspecialchars($row['committee_designation']); ?></td>
                      <td>              
                        <a href="../img/<?php echo htmlspecialchars($row['committee_image']); ?>" 
                           data-fancybox="images" 
                           data-caption="Committee Image">
                          <img src="../img/<?php echo htmlspecialchars($row['committee_image']); ?>" 
                               alt="Committee Image" class="rounded-circle" height="100" width="100"> 
                        </a>
                      </td>

                      <td>
                        <input type="checkbox" class="js-switch" data-color="#15ca20" data-size="small"/>
                      </td>

                      <td>
                        <form action="committeeCurd_edit.php" method="post">
                          <input type="hidden" name="getCommittee" value="getCommittee">
                        
                        <button type="button" class="btn btn-sm btn-primary editRange"  data-toggle="modal" data-target="#updateCommittee" onclick="editCommitee( '<?php echo $row['committee_id']; ?>','<?php echo $row['committee_name']; ?>','<?php echo $row['committee_year']; ?>','<?php echo $row['committee_designation']; ?>',
                          '<?php echo $row['committee_role']; ?>','<?php echo $row['committee_image']; ?>')">

                          <i class="fa fa-edit"> Edit</i>
                        </button>
                        </form>
                        <form action="" method="POST">
                          <input type="hidden" name="deleteCommittee" value="deleteCommittee">
                          <input type="hidden" name="committee_id" value="<?php echo $row['committee_id']; ?>">
                          <button type="submit" class="btn-sm btn-danger"> Delete </button>
                        </form>
                      </td>
                    </tr>
                  <?php } } ?>
                </tbody>
              </table>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Add Committee Modal -->
<div class="modal fade" id="addCommittee" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Add Committee</h5>
        <button type="button" class="close text-white" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <form method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label>Name<span class="required">*</span></label>
            <input type="text" class="form-control" name="committee_name" required />
          </div>
          <div class="form-group">
            <label>Designation<span class="required">*</span></label>
            <input type="text" class="form-control" name="committee_designation" required />
          </div>
          <div class="form-group">
            <label>Role<span class="required">*</span></label>
            <select name="committee_role" class="form-control" required>
              <option value="">Select</option>
              <option value="0">Office Bearers</option>
              <option value="1">Executive Committee</option>
            </select>
          </div>
          <div class="form-group">
            <label>Year<span class="required">*</span></label>
            <select class="form-control" name="committee_year" required>
              <option value="">Select</option>
              <?php 
              for ($year = date("Y"); $year >= 2000; $year--) {
                  echo "<option value=\"$year\">$year</option>";
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" name="committee_image" accept="image/*" required>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="addCommitteeData" value="addCommitteeData" />
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="updateCommittee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Committee Update</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="committeeUpdate" method="POST" class="form-horizontal" action="" enctype="multipart/form-data">
        
        <div class="modal-body">
          <div class="form-group row">
            <label for="committee_name" class="col-sm-4 col-form-label">Name<span class="required">*</span></label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="committee_name" id="committee_name1" required="" value="" />
            </div>
          </div>
          <div class="form-group row">
            <label for="committee_designation" class="col-sm-4 col-form-label">Designation<span class="required">*</span></label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="committee_designation" id="committee_designation1" required=""  value=""/>
            </div>
          </div>

          <div class="form-group row">
            <label for="committee_role" class="col-sm-4 col-form-label">Role<span class="required">*</span></label>
            <div class="col-sm-8">
              <select name="committee_role" id="committee_role1" class="form-control single-select" required >
                <option value=""> Select </option>
                <option value="0"> Office Bearers </option>
                <option value="1"> Executive Committee </option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="committee_year" class="col-sm-4 col-form-label">Year<span class="required">*</span></label>
            <?php $currentyear = date("Y"); 
            $years = [];
            ?>
            <?php
            for ($year = $currentyear; $year >= 2000; $year--) {
              $years[] = $year;
            }
            ?>
            <div class="col-sm-8">
              <select class="form-control single-select" name="committee_year" id="committee_year1" required>
                <option value="">Select</option>
                <?php
                foreach($years as $year){
                  echo $year;?>
                  <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group row"> 
            <label for="committee_image" class="col-sm-4 col-form-label"> Image </label>
            <div class="col-sm-8">
              <input type="file" class="form-control border photoOnly" name="committee_image" accept="image/*" id="committee_image1">
              <!-- <input type="hidden" name="old_profile_photo" value=""> -->
              <a href="" data-fancybox="images" data-caption="photo name: committee image">
              <img src="" id="committee_image_preview" width="100" height="100" alt="Committee Image" class="mt-2"></a>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <div class="col-md-12 text-center">
            <input type="hidden" name="updateCommittees" id="updateCommittees">
            <input type="hidden" name="updateCommittee1" id="edit_committee_id"  />
            <input type="hidden" name="old_committee_image" id="old_committee_image"/>
            <button type="submit" class="btn btn-success" name="update_committee" id="update_committee">Update</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
<script>
    function editCommitee(committee_id,committee_name,committee_year,committee_designation,committee_role,committee_image) {
      // console.log(committee_year);
      $('#edit_committee_id').val(committee_id);
      $('#committee_name1').val(committee_name);
      $('#committee_designation1').val(committee_designation);
      $('#committee_role1').val(committee_role);
      $('#committee_year1').val(committee_year);
      if(committee_image){
        $('#committee_image_preview').attr('src','../img/' + committee_image);
      }else{
        $('#committee_image_preview').attr('src','');
      }
      $('#old_committee_image').val(committee_image);
    }
      
</script>


</body>
</html>
