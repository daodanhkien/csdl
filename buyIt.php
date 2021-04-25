<?php

$id = $_POST['id'];
$number = $_POST['number'];
$_COOKIE['user'];

$conn = new mysqli('localhost', 'root', '', 'cookstar');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ( isset($id) && isset($number) && $number != "" && $id != "" ) {
    $ok = 0;

    $zone = 5 * 3600;

    $t = time() + $zone; 
    $sql = "insert into orders( orderDate, requiredDate, shippedDate, status, customer_ID ) values ('". date("Y-m-d H:i:s",$t). "', '". date("Y-m-d H:i:s",$t + 1800)."', '". date("Y-m-d H:i:s",$t + 60)."', NULL, ". $_COOKIE['user']. ")";
    echo $sql. "<br />";
    $result = $conn->query($sql);

    if ( $result != "" ) {
        $sql = "SELECT order_ID FROM orders WHERE customer_ID = '". $_COOKIE['user']. "' AND orderDate = '". date("Y-m-d H:i:s", $t). "'";
        echo $sql. "<br />";
        $result = $conn->query($sql);
        $orderID = -1;
        if ($result->num_rows > 0) {
            $orderID = $result->fetch_assoc()['order_ID'];
            if ($orderID != -1) {
                $number = explode(" ", $number);
                $id = explode(" ", $id);
                $length = count($number);
                for ($i = 0; $i < $length; ++$i) {
                    $sql = "INSERT INTO orderdetails VALUES (". $orderID. ",". $number[$i]. ",". $id[$i].");";
                    echo $sql. "<br />";
                    $result = $conn->query($sql);
                    if ($result == "") break;
                    $sql = "SELECT quantityInStock FROM products WHERE product_ID = '". $id[$i]. "' ";
                    echo $sql. "<br />";
                    $result = $conn->query($sql);
                    if ($result == "") break;
                    $l = $result->fetch_assoc()['quantityInStock'] - $number[$i];
                    $sql = "UPDATE products SET quantityInStock='". $l. "' WHERE product_ID = '". $id[$i]. "'";
                    echo $sql. "<br />";
                    $result = $conn->query($sql);
                    if ($result == "") break;
                }
                $ok = ($i == $length);
            }
        }
    };

    $conn->close();

    $mes = "Thanh cong";

    if ($ok = 0) {
        $mes = "Loi khi thanh toan, vui long thu lai";
    }
}

header("Location: ./order.php?mes=". $mes, true);
die();

?>
