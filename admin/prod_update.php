<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

require_once ('../conn/conn.php');

if(isset($_POST['pid'])){
    $pid = $_POST['pid'];
}
if(isset($_GET['pid'])){
    $pid = $_GET['pid'];
}
$query = "select * from products where p_id = '$pid'";
$result = $db->query($query);
$result = $result -> fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/bs_css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            color: rgba(0, 0, 0, 0.534);
        }

        ._title {
            font-weight: 200;
            color: rgba(0, 0, 0, 0.534);
        }
    </style>
</head>

<body>
    <div class="container-fluid ps-3  m-0">
        <div class="row mb-3">
            <div class="col-12 ps-3 pt-2">
                <p class="h1 _title">Update Product</p>
            </div>
        </div>

        <form class="row" action="prod_ud_handler.php" method="post">
            <div class="col-4">
                <?php if(!isset($_GET['dup'])) { ?>
                <div class="mb-3">
                    <label for="i1" class="form-label">Enter Name:</label>
                    <input type="text" name="pname" class="form-control form-control-sm" id="i1"
                        value="<?php echo $result['Pname'];?>">
                </div>
                <div class="mb-3">
                    <label for="i2" class="form-label">Enter Price:</label>
                    <input type="number" name="price" class="form-control form-control-sm" id="i2"
                        value="<?php echo $result['Price'];?>" min="1" step="1">
                </div>
                <div class="mb-3">
                    <label for="i3" class="form-label">Enter Quantity:</label>
                    <input type="number" name="quan" class="form-control form-control-sm" id="i3"
                        value="<?php echo $result['Quantity'];?>" min="1" step="1">
                </div>
                <?php } else { ?>
                <div class="mb-3">
                    <label for="i1" class="form-label">Enter Name:</label>
                    <input type="text" name="pname" class="form-control form-control-sm is-invalid" id="i1">
                    <div id="i1Feedback" class="invalid-feedback"><?php echo $_GET['nm'];?> exists </div>
                </div>
                <div class="mb-3">
                    <label for="i2" class="form-label">Enter Price:</label>
                    <input type="number" name="price" class="form-control form-control-sm" id="i2"
                        value="<?php echo $result['Price'];?>" min="1" step="1">
                </div>
                <div class="mb-3">
                    <label for="i3" class="form-label">Enter Quantity:</label>
                    <input type="number" name="quan" class="form-control form-control-sm" id="i3"
                        value="<?php echo $result['Quantity'];?>" min="1" step="1">
                </div>
                <?php } ?>

                <input type="hidden" name="pid" value="<?php echo $result['p_id'];?>">
                <input type="submit" value="Update" name="update_prod_button" class="btn btn-outline-primary btn-sm">
            </div>
        </form>
    </div>





    <script src="../js/bs_js/bootstrap.min.js"></script>

</body>

</html>