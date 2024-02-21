<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bs_css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/user_login.css">
    <style>
        
    </style>
</head>

<body>
    <div class="container-fluid p-2">


        <div class="row">
            <div class="col-12 ps-5">
                <p class="h1" id="user_login_title">User Login</p>
            </div>
        </div>

        <div class="row mt-3">

            <div class="col-10 col-sm-9 col-md-8 col-lg-6 ps-5">

                <form action="user_login_validate.php" method="post">

                    <?php if(isset($_GET['unf'])) {?>
                        <label for="i1" class="form-label">Enter email:</label>
                        <input type="email" class="form-control is-invalid" id="i1" name="cemail" required>
                        <div id="i1Feedback" class="invalid-feedback">User Not Found</div>
                    <?php } else { ?>
                        <label for="i1" class="form-label">Enter email:</label>
                        <input type="email" class="form-control" id="i1" name="cemail" required>
                    <?php } ?>


                    <?php if(isset($_GET['pnm'])) {?>
                        <label for="i2" class="form-label mt-3">Enter password:</label>
                        <input type="password" class="form-control is-invalid" id="i2" name="cpword" required>
                        <div id="i2Feedback" class="invalid-feedback">Incorrect Password</div>
                    <?php } else { ?>
                        <label for="i2" class="form-label mt-3">Enter password:</label>
                        <input type="password" class="form-control" id="i2" name="cpword" required>
                    <?php } ?>

                    <input type="submit" value="Login" name="login_submit" class="btn btn-outline-success btn-sm mt-3 px-3 py-1">
                </form>
            </div>
        </div>
        <a href="user_sign_in.php" class="ps-4 m-0 mt-3 d-block">Not a member yet? Sign In</a>

    </div>







    <script src="../js/bs_js/bootstrap.min.js"></script>

</body>

</html>