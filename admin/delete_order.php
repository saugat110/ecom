<?php

require ('../conn/conn.php');

if(isset($_GET['cid'])){
    // echo $_GET['cid'];
    $cid = $_GET['cid'];
    $query = "delete from orders where c_id = '$cid'";
    $db -> exec($query);
    header("Location:orders.php");
}