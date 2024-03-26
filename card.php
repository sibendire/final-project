<?php
session_start();
require_once('./php/components.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css">
    <title>Document</title>
</head>
<body class="bg-light">
    <?php
    require_once('header.php');
    ?>
    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h4>My Cart</h4>
                    <hr>
                    <?php
                    // Example to display cart items
                    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        foreach($_SESSION['cart'] as $item) {
                            components($item['itemname'], $item['itemnumber'], $item['itemimage'], $item['itemid']);
                        }
                    } else {
                        echo "<p>Your cart is empty.</p>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-5"></div>
        </div>
    </div>
</body>
</html>