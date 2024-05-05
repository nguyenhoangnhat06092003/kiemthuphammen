
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant-service";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$Name = $_POST["Name1"];
    $Contact = $_POST["Contact1"];
    $Notes = $_POST["Notes1"];

$sql = "INSERT INTO  `contact_sql`( `UserName`, `contact`, `notes`) 
VALUES ('$Name', '$Contact', '$Notes')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header('Location: http://localhost/Sorae/');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }


$conn->close();
?>