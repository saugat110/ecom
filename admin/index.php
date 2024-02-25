<?php
session_start();
if(isset($_SESSION['admin_logged_in'])){
    header("Location:adash.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tarkrai bazaar</title>
    <link href="../css/bs_css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            color: rgba(0, 0, 0, 0.534);
        }

        #admin_login_title {
            font-weight: 200 !important;
        }
    </style>
</head>

<body>

    <div class="container-fluid p-2">
        <div class="row">
            <div class="col-12 ps-5">
                <p class="h1" id="admin_login_title">Admin Login</p>
            </div>
        </div>
    </div>

    <div class="row mt-3">

        <div class="col-10 col-sm-9 col-md-8 col-lg-6 ps-5">

            <form action="admin_login_validate.php" method="post">

                <?php if (isset($_GET['unf'])) { ?>
                    <label for="i1" class="form-label">Enter email:</label>
                    <input type="email" class="form-control is-invalid" id="i1" name="aemail" required>
                    <div id="i1Feedback" class="invalid-feedback">User Not Found</div>
                <?php } else { ?>
                    <label for="i1" class="form-label">Enter email:</label>
                    <input type="email" class="form-control" id="i1" name="aemail" required>
                <?php } ?>


                <?php if (isset($_GET['pnm'])) { ?>
                    <label for="i2" class="form-label mt-3">Enter password:</label>
                    <input type="password" class="form-control is-invalid" id="i2" name="apword" required>
                    <div id="i2Feedback" class="invalid-feedback">Incorrect Password</div>
                <?php } else { ?>
                    <label for="i2" class="form-label mt-3">Enter password:</label>
                    <input type="password" class="form-control" id="i2" name="apword" required>
                <?php } ?>

                <input type="submit" value="Login" name="login_submit" class="btn btn-outline-info  mt-3 px-3 py-1">
            </form>
        </div>
    </div>





    <script src="../js/bs_js/bootstrap.min.js" ></script>
</body>

</html>