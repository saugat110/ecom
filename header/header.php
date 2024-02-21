<?php


?>

<nav class="navbar navbar-expand-md bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <img src="site_image/sitelogo.png" class=" me-1 me-lg-5 " id="nav_logo">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active me-0 me-lg-4 ms-0 ms-md-3 ms-lg-5" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-0 me-lg-4" href="aboutus.php">AboutUs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-0 me-lg-4" href="#">Contact</a>
        </li>

        <?php if (!isset($_SESSION['logged_in_user_id'])) { ?>
          <li class="nav-item">
            <a class="nav-link me-0 me-lg-4" href="user/user_login.php">Login</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link me-0 me-lg-4" href="user/user_logout.php">Logout</a>
          </li>
        <?php } ?>

        <li class="nav-item">
          <a class="nav-link" href="#">
            <img src="site_image/cart.png" id="cart_image" class="pb-2">
          </a>
        </li>
        <?php if(isset($_SESSION['logged_in_user_id'])) { ?>
          <?php
            $arr = explode(' ', $_SESSION['logged_in_user_name']);
            $nm = $arr[0];
          ?>
          <li class="nav-item ms-0 ms-md-3">
            <a class="nav-link me-0 me-lg-4" href="user/user_login.php" style="font-size:13px;"><?php echo 'Hi ' . $nm; ?></a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>