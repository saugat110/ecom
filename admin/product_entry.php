<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('../conn/conn.php');

if (isset($_POST['prod_add_button']) && (!isset($_SESSION['prod_add_visited']))) {
    //form data
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $quantity = $_POST['quan'];

    //db ma product already xa ki check
    $lower_name = strtolower($pname);
    $query = "select * from products where lower(Pname) like concat('$lower_name', '%')";
    $result = $db->query($query);
    $duplicate_count = $result->rowCount();
    $query = null;

    //already product xa vne run nagarne!!!
    if ($duplicate_count == 0) {
        //data only insert part
        $query = "
    insert into products (Pname, Price, Quantity) values ('$pname', '$price', '$quantity') 
    ";
        $db->exec($query);

        $insert_id  = $db->lastInsertId();


        //image upload part
        $target_dir = '../prod_images/';
        $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        $img_name = $insert_id . '.' . $ext;
        $target_file = $target_dir . $img_name;

        if (file_exists($target_file)) { //image exist garxa vne delete
            unlink($target_file);
        }


        //upload image
        $upload_success = move_uploaded_file($_FILES['img']['tmp_name'], $target_file);  //returns 1 if success
        echo $upload_success;


        //add image name in db
        if ($upload_success) {
            $query = "update products set Image  = '$img_name' where p_id = '$insert_id' ";
            $db->exec($query);
        }


        //remember to unset it on dash page
        $_SESSION['prod_add_visited'] = 1;
        header('Location:adash.php');
    }else{
        header("Location:adash.php?dup=$pname");
    }
} else {

}
