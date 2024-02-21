<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require_once('../conn/conn.php');


if (isset($_POST['signin'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pword = $_POST['pword'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $query1 = "select Email from customers";
    $result = $db->query($query1);
    $result = $result->fetchAll(PDO::FETCH_ASSOC);

    $duplicate_email = false;

    foreach ($result as $single) {
        if ($single['Email'] == $email) {
            $duplicate_email = true;
            break;
        }
    }

    if ($duplicate_email == false) {
        $query2 = "insert into customers (Name, Email, Pword, Address, Phone)
        values ('$name', '$email', '$pword', '$address', '$phone' ) ";
        $db->exec($query2);
        header("Location:user_login.php");
    }else{
        header("Location: user_sign_in.php?dup=1");
    }
}
