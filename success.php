<?php
session_start();





header("refresh:5 url=index.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bs_css/bootstrap.min.css">
    <style>
        #tq{
            color: rgba(0, 0, 0, 0.607);
            font-weight: 200;
        }
    </style>
</head>
<body>
    
    <div class="container-fluid">
        <div class="row ps-3">
            <div class="col-12">
                <p class="h1" id="tq">Thank you for your payment of RS <?php echo $_SESSION['total'];?></p>
            </div>
        </div>
    </div>


<script src="js/bs_js/bootstrap.min.js"></script>

</body>
</html>