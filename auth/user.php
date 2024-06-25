<?php
include "../connect.php";

$user_id = $_POST['userId'];



$stm = $con->query("SELECT * FROM `users` WHERE id = $user_id");

$data = $stm->fetch_assoc();
$count = $stm->num_rows;


if($count > 0){
    echo json_encode(array('status' => 'success' , 'data' => $data));
}else{
    echo json_encode(array('status' => 'f'));
}


?>    