<?php


include "../connect.php";

$id = $_POST['id'];

$stm = $con->query("SELECT * FROM `lost_children` WHERE user_id = $id");

$count = $stm->num_rows;
$data = $stm->fetch_all(MYSQLI_ASSOC);
if($count > 0){
    echo json_encode(array('status' => 'success', 'data' => $data));
}else{
    echo json_encode(array('status' => 'f'));
}




?>