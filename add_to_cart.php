<?php
session_start();


if(isset($_POST['add_to_cart'])){

    $arr = array(
        "pid" => $_POST['pid'],
        "pname" => $_POST['pname'],
        "price" => $_POST['price']
    );

    $_SESSION['cart'][] = $arr;
    $_SESSION['items_in_cart_id'][] = $_POST['pid'];
    header("Location:index.php");
    
    
    // echo "<pre>";
    // print_r($_SESSION['cart']);
    // echo "<br>";
    // print_r($_SESSION['items_in_cart_id']);
    // echo "<pre/>";

}