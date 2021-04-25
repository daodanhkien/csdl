<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$email = $_POST['email'];
$address = $_POST['address'];

// Create connection
$conn = new mysqli("localhost","root","","cookstar");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into customers(name,phone,password,email,address) values(?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss",$name,$phone,$password,$email,$address);
    $execval = $stmt->execute();
    echo $execval;
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
}
?>
