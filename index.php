<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

require_once ('conn/conn.php');
$query = "select * from products";
$result = $db -> query($query);
$result = $result -> fetchAll(PDO::FETCH_ASSOC);

// if(!isset($_GET['atc_visited'])){
//     $_SESSION['items_in_cart_id'] = array();
// }

// unset($_SESSION['cart']);
// unset($_SESSION['items_in_cart_id']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="site_image/favicon.png">
    <link rel="stylesheet" href="css/bs_css/bootstrap.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
    <script src="js/jquery.js"></script>
</head> 

<body class="p-0 m-0">
    <div class="container-fluid p-0" id="main_cont">
        <?php include_once('header/header.php'); ?>

        <div class="row justify-content-center">
            <div class="col-11 col-md-10 p-2 p-md-0 text-center">
                <img src="site_image/mid_image.jpg" id="mid_image" class="image-fluid mb-5">
            </div>
        </div>


        <!--product display part-->

        <div class="row px-5 gx-3 gy-3 justify-content-center">
            <?php foreach($result as $single) {?>

                <div class="col-2 border border-1 pb-2 rounded me-3">
                    <img src="prod_images/<?php echo $single['Image'];?>" alt="Image" class="img-fluid w-100 prod_image">
                    <p><?php echo $single['Pname'];?></p>
                    <p>Rs <?php echo $single['Price'];?> per kg</p>

                    <form action="add_to_cart.php" method="post" onclick = "func1()">
                        <input type="hidden" name="pid" value="<?php echo $single['p_id'];?>">
                        <input type="hidden" name="pname" value="<?php echo $single['Pname'];?>">
                        <input type="hidden" name="price" value="<?php echo $single['Price'];?>">

                        <?php if( !in_array($single['p_id'], (isset($_SESSION['items_in_cart_id'] )) ?$_SESSION['items_in_cart_id'] : [] )   ){ ?>
                            <input type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-outline-secondary btn-sm w-100">
                        <?php } else { ?>
                            <input type="submit" name="add_to_cart" value="Added" class="btn btn-outline-secondary btn-sm w-100" disabled>
                        <?php } ?>
                     </form>
                </div>

            <?php } ?>
        </div>












        <hr>
        <?php include_once('footer/footer.php'); ?>
    </div>

    <script src="js/scroll.js"></script>
    <script src="js/bs_js/bootstrap.min.js"></script>

</body>

</html>