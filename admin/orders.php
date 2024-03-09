<?php
session_start();
ini_set("display_errors", 1);
error_reporting(E_ALL);
require_once('../conn/conn.php');

$query = "select distinct(c_id) from orders";
$result = $db->query($query);
$result = $result->fetchAll(PDO::FETCH_COLUMN);
// echo "<pre>";
// print_r($result);
// echo "</pre>";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/bs_css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/orders.css">

</head>

<body>

    <div class="container-fluid ps-3 fixed-top z-1" id="cont1">
        <!--heading part-->
        <!-- <div class="row align-items-center"> -->
            <!-- for title-->
            <!-- <div class="col-9 col-md-10 col-lg-11">
                <p class="h1 _title m-0">Manage Orders /
                    <a href="adash.php">
                        <img src="../site_image/manage.png" id="title_image">
                    </a>
                </p>
            </div>
            <div class="col-3 col-md-2 col-lg-1 text-end">
                <a href="admin_logout.php" class="pt-2 pe-3">Logout</a>
            </div> -->
        <!-- </div> -->
        <!-- <hr> -->
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

    <div class="container-fluid z-0 mb-5" id="cont2">
        <div class="row">
            <div class="col-5">
                <?php
                for ($i = 0; $i < count($result); $i++) {
                    $cid = $result[$i];

                    //select email address of customer named 'A'
                    $query1 = "select Name, Email, Address,Phone from customers where c_id = ('$cid')";
                    $result1 = $db->query($query1);
                    $result1 = $result1->fetch(PDO::FETCH_ASSOC);

                    //all orders of a customer named 'A'
                    $query2 = "select Pname, Price from orders where c_id = '$cid' ";
                    $result2 = $db->query($query2);
                    $result2 = $result2->fetchAll(PDO::FETCH_ASSOC);
                ?>
                    
                    <table class="table caption-top">
                    <caption>Order for:
                        <?php echo $result1['Email']; ?>: ( <?php echo $result1['Name']; ?> )
                    </caption>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php $total = 0; ?>
                            <?php foreach ($result2 as $single) { ?>
                                <?php $total = $total + $single['Price']; ?>
                                <tr>
                                    <td>
                                        <?php echo $single['Pname']; ?>
                                    </td>
                                    <td>
                                        <?php echo $single['Price']; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="mb-4">
                        <p>Total: <?php echo $total; ?> <span class="ms-3">Phone: <?php echo $result1['Phone']; ?></span></p>
                        <span>Delivery Address: <?php echo $result1['Address'];?></span>
                        <a href="delete_order.php?cid=<?php echo $cid; ?>" class="ms-2">
                            <button class="btn btn-outline-danger btn-sm">Mark Delivered &check;</button>
                        </a>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>

    <!-- <p><?php echo $result[0]; ?></p> -->
    <script src="../js/admin_nav.js"></script>
    <script src="../js/bs_js/bootstrap.min.js"></script>
</body>

</html>