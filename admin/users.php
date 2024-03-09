<?php
require_once ('../conn/conn.php');

$query = "select * from customers";
$result = $db -> query($query);
$result = $result -> fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bs_css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/users.css">
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
    
        <!--display users-->






    <script src="../js/admin_nav.js"></script>
    <script src="../js/bs_js/bootstrap.min.js"></script>
</body>
</html>