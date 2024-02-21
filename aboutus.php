<?php
session_start();
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
    <link rel="stylesheet" href="css/aboutus.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <?php include_once('header/header.php'); ?>


        <div class="row justify-content-center" id="first_row">

            <div class="col-auto">
                <p id="abt_title" class="mb-2">ABOUT <span id="title_span">US</span></p>
            </div>
            <div class="col-12"></div>
            <div class="col-1" id="seperator"></div>

        </div>

        <div class="row mt-5">

            <div class="col-12 col-md-6 ps-5 pe-5">
                <img src="site_image/aboutus.png" class="w-100 image-fluid" >
            </div>

            <div class="col-12 col-md-6 ps-5 pe-5">
                <p id="mid_section_title">ABOUT US</p>
                <p id="mid_section_title_second">About Online Tarkari Pasal</p>
                <p class="info">We are Online Tarkari Pasal. We deliver fresh vegetables, fruits, and groceries. You can buy our products within a few minutes. Browse a product, add to cart, fill your address, and proceed with your order. We will deliver it within 2 hours.</p>
                <p class="info">We aim to change the way of the traditional way of shopping. You don't need to waste your time going to a local market, bargain with shopkeepers, and bring your bag. With us, you can select your products and buy online; we will deliver it to your doorstep within a few hours.</p>
                <p class="info">We aim to shorten the time between the farm and your table. We deliver the local food, which is better, fresher and tastier.</p>
                <p class="info">Also, we aim to cut off the middleman cost, which makes the vegetable price higher. You are a direct customer, and we are a producer means you will get mediators free pricing.</p>
            </div>
        </div>


        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <hr>
        <?php include_once('footer/footer.php'); ?>
    </div>



    <script src="js/bs_js/bootstrap.min.js"></script>
</body>

</html>