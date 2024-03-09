<?php

session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
// unset($_SESSION['cart']);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bs_css/bootstrap.min.css">
    <link rel="stylesheet" href="css/cart_display.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row ps-3">

            <?php if(!empty($_SESSION['cart'])) { ?>
            <!--title-->
            <div class="col-12">
                <p class="display-4" id="title">Cart Items 
                    <a href="index.php"><img src="site_image/arrow.png" alt="" id="bck_image"></a>
                </p>
            </div>
        </div>

        <!--display cart-->
        <div class="row ps-3">
            <div class="col-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                            <tr>
                                <td><?php echo $value['pname']; ?></td>
                                <td><?php echo $value['price']; ?></td>
                                <td class="col-1">
                                    <form action="remove_item.php" method="post">
                                        <input type="hidden" name="remove_item_id" value="<?php echo $value['pid'];?>">
                                        <input type="submit" name="delete_cart_item" value="Remove" class="btn btn-outline-danger btn-sm">
                                    </form>
                                </td>
                                <?php $total = $total + $value['price'];?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <p>Total: <?php echo $total; ?></p>
                <?php $_SESSION['total'] = $total; ?>
                    <?php if( ($total >= 70) && isset($_SESSION['logged_in_user_id']) ){ ?>
                        <a href="checkout.php">
                            <button class="btn btn-outline-primary btn-sm px-5">Pay</button>
                        </a>
                    <?php } else if( ($total < 70) && isset($_SESSION['logged_in_user_id']) ) { ?>
                        <button class="btn btn-outline-primary btn-sm px-5" disabled read only>Pay</button>
                        <span id="emsg">Amount must be greater than 70 to pay</span>
                    <?php } else { ?>
                        <a href="user/user_login.php">
                        <button class="btn btn-outline-primary btn-sm px-2">Login to Pay</button>
                        </a>
                    <?php } ?>

                    <br><br>
                    <?php if(isset($_SESSION['cart'])) {?>
                    <a href="clear_cart.php">
                        <button class="btn btn-outline-info btn-sm px-2" >Clear All</button>
                    </a>
                    <?php } ?>
            </div>




        </div>



        <?php } else { ?>
        <div class="row">
            <div class="col-12">
                <p class="h1" id="title">No Items Added in Cart 
                    <a href="index.php"><img src="site_image/arrow.png" alt="" id="bck_image"></a>
                </p>
            </div>
        </div>
        <?php } ?>


    </div>



    <script src="js/bs_js/bootstrap.min.js"></script>
</body>

</html>