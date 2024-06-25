<?php
include '../connect.php';

$newPassword = $_POST['newPassword'];
$id = $_POST['id'];

$stm = $con->prepare("UPDATE `users` SET  `password` = '$newPassword' WHERE id = $id");
$stm->execute();



$count = $stm->affected_rows;

if($count > 0){
    echo json_encode(array('status' => 'success'));
}else{
    echo json_encode(array('status' => 'fail'));
}


?>