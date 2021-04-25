<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/ordered.css" />
    <title>Home | Cookstar</title>
</head>

<body>
    <header>
        <?php
            include "./header.php";
        ?>
    </header>
    <main>
        <article>
            <ul id="list-order">
            <?php
                $ok = 0;
                $conn = new mysqli('localhost', 'root', '', 'cookstar');
                if ( !$conn->connect_error) {
                    $sql = "SELECT * FROM orders WHERE customer_ID = '". $_COOKIE['user']. "'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($list_row = $result->fetch_assoc()) {
                            echo "<li>";
                            echo "<p> Ngay ". $list_row['orderDate'];
                                if ($list_row['status'] == 'shipped') {
                                    echo ' da ship';
                                }
                            echo "</p>";
                            echo "<ul class='list-tems'>";
                            $sql = "SELECT productName, image, quantityordered FROM orderdetails od INNER JOIN products p ON od.produc_ID = p.product_ID where order_ID = '". $list_row['order_ID']. "'";
                            // echo $sql. "<br />";
                            $re = $conn->query($sql);
                            if ($re->num_rows > 0) {
                                while ($row = $re->fetch_assoc()) {
                                    echo "
                                    <li>
                                    <div class='items'> 
                                        <div class='abc'> 
                                            <p class='img' style=\"background-image: url('". $row['image']. "');\"></p> 
                                            <p class='name'>". $row['productName']. "</p> 
                                        </div> 
                                        <p class='abd'>
                                            So Luong ". $row['quantityordered']. "
                                        </p> 
                                    </div>
                                    </li>
                                    ";
                                }
                            }
                            echo "</ul>";
                            echo "</li>";
                        }
                    } else {
                        echo "<h2>Quy khac chua dat hang</h2>";
                        $ok = 1;
                    }
                } else {
                    echo "Connect DataBase failed: ". $conn->connect_error. "<br />";
                }

                if (!$ok) echo "<h1 style='text-align: center'>Loi khi tai trang</h1>";
            ?>
            </ul>
        </article>
    </main>

    <footer>
        <p>Copyright 2021</p>
    </footer>
</body>

</html>
