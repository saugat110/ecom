<?php
session_start();
ini_set("display_errors", 1);
error_reporting(E_ALL);
if (!isset($_SESSION['admin_logged_in'])){
    header("Location:index.php");
}
unset($_SESSION['prod_add_visited']);

require_once ('../conn/conn.php');
$query  = "select * from products order by p_id desc";
$result = $db -> query($query);
$result = $result -> fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="../css/bs_css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/adash.css">
    <script src="../js/jquery.js"></script>
</head>

<body>
    <div class="container-fluid ps-3  fixed-top z-2 opacity-100" id="cont1">

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
                <div id="i1Feedback" class="invalid-feedback">
                    <?php echo $_GET['dup'];?> already exists
                </div>
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
    <div class="container-fluid z-1 fixed-top" id="cont2">
        <div class="row">
            <div class="col-9 position-relative" id="table_wrapper">
                <table class="table text-center align-middle  table-striped">
                    <thead class="position-sticky top-0">
                        <th class="text-start col-2">Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th class="col-2 pe-3">Action</th>
                    </thead>
                    <tbody class="">
                        <?php foreach ($result as $single) { ?>
                        <tr>
                            <td class="text-start">
                                <img src="../prod_images/<?php echo $single['Image'];?>" alt="Image" id="prod_image"
                                    class="img-fluid w-75">
                            </td>
                            <td><?php echo $single['Pname'];?></td>
                            <td><?php echo $single['Price'];?></td>
                            <td><?php echo $single['Quantity'];?></td>
                            <td class="pe-3">
                                <form action="prod_update.php" method="post" class="btns">
                                    <input type="hidden" name="pid" value="<?php echo $single['p_id'];?>">
                                    <input type="submit" class="btn btn-outline-primary btn-sm" name="update_submit" value="Update">
                                </form>
                                <form action="prod_ud_handler.php" method="post" class="btns">
                                    <input type="hidden" name="pid" value="<?php echo $single['p_id'];?>">
                                    <input type="hidden" name="delete_img_name" value="<?php echo $single['Image'];?>" >
                                    <input type="submit" name="delete_submit" class="btn btn-outline-danger btn-sm" value="Delete">
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>






    <!-- <script src="../js/bs_js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="../js/adash.js"></script>
</body>

</html>