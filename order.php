<!DOCTYPE html>
<html lang="vi-VI">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./assets/css/order.css" type="text/css" />
        <link rel="stylesheet" href="./assets/font/themify-icons.css" type="text/css" />
        <title>Order | Cookstar</title>
    </head>
    <body>
        <header>
            <?php
                include "./header.php";
            ?>
        </header>
        <main style="margin-top: 60px;">
            <div id="banner">
                <h2>Announcement banner</h2>
                <p>Stay up to date with our latest information.</p>
            </div>
            <aside>
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name" />
            </aside>
            <article>
                <h2>Items</h2>
                <ul id="list-items">
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

                    $sql = "SELECT product_ID,productName,buyPrice,image,quantityInStock FROM products";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
                        $count = 0;
                        while($row = $result->fetch_assoc()) {
                            if ($row['quantityInStock'] > 0) {
                                echo "
                                <li>
                                <div class='items'> 
                                    <div class='abc'> 
                                        <p class='img' style=\"background-image: url('". $row['image']. "');\"></p> 
                                        <p class='name'>". $row['productName']. "</p> 
                                    </div> 
                                    <div class='abd'>
                                        <p><span class='gia'>". $row['buyPrice']. "</span> $</p> 
                                        <p class='order'>
                                            <span class='cart button' onclick='cart(". $row['product_ID']. ", ". $count. ")'>";
                                            if ( isset($_COOKIE[$row['product_ID']]) ) {
                                                echo "Uncart";
                                            } else {
                                                echo "Cart";
                                            }

                                        echo "</span> 
                                            <span class='buy button' onclick='buy(". $count. ")'>Buy</span> 
                                        </p> 
                                    </div> 
                                </div> 
                                <span class='id' hidden='hidden'>". $row['product_ID']. "</span>
                                <span class='maxStock' hidden='hidden'>". $row['quantityInStock']. "</span>
                                </li>
                                ";
                                ++$count;
                            }
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();

                    ?>
                </ul>
                <dialog id="dialog">
                    <h2>Order it now</h2>
                    <form id="orderForm" method="POST" action="./buyIt.php">
                        <input type="text" id="idOrder" name="id" value="" hidden="hidden"/>
                        <input type="text" id="number" name="number" value="" hidden="hidden"/>
                        <p id="imgOrder"></p>
                        <p>Items:</p>
                        <p id="sizeOrder">
                            <button type="button" class="butn" onclick="changeNumber(-1)">-</button>
                            <span id="numberOrder">0</span>
                            <button type="button" class="butn" onclick="changeNumber(1)">+</button>
                        </p>
                        <p id="buyNow">
                            <button type="button" class="cance butn" onclick="cance()">X</button>
                            <button type="button" class="ok butn" onclick="buyIt()">$&nbsp;<span id="sumValue">0</span></button>
                        </p>
                        <span id="price" hidden>0</span>
                        <span id="maxSize" hidden>0</span>
                    </form>
                </dialog>
            </article>
        </main>
        <footer>
            <p>Copyright 2021</p>
        </footer>

        <script src="./assets/script/order.js"></script>
        <?php
            if (isset($_GET['mes'])) {
                echo 
                "<script> alert('". $_GET['mes']. "');
                window.location.href = window.location.href.split('?')[0];
                </script>";
            }
        ?>
    </body>
</html>
