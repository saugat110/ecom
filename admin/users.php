<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])){
    header("Location:index.php");
}
require_once('../conn/conn.php');

$query = "select * from customers";
$result = $db->query($query);
$result = $result->fetchAll();
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

    <div class="container-fluid mt-1">
        <div class="row">
            <div class="col-7">
                <!--display users-->
                <table class="table table-bordered ">
                    <tbody>
                        <?php foreach ($result as $single) { ?>
                            <tr>
                                <td><?php echo $single['Name']; ?></td>
                                <td><?php echo $single['Email']; ?></td>
                                <td><?php echo $single['Address']; ?></td>
                                <td><?php echo $single['Phone']; ?></td>
                                <td class="text-center">
                                    <form action="delete_users.php" method="post">
                                        <input type="hidden" name="uid" value="<?php echo $single['c_id'];?>">
                                        <input type="submit" name="submit" value="Delete" class="btn btn-outline-danger btn-sm py-1 px-3">
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>







    <script src="../js/admin_nav.js"></script>
    <script src="../js/bs_js/bootstrap.min.js"></script>
</body>

</html>