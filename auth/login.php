<?php
include "../connect.php";

$username = $_POST['username'];
$password = $_POST['password'];


$stm = $con->query("SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'");

$data = $stm->fetch_assoc();
$count = $stm->num_rows;


if($count > 0){
    echo json_encode(array('status' => 'success' , 'data' => $data));
}else{
    echo json_encode(array('status' => 'f'));
}


?>      