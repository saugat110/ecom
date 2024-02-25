<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once ('../conn/conn.php');

session_start();

$form_email = $_POST['aemail'];
$form_password = $_POST['apword'];


$query = "select * from admin";
$result  = $db -> query($query);

$result = $result -> fetchAll();

$user_found = 0;
$p_matched = 0;

foreach($result as $single){
    if($single['Email'] == $form_email){
        $user_found = 1;
        if($single['Password'] == $form_password){
            $p_matched = 1;
            $_SESSION['admin_logged_in'] = 1;
            break;
        }
    }
}

if($user_found == 0){
    header("Location:index.php?unf=1");
}else if ($user_found == 1 and $p_matched ==0 ){
    header("Location:index.php?pnm=1");
}else if ($user_found == 1 and $p_matched ==1 ){
    header("Location:adash.php");
}
