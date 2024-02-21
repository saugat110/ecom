<?php

$dsn = "mysql:host=localhost;dbname=ecom;";
$uname = "root";
$pword = '';

try{
    $db = new PDO($dsn, $uname, $pword);
    // echo "connected";
}catch(Exception $e){
    echo $e -> getMessage();
}

?>