<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('conn/conn.php');

if (isset($_SESSION['cart'])) {

    $cid = $_SESSION['logged_in_user_id'];

    foreach ($_SESSION['cart'] as $key => $value) {
        $pid = $value['pid'];
        $pname = $value['pname'];
        $price = $value['price'];
        $query = "insert into orders (c_id, p_id, Pname, Price) values ('$cid', '$pid', '$pname', '$price')";
        $db->exec($query);

        $query2 = "update products set Quantity = (Quantity -1) where p_id = '$pid'";
        $db -> exec($query2);
    }
    unset($_SESSION['cart']);
    unset($_SESSION['items_in_cart_id']);
    // unset($_SESSION['total']);
}



// header("refresh:3 url=index.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bs_css/bootstrap.min.css">
    <style>
        #tq {
            color: rgba(0, 0, 0, 0.607);
            font-weight: 200;
        }
        #r1{
            height: calc(100vh - 100px);
        }
    </style>
</head>

<body>

    <div class="container-fluid" >
        <div class="row ps-3 align-items-center" id="r1">
            <div class="col-12">
                <p class="h1 text-center" id="tq">Thank you for your payment of RS <b><?php echo $_SESSION['total']; ?>:)</b></p>
            </div>
        </div>
    </div>


    <script src="js/bs_js/bootstrap.min.js"></script>

</body>

</html>