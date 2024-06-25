<?php

include "../connect.php";

$user_id = $_POST['user_id'];
$id = $_POST['id'];

$stm = $con->query("SELECT u.username,l.img,u.phone FROM `users` u INNER JOIN `lost_items` l WHERE l.id = '$id' AND u.id='$user_id'  ");

$data = $stm->fetch_assoc();


$count = $stm->num_rows;

if($count > 0){
    echo json_encode(array('status' => 'success' , 'data' => $data));
}else{
    echo json_encode(array('status' => 'success' , 'data' => $data));
}

?>