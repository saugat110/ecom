<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
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
</head>
<body class="p-0 m-0">
    <div class="container-fluid p-0">
        <?php include_once('header/header.php'); ?>

        <div class="row justify-content-center"> 
            <div class="col-11 col-md-10 p-2 p-md-0 text-center">
                <img src="site_image/mid_image.jpg"  id="mid_image" class="image-fluid mb-5">
            </div>
        </div>














        <hr>
        <?php include_once('footer/footer.php'); ?>
    </div>
    

    <script src="js/bs_js/bootstrap.min.js"></script>
</body>
</html>