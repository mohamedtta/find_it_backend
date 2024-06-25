<?php

include '../connect.php';

$id                 = $_POST['id'];
$name               = $_POST['name'];
$username           = $_POST['username'];
$email              = $_POST['email'];
$phone              = $_POST['phone'];
$country            = $_POST['country'];
$profile_picture    = imageUpload('file');




$stm = $con->prepare("UPDATE `users` SET  `name` = '$name'  , `username` = '$username' , `email` = '$email' , `phone` = '$phone' , `country` = '$country' , `profile_picture` = '$profile_picture' WHERE id = $id");
$stm->execute();


$count = $stm->affected_rows;

if($count > 0){
    echo json_encode(array('status' => 'success'));
}else{
    echo json_encode(array('status' => 'fail'));
}





