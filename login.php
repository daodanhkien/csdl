<?php
$phone = $_POST['phone'];
$password = $_POST['password'];

// Create connection
$conn = new mysqli("localhost", "root", "", "cookstar");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$query = "SELECT name, Customer_ID FROM customers WHERE (phone = '". $phone. "' or name = '". $phone. "' ) and password = '". $password. "'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    setcookie("user", $row['Customer_ID']);
    setcookie("userName", $row['name']);
    echo "ok";
}
$conn->close();
echo $_POST['lastLocation'];
header("Location: ". $_POST['lastLocation']);
die();
?>
