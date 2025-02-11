<?php
$servername = "localhost";
$username = "chpl";
$password = "Chpl@321.";
$dbname = "myDB";

// Create connection
$conn =mysqli_connect ($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// $sql = "CREATE TABLE myTable 


$sql = "SELECT id, firstname, lastname FROM MyGuests LIMIT 3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
mysqli_close($conn);
?>