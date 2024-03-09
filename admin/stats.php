<?php
session_start();
ini_set('display_errors' ,1);
error_reporting(E_ALL);

if (!isset($_SESSION['admin_logged_in'])){
    header("Location:index.php");
}

require_once '../conn/conn.php';
$query = "select c_id from customers";
$result = $db -> query($query);
$no_of_customers = $result -> rowCount();

$query = "select p_id from products";
$result = $db -> query($query);
$no_of_products = $result -> rowCount();

$query = "select distinct(c_id) from orders";
$result = $db -> query($query);
$no_of_orders = $result -> rowCount();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bs_css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/stats.css">
</head>
<body>

    <!--for navbar-->
    <div class="container-fluid">
        <div class="row py-3 border-bottom">
            <div class="col-12" id="navbar">
                <span class="ps-3"><a href="stats.php">Dashboard</a></span>
                <span class="ps-3"><a href="adash.php">Manage Products</a></span>
                <span class="ps-3"><a href="orders.php">Manage Orders</a></span>
                <span class="ps-3"><a href="users.php">Manage Users</a></span>
                <span><a href="admin_logout.php" id="logout" class="pe-4">Logout</a></span>
            </div>
        </div>
    </div>


    <!--for icons -->
    <div class="container-fluid mt-3">
        <div class="row justify-content-center align-items-center" id="icon_row">
            <div class="col-2 icons  d-flex align-items-center justify-content-center ">
                Products: <?php echo $no_of_products; ?>
            </div>
            <div class="col-2 icons d-flex align-items-center justify-content-center ms-5">
                Orders: <?php echo $no_of_orders; ?>
            </div>
            <div class="col-2 icons d-flex align-items-center justify-content-center ms-5">
                Customers: <?php echo $no_of_customers; ?>
            </div>
        </div>
    </div>





    <script src="../js/admin_nav.js"></script>
    <script src="../js/bs_js/bootstrap.min.js"></script>
    
</body>
</html>