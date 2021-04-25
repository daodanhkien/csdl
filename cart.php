<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/cart.css" />
    <title>Home | Cookstar</title>
</head>

<body>
    <header>
        <?php
            include "./header.php";
        ?>
    </header>
    <main style="margin-top: 100px;">
        <article>
            <ul id="list-orders">
            <?php
                $ok = 0;
                $conn = new mysqli('localhost', 'root', '', 'cookstar');
                if ( !$conn->connect_error) {
                    $sql = "SELECT product_ID,productName,buyPrice,image,quantityInStock FROM products";
                    $list = $conn->query($sql);
                    if ($list->num_rows > 0) {
                        $count = 0;
                        while($row = $list->fetch_assoc()) {
                            if ( isset($_COOKIE[$row['product_ID']]) ) {
                                $ok++;
                                echo "
                                <li>
                                <div class='items'>
                                    <span class='xButton' onclick='xIt(". $count. ")'>X</span>
                                    <div class='abc'> 
                                        <p class='img' style=\"background-image: url('". $row['image']. "');\"></p> 
                                        <p class='name'>". $row['productName']. "</p> 
                                    </div> 
                                    <div class='abd'>
                                        <p><span class='gia'>". $row['buyPrice']. "</span> $</p>
                                        <div>
                                            <button type='button' class='butn' onclick='changeNumber(-1, ". $count. ")'>-</button>
                                            <span class='numberOrder'>0</span>
                                            <button type='button' class='butn' onclick='changeNumber(1, ". $count. ")'>+</button>
                                        </div>
                                    </div>
                                </div> 
                                <span class='id' hidden='hidden'>". $row['product_ID']. "</span>
                                <span class='maxStock' hidden='hidden'>". $row['quantityInStock']. "</span>
                                </li>
                                ";
                                ++$count;
                            }
                        }
                        if ($count == 0) {
                            echo "<h2>Gio hang rong</h2>";
                        }
                        $ok = 1;
                    }
                }

                if (!$ok) echo "<h1 style='text-align: center'>Loi khi tai trang</h1>";
            ?>
            </ul>
            <form action="./buyIt.php" id="formCart" method="POST">
                <input type="text" name="id" id="formID" value="" hidden="hidden" />
                <input type="text" name="number" id="formNum" value="" hidden="hidden" />
                <span id="butAllCart" onclick="buyCart()">0</span>
            </form>
        </article>
    </main>

    <footer>
        <p>Copyright 2021</p>
    </footer>

    <script src="./assets/script/cart.js"></script>
</body>

</html>
