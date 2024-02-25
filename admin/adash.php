<?php
session_start();
ini_set("display_errors", 1);
error_reporting(E_ALL);
if (!isset($_SESSION['admin_logged_in'])){
    header("Location:index.php");
}
unset($_SESSION['prod_add_visited']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/bs_css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            scrollbar-width: none;
        }

        body {
            background-color: rgba(0, 0, 0, 0.027);
            height: 1000px;
            color: rgba(0, 0, 0, 0.615);
        }

        ._title {
            font-weight: 200;
            color: rgba(0, 0, 0, 0.534);
        }

        #title_image {
            width: 50px;
        }
    </style>

</head>

<body>
    <div class="container-fluid ps-2 m-2 fixed-top">

        <!--heading part-->
        <div class="row align-items-center">
            <!-- for title-->
            <div class="col-9 col-md-10 col-lg-11">
                <p class="h1 _title m-0">Manage Products /
                    <a href="view_orders.php">
                        <img src="../site_image/order.png" id="title_image">
                    </a>
                </p>
            </div>
            <div class="col-3 col-md-2 col-lg-1 text-end">
                <a href="admin_logout.php" class="pt-2 pe-3">Logout</a>
            </div>
        </div>


        <!--form for product entry-->
        <form action="product_entry.php" method="post" class="row mt-3 me-1 ms-0 border-bottom align-items-center pb-1"
            enctype="multipart/form-data">

            <div class="col-12 col-md-12 col-lg-auto px-1">
                <label for="i1" class="col-form-label">Enter product name:</label>
            </div>
            <?php if(!isset($_GET['dup'])) { ?>
                <div class="col-10 col-sm-6 col-md-4 col-lg-auto  px-1 me-3">
                    <input type="text" name="pname" class="form-control form-control-sm" id="i1" required>
                </div>
            <?php } else { ?>
                <div class="col-10 col-sm-6 col-md-4 col-lg-auto  px-1 me-3">
                    <input type="text" name="pname" class="form-control form-control-sm is-invalid" id="i1" required>
                    <div id="i1Feedback" class="invalid-feedback"><?php echo $_GET['dup'];?> already exists</div>
                </div>
            <?php } ?>


            <div class="col-12 col-md-12 col-lg-auto px-1">
                <label for="i2" class="col-form-label">Enter price:</label>
            </div>
            <div class="col-10 col-sm-6 col-md-4 col-lg-1 col-xl-auto px-1 me-3">
                <input type="number" name="price" class="form-control form-control-sm" id="i2" min="1" required>
            </div>

            <div class="col-12 col-lg-auto px-1">
                <label for="i3" class="col-form-label">Enter quantity:</label>
            </div>
            <div class="col-10 col-sm-6 col-md-4 col-lg-auto  px-1 me-3">
                <input type="number" name="quan" class="form-control form-control-sm" id="i3" min="1" step="1" required>
            </div>

            <div class="w-100"></div><!--for next line forcing-->

            <div class="col-12 col-lg-auto px-1 mt-1 mt-lg-4">
                <label for="i4" class="col-form-label">Add image:</label>
            </div>
            <div class="col-10 col-sm-6 col-md-4 col-lg-auto  px-1 mt-1 mt-lg-4">
                <input type="file" name="img" class="form-control form-control-sm" id="i4" accept="image/*" required>
            </div>

            <div class="col-lg-auto ps-0 ps-md-1 mt-4 ">
                <input type="submit" name="prod_add_button" value="Add product" class="btn btn-outline-info btn-sm">
            </div>

        </form>

    </div> <!--fixed container ends-->


    <!--display products part starts-->
    <div class="row">
        
    </div>






    <script src="../js/bs_js/bootstrap.min.js"></script>

</body>

</html>