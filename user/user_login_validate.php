<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once ('../conn/conn.php');

session_start();

$form_email = $_POST['cemail'];
$form_password = $_POST['cpword'];


$query = "select * from customers";
$result  = $db -> query($query);

$result = $result -> fetchAll();

$user_found = 0;
$p_matched = 0;

foreach($result as $single){
    if($single['Email'] == $form_email){
        $user_found = 1;
        if($single['Pword'] == $form_password){
            $p_matched = 1;
            $_SESSION['logged_in_user_id'] = $single['c_id'];
            $_SESSION['logged_in_user_name'] = $single['Name'];
            break;
        }
    }
}

if($user_found == 0){
    header("Location:user_login.php?unf=1");
}else if ($user_found == 1 and $p_matched ==0 ){
    header("Location:user_login.php?pnm=1");
}else if ($user_found == 1 and $p_matched ==1 ){

    // echo $_SESSION['logged_in_user_id'];
    // echo $_SESSION['logged_in_user_name'];
    header("Location:../index.php");
}
