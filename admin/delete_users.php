<?php

require_once '../conn/conn.php';

if(isset($_POST['submit'])){
    $uid = $_POST['uid'];
    $query = "delete from customers where c_id = '$uid'";
    $db -> exec($query);
    header('Location:users.php');

    echo "hi";
}


?>