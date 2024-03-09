<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('../conn/conn.php');


//delete ko lagi
if (isset($_POST['delete_submit'])) {
    $pid = $_POST['pid'];
    $iname = '../prod_images/' . $_POST['delete_img_name'];
    $query = "delete from products where p_id = '$pid' ";
    $db->exec($query);

    unlink($iname);

    // echo "k cha";

    header('Location:adash.php');
}


//update ko lagi
if (isset($_POST['update_prod_button'])) {

    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $price  = $_POST['price'];
    $quantity  = $_POST['quan'];

    $query1 = "select Pname from products where p_id  = '$pid'";
    $result1 = $db->query($query1);
    $result1 = $result1->fetch(PDO::FETCH_ASSOC);

    if ( strtolower($pname) == strtolower($result1['Pname']) ) {
        $name_is_same = 1;
    } else {
        $name_is_same = 0;
    }


    //name same xa vne dup check garnu pardaina , sidhai update
    if ($name_is_same == 1) {
        $query = "update products set Pname = '$pname', Price = '$price', Quantity = '$quantity' where p_id = '$pid' ";
        $db->exec($query);
        header('Location:adash.php');
    } else {  //name same xaina vne check dup, then only update
        $lower_name = strtolower($pname);
        // $query2 = "select * from products where lower(Pname) like concat('$lower_name', '%')";
        $query2 = "select * from products where lower(Pname) = '$lower_name' ";
        $result = $db->query($query2);
        $dup = $result->rowCount();
        if ($dup == 0) {
            $query = "update products set Pname = '$pname', Price = '$price', Quantity = '$quantity' where p_id = '$pid' ";
            $db->exec($query);
            $query2 = "update orders set Pname = '$pname' where p_id = '$pid'";
            $db->exec($query2);
            header('Location:adash.php');
        } else {
            header("Location:prod_update.php?pid=$pid&dup=1&nm=$pname");
        }
    } 
}

