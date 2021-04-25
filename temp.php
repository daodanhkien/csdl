<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cookstar";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT productName,buyPrice,image FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<br> productname: ". $row["productName"]. " - price: ". $row["buyPrice"].  "<br>". $row["image"].  "<br>";
}
} else {
  echo "0 results";
}
$conn->close();
?>
