<?php

include "../connect.php";



$user_id = $_POST['user_id'];


$stm = $con->query("SELECT * FROM `lost_items` WHERE `user_id` = '$user_id'");

$count  = $stm->num_rows;

$data = $stm->fetch_all(MYSQLI_ASSOC);


if($count > 0){
    echo json_encode(array('status' => 'success' ,'data' => $data));
}else{
    echo json_encode(array('status' => 'f' ));
}




?>