<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bs_css/bootstrap.min.css">
    <style>
        body {
            color: rgba(0, 0, 0, 0.534);
        }

        #user_login_title {
            font-weight: 200 !important;
        }
    </style>
</head>

<body class="py-1">

    <div class="container-fluid">

        <div class="row">
            <div class="col-12 ps-5">
                <p class="h1" id="user_login_title">User Sign In</p>
            </div>
        </div>

        <div class="row mt-3">

            <div class="col-10 col-sm-9 col-md-8 col-lg-6 ps-5">
                <form action="user_data_entry.php" method="post">

                    <?php if(!isset($_GET['dup'])) { ?>
                        <label for="i1" class="form-label mt-1">Enter Name:</label>
                        <input type="text" class="form-control" name="name" id="i1" required pattern="[a-zA-Z]+" title="only alphabets allowed">
                    <?php }  else { ?>
                        <label for="i1" class="form-label mt-1">Enter Name:</label>
                        <input type="text" class="form-control is-invalid" name="name" id="i1" required pattern="[a-zA-Z]+" title="only alphabets allowed">
                        <div class="invalid-feedback" id="i1Feedback">User already exists</div>
                    <?php } ?>

                    <label for="i2" class="form-label mt-1">Enter Email:</label>
                    <input type="text" class="form-control" name="email" id="i2" required>

                    <label for="i3" class="form-label mt-1">Enter password:</label>
                    <input type="text" class="form-control" name="pword" id="i3" required>

                    <label for="i4" class="form-label mt-1">Enter address:</label>
                    <input type="text" class="form-control" name="address" id="i4" required pattern="[a-zA-Z]+" title="only alphabets allowed">

                    <label for="i5" class="form-label mt-1">Enter phone:</label>
                    <input type="text" class="form-control" name="phone" id="i5" required pattern="[0-9]+" title="only numbers allowed">

                    <input type="submit" name="signin" value="Sign In" class="btn btn-outline-info  px-3 py-1 mt-3">
                </form>
            </div>
        </div>
    </div>





    <script src="../js/bs_js/bootstrap.min.js"></script>

</body>

</html>